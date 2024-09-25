<?php
ob_start();
session_start();
$title = "Payment";
require_once "Payment.php";
include "header.php";

// Ensure the CSRF token is valid
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Invalid CSRF token');
}

// Check if the cart is not empty and a valid order is being placed
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $db = Database::getInstance();
    $payment = new Payment($db);

    // Calculate the total amount from the cart
    $totalAmount = 0;

    foreach ($_SESSION['cart'] as $productId => $item) {
        // Fetch the product price from the database
        $stmt = $db->prepare("SELECT art_preis FROM artikel WHERE art_id = :productId");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $price = $row['art_preis'];
            $totalAmount += $price * $item['quantity'];
            $_SESSION['cart'][$productId]['price'] = $price; // Store price in session to use later
        } else {
            die('Produkt nicht gefunden.');
        }
    }

    // If the form to process payment is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method'])) {
        $paymentMethod = $_POST['payment_method'];

        // Simulate receiving payment details
        $paymentDetails = [
            'method' => $paymentMethod,
            'amount' => $totalAmount,
            'status' => 'pending',
            'transaction_date' => date('Y-m-d H:i:s')
        ];

        try {
            // Process the payment
            if ($payment->processPayment($paymentDetails)) {
                // Save the order in the database
                $stmt = $db->prepare("INSERT INTO Bestellung (kunde_id, order_date, Best_nummer, Beschreibung) VALUES (:kunde_id, :order_date, :Best_nummer, :Beschreibung)");
                $orderNumber = uniqid('ORDER-'); // Generate a unique order number
                $description = "Bestellung mit Zahlungsmethode: $paymentMethod";
                $stmt->bindParam(':kunde_id', $_SESSION['user']['id'], PDO::PARAM_INT);
                $stmt->bindParam(':order_date', $paymentDetails['transaction_date']);
                $stmt->bindParam(':Best_nummer', $orderNumber);
                $stmt->bindParam(':Beschreibung', $description);
                $stmt->execute();

                // Get the last inserted order ID
                $orderId = $db->lastInsertId();

                // Save each item in the order
                foreach ($_SESSION['cart'] as $productId => $item) {
                    $stmt = $db->prepare("INSERT INTO Bestellung_pos (best_id, art_id, anzahl, preis) VALUES (:best_id, :art_id, :anzahl, :preis)");
                    $stmt->bindParam(':best_id', $orderId, PDO::PARAM_INT);
                    $stmt->bindParam(':art_id', $productId, PDO::PARAM_INT);
                    $stmt->bindParam(':anzahl', $item['quantity'], PDO::PARAM_INT);
                    $stmt->bindParam(':preis', $item['price']); // Use the price stored in the session
                    $stmt->execute();
                }

                // Deduct ordered quantity from the stock in the lager table
                foreach ($_SESSION['cart'] as $productId => $item) {
                    $stmt = $db->prepare("UPDATE lager SET menge = menge - :anzahl WHERE art_id = :art_id AND menge >= :anzahl");
                    $stmt->bindParam(':anzahl', $item['quantity'], PDO::PARAM_INT);
                    $stmt->bindParam(':art_id', $productId, PDO::PARAM_INT);

                    if (!$stmt->execute()) {
                        throw new Exception('Fehler beim Aktualisieren des Lagerbestands.');
                    }
                }

                $_SESSION['payment_success'] = true;
                unset($_SESSION['cart']);

                // Display loading animation and delay the redirect for 3 seconds
                echo '<div class="center">';
                echo '<div class="loader"></div>'; // Spinner only
                echo '<span class="processing-message">Zahlung wird verarbeitet...</span>'; // Text below the spinner
                echo '</div>';
                echo '<script>
        setTimeout(function() {
            window.location.href = "success.php";
        }, 3000); // Delay the redirect by 3 seconds
      </script>';
                exit();
            } else {
                throw new Exception('Die Zahlungsabwicklung ist fehlgeschlagen.');
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
} else {
    header('Location: cart.php');
    exit();
}
?>

<div class="text-center">
    <h2>Zahlungsmethode auswählen</h2>
    <form action="pay.php" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <label><input type="radio" name="payment_method" value="credit_card" required>Kreditkarte</label><br>
        <label><input type="radio" name="payment_method" value="paypal" required>PayPal</label><br>
        <label><input type="radio" name="payment_method" value="bank_transfer" required>Banküberweisung</label><br><br>
        <button type="submit" class="btn btn-primary">Mit der Zahlung fortfahren</button>
    </form>
</div>

<?php
include "footer.php";
?>
