<?php
$title = "Search Results";
include "header.php";

// Check if the search query exists
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Instantiate the Database object and establish a connection
    $db = Database::getInstance();

    // Instantiate the Product object
    $product = new Product($db);

    // Fetch products based on the search query
    $products = $product->searchProducts($searchQuery);

    // Function to render search results
    function renderSearchResults($products) {
        if (count($products) > 0) {
            echo '<h2 class="mt-5 pt-5">Suchergebnisse für "' . htmlspecialchars($_GET['query']) . '"</h2>';
            echo '<div class="row gx-3 gy-4 text-center">';
            foreach ($products as $row) {
                echo '<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-column">';
                echo '<div class="card mb-4 h-100 d-flex flex-column">';
                echo '<a href="product_detail.php?id=' . htmlspecialchars($row['art_id']) . '" style="text-decoration:none; color: #000000">';
                echo '<img src="' . htmlspecialchars($row['art_bild']) . '" class="card-img-top" alt="' . htmlspecialchars($row['art_name']) . '">';
                echo '<div class="card-body d-flex flex-column">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['art_name']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($row['art_desc']) . '</p>';
                echo '</a>';
                echo '<div class="mt-auto">';
                echo '<h5 class="price text-danger">€ ' . number_format($row['art_preis'], 2, ',', '.') . '</h5>';
                echo '<form action="add_to_cart.php" method="post" class="add-to-cart-form">';
                echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['art_id']) . '">';
                echo '<button type="submit" class="btn btn-primary mt-2">In den Warenkorb</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<h2 class="mt-5">Keine Ergebnisse für  "' . htmlspecialchars($_GET['query']) . '" gefunden</h2>';
        }
    }

    renderSearchResults($products);
} else {
    echo '<h2 class="mt-5">Keine Suchanfrage vorhanden.</h2>';
}

include "footer.php";
?>
