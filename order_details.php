<?php
session_start();
$title = "Details zur Bestellung";
include_once 'Database.php';
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

if (!isset($_GET['order_id'])) {
    header('Location: orders.php'); // Redirect if no order_id is provided
    exit;
}

$order_id = $_GET['order_id'];

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Fetch order details
$query = 'SELECT * FROM Bestellung WHERE id = :order_id';
$stmt = $db->prepare($query);
$stmt->bindParam(':order_id', $order_id);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    header('Location: orders.php'); // Redirect if order not found
    exit;
}

// Fetch order positions along with product images
$query = '
    SELECT bp.*, a.art_name, a.art_bild 
    FROM Bestellung_pos bp 
    JOIN artikel a ON bp.art_id = a.art_id 
    WHERE bp.best_id = :order_id
';
$stmt = $db->prepare($query);
$stmt->bindParam(':order_id', $order_id);
$stmt->execute();
$order_positions = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_cost = 0;
foreach ($order_positions as $position) {
    $total_cost += $position['preis'] * $position['anzahl'];
}

?>

<div class="container-md">
    <!--
    <h2 class="mt-4">Details zur Bestellung</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Bestell-ID</th>
            <th>Bestelldatum</th>
            <th>Bestellnummer</th>
            <th>Beschreibung</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo htmlspecialchars($order['id']); ?></td>
            <td><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($order['order_date']))); ?></td>
            <td><?php echo htmlspecialchars($order['Best_nummer']); ?></td>
            <td><?php echo htmlspecialchars($order['Beschreibung']); ?></td>
        </tr>
        </tbody>
    </table>
-->
    <h3>Bestellung von Artikeln</h3>
    <?php if (empty($order_positions)): ?>
        <p>Keine Artikel für diese Bestellung gefunden.</p>
    <?php else: ?>
        <table class="table table-striped border">
            <thead>
            <tr>
                <th>Bild</th>
                <th>Artikelname</th>
                <th>Item ID</th>
                <th>Menge</th>
                <th>Preis</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_positions as $position):
                $image_url = htmlspecialchars($position['art_bild']);
                ?>
                <tr class="align-middle">
                    <td><img src="<?php echo $image_url; ?>" alt="Produktbild" style="width: 100px; height: auto;"></td>
                    <td><?php echo htmlspecialchars($position['art_name']); ?></td>
                    <td><?php echo htmlspecialchars($position['art_id']); ?></td>
                    <td><?php echo htmlspecialchars($position['anzahl']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($position['preis'], 2)); ?> €</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mt-3 text-right" style="text-align: right;">
            <h4 class="me-5">Gesamtkosten: <?php echo htmlspecialchars(number_format($total_cost, 2)); ?> €</h4>
        </div>
    <?php endif; ?>
    <div class="text-center mb-3">
    <a href="orders.php" class="btn btn-primary mt-3 mb-3">Zurück zu Bestellungen</a>
    </div>
</div>

<?php
include "footer.php";
?>
