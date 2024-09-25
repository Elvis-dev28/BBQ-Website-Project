<?php
$title = "Kategorie";

include "header.php";

// Get the category ID from the URL
$u_kat_id = isset($_GET['u_kat_id']) ? intval($_GET['u_kat_id']) : 0;

if ($u_kat_id > 0) {
    // Get the database instance and product class
    $db = Database::getInstance();
    $product = new Product($db);

    // Fetch products by category and the category name
    $products = $product->getProductsByCategory($u_kat_id);
    $categoryName = $product->getCategoryName($u_kat_id);

    // Display products in the category
    echo '<div class="container">';
    echo '<h2>Produkte in der Kategorie: ' . htmlspecialchars($categoryName) . '</h2>';

    if (!empty($products)) {
        echo '<div class="row gx-3 gy-4 text-center">';

        foreach ($products as $row) {
            $productStock = $product->getProductStock($row['art_id']); // Get the product stock

            echo '<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-column">';
            echo '<div class="card mb-4 h-100 d-flex flex-column">';
            echo '<a href="product_detail.php?id=' . htmlspecialchars($row['art_id']) . '" style="text-decoration:none; color: #000000">';
            echo '<img src="' . htmlspecialchars($row['art_bild']) . '" class="card-img-top" alt="' . htmlspecialchars($row['art_name']) . '">';
            echo '<div class="card-body d-flex flex-column">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['art_name']) . '</h5>';
            $description = substr($row['art_desc'], 0, 70);
            $description = substr($description, 0, strrpos($description, ' ')); // Cut off at the last space
            echo '<p class="card-text">' . strip_tags($description) . '...</p>';
            echo '</a>';
            echo '<div class="mt-auto">';
            echo '<h5 class="price text-danger">€ ' . number_format($row['art_preis'], 2, ',', '.') . '</h5>';

            // Conditionally render the "In den Warenkorb" button or "not available" message based on stock
            if ($productStock > 0) {
                echo '<form action="add_to_cart.php" method="post" class="add-to-cart-form">';
                echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['art_id']) . '">';
                echo '<button type="submit" class="btn btn-primary mt-2">In den Warenkorb</button>';
                echo '</form>';
            } else {
                echo '<p class="text-danger mt-2">nicht verfügbar</p>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<div class="container mt-5"><h2>Keine Produkte in dieser Kategorie.</h2></div>';
    }
    echo '</div>';
} else {
    echo '<div class="container mt-5"><h2>Ungültige Kategorie.</h2></div>';
}

include "footer.php";
