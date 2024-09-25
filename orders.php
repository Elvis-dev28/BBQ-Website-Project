<?php
session_start();
$title = "Bestellungen";
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Initialize variables
$user_id = $_SESSION['user']['id'];
$orders = [];

// Fetch orders for the logged-in user
$query = 'SELECT * FROM Bestellung WHERE kunde_id = :user_id ORDER BY order_date DESC';
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container-md">
    <h2 class="">Ihre Bestellungen</h2>
    <?php if (empty($orders)): ?>
        <p>Keine Bestellungen gefunden.</p>
    <?php else: ?>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Bestell-ID</th>
                <th>Bestelldatum</th>
                <th>Bestellnummer</th>
                <th>Beschreibung</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr class="align-middle">
                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($order['order_date']))); ?></td>
                    <td><?php echo htmlspecialchars($order['Best_nummer']); ?></td>
                    <td><?php echo htmlspecialchars($order['Beschreibung']); ?></td>
                    <td><a href="order_details.php?order_id=<?php echo htmlspecialchars($order['id']); ?>" class="btn btn-info">Details anzeigen</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php
include "footer.php";
?>
