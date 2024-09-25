<?php
//session_start();

$title = "Warenkorb";
include "header.php";

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Instantiate the Product object
$product = new Product($db);

// Check if the user is logged in and has an ID set in the session
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    header('Location: login.php');  // Redirect to login page if user not logged in
    exit;
}
$kunden_id = $_SESSION['user']['id'];  // Fetch user ID safely after checking

// Generate a CSRF token and store it in the session if not already present
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle removing an item from the cart
if (isset($_POST['remove'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Invalid CSRF token');
    }

    $art_id = $_POST['remove'];
    unset($_SESSION['cart'][$art_id]); // Remove item from session

    $query = "DELETE FROM warenkorb WHERE kunden_id = :kunden_id AND art_id = :art_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':kunden_id', $kunden_id);
    $stmt->bindParam(':art_id', $art_id);
    $stmt->execute();

    header('Location: cart.php?status=removed');
    exit;
}

// Handle updating the quantity of an item in the cart
if (isset($_POST['update_quantity'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Invalid CSRF token');
    }

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0) {
        $_SESSION['cart'][$product_id]['quantity'] = $quantity; // Update quantity in session

        // Optionally update quantity in the database
        $query = "UPDATE warenkorb SET menge = :menge WHERE kunden_id = :kunden_id AND art_id = :product_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':menge', $quantity);
        $stmt->bindParam(':kunden_id', $kunden_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    } else {
        // If quantity is zero or less, remove the item
        unset($_SESSION['cart'][$product_id]);
    }

    header('Location: cart.php?status=updated');
    exit;
}

// Ensure the cart session is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Initialize the cart as an empty array if it's not set
}

// Render the cart items
$product->renderCartItems($_SESSION['cart'], $kunden_id);

include "footer.php";
?>
