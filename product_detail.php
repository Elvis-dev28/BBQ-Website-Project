<?php
$title = "Produkt Details";
// Include necessary files and initialize database connection
include "header.php";

// Get the product ID from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Instantiate the Product object
$productObj = new Product($db);

// Fetch the product details by ID
$product = $productObj->getProductById($product_id);

// Check if the product exists
if (!$product) {
    echo '<div class="container text-center"><h2>Produkt nicht gefunden.</h2></div>';
    include "footer.php";
    exit();
}

// Fetch the stock of the product from the lager table
$stock = $productObj->getProductStock($product_id);

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Product Image -->
            <div class="text-center mb-2">
                <img src="<?php echo htmlspecialchars($product['art_bild']); ?>" class="img-fluid" width="50%" alt="<?php echo htmlspecialchars($product['art_name']); ?>">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Product Details -->
            <h2><?php echo htmlspecialchars($product['art_name']); ?></h2>
            <h5 class="mt-5">Das Produkt auf einen Blick</h5>
            <p><?php echo $product['art_desc']; ?></p>
            <h3 class="text-danger">€ <?php echo number_format($product['art_preis'], 2, ',', '.'); ?></h3>

            <?php if ($stock > 0): ?>
                <!-- Add to Cart Form -->
                <form action="add_to_cart.php" method="post" class="add-to-cart-form">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['art_id']); ?>">
                    <button type="submit" class="btn btn-primary mt-3 mb-3">In den Warenkorb</button>
                </form>
                <p>Verfügbarer Bestand: <?php echo $stock; ?></p>
            <?php else: ?>
                <!-- Out of Stock Message -->
                <p class="text-danger mt-3 mb-3">Dieses Produkt ist derzeit nicht verfügbar.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
