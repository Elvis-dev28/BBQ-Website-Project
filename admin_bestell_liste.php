<?php
session_start();

// Only allow access if the user is an admin
//if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
if (!isset($_SESSION['user'])) {
    die('Zugriff verweigert.');
}

// Include database connection and other necessary files
require_once "Database.php";
$db = Database::getInstance();
include "header.php";

// Query to retrieve products where stock (menge) is below the grenze from the lager table
$query = "
    SELECT a.art_name, a.art_preis, l.menge, l.grenze
    FROM artikel a
    JOIN lager l ON a.art_id = l.art_id
    WHERE l.menge < l.grenze
";
$stmt = $db->prepare($query);
$stmt->execute();
$lowStockProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Produkte mit niedrigem Bestand</h2>

    <?php if (!empty($lowStockProducts)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Produktname</th>
                <th>Preis (€)</th>
                <th>Verfügbarer Bestand</th>
                <th>Schwellenwert (Grenze)</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($lowStockProducts as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['art_name']); ?></td>
                    <td>€ <?php echo number_format($product['art_preis'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($product['menge']); ?></td>
                    <td><?php echo htmlspecialchars($product['grenze']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-success">
            Alle Produkte haben genügend Bestand.
        </div>
    <?php endif; ?>
</div>

<?php include "footer.php"; ?>
