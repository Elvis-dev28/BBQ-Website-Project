<?php
$title = "Startseite";

include "header.php"; // header.php has Product and Database classes.
require_once "Carousel.php";  // Include the Carousel class which is special to index.php

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Instantiate the Product object
$product = new Product($db);

// Instantiate the Carousel object
$carousel = new Carousel();

// Fetch 9 random products for the carousel
$randomProducts = $product->getRandomProducts(9);

// Split products into chunks of 3 for the carousel slides
$carouselItems = array_chunk($randomProducts, 3);

// Fetch the products for the first category (change the u_kat_id as needed)
$u_kat_id = 2;
$products1 = $product->getProductsByCategory($u_kat_id);

// Fetch the products for the second category
$u_kat_id = 3;
$products2 = $product->getProductsByCategory($u_kat_id);

// Render the carousel
$carousel->renderCarousel($carouselItems);
?>

<!-- Service Center icons -->
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-3 col-sm-6">
                <div class="p-3">
                    <a href="service_center.php#loyalty-program" class="text-decoration-none text-dark">
                        <i class="bi bi-percent fs-1"></i>
                        <p class="">Treueprogramm & Gutscheine</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="p-3">
                    <a href="service_center.php#shipping-delivery" class="text-decoration-none text-dark">
                        <i class="bi bi-truck fs-1"></i>
                        <p class="">Versand & Lieferung</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="p-3">
                    <a href="service_center.php#my-account" class="text-decoration-none text-dark">
                        <i class="bi bi-person-circle fs-1"></i>
                        <p class="">Kundenkonto</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="p-3">
                    <a href="service_center.php#payment-options" class="text-decoration-none text-dark">
                        <i class="bi bi-cash-stack fs-1"></i>
                        <p class="">Zahlungsmöglichkeiten</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END of Service Center icons -->

<!-- Render the products from the First Category -->
<?php $product->renderProducts($products1); ?>
<!-- End of First Category -->

<!-- Render the products from the Second Category -->
<?php $product->renderProducts($products2); ?>
<!-- End of Second Category -->

<?php
include "footer.php";
?>