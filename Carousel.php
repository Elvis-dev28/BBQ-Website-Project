<?php
class Carousel {
    // Method to render the carousel
    public function renderCarousel(array $carouselItems) {
        echo '<div id="productCarouselWrapper" class="d-none d-lg-block">';
        echo '<div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">';
        echo '<div class="carousel-inner text-center">';

        $isActive = 'active';  // Set the first item as active
        foreach ($carouselItems as $products) {
            echo '<div class="carousel-item ' . $isActive . '">';
            echo '<div class="row">';
            foreach ($products as $productItem) {
                echo '<div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column">';
                echo '<div class="card h-100 d-flex flex-column" style="height: 350px;">'; // Set fixed height for card

                // Wrap the image and title in an <a> tag
                echo '<a href="product_detail.php?id=' . htmlspecialchars($productItem['art_id']) . '" style="text-decoration:none; color: #000000">';
                echo '<img src="' . htmlspecialchars($productItem['art_bild']) . '" class="card-img-top carousel-img" height="50%" style="object-fit: cover;" alt="' . htmlspecialchars($productItem['art_name']) . '">';
                echo '<div class="card-body d-flex flex-column">';
                echo '<h5 class="card-title mb-n4" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . htmlspecialchars($productItem['art_name']) . '</h5>';
                echo '</div>';
                echo '</a>';
                echo '</div>'; // Close .card
                echo '</div>'; // Close .col
            }
            echo '</div>'; // Close .row
            echo '</div>'; // Close .carousel-item
            $isActive = '';  // Only the first item should be active
        }

        echo '</div>';  // Close .carousel-inner

        // Carousel Controls
        echo '<button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">';
        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        echo '<span class="visually-hidden">Previous</span>';
        echo '</button>';
        echo '<button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">';
        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        echo '<span class="visually-hidden">Next</span>';
        echo '</button>';

        // Carousel Indicators
        echo '<div class="carousel-indicators mt-5">';
        for ($i = 0; $i < count($carouselItems); $i++) {
            echo '<button type="button" data-bs-target="#productCarousel" data-bs-slide-to="' . $i . '" class="' . ($i === 0 ? 'active' : '') . '" aria-current="true" aria-label="Slide ' . ($i + 1) . '"></button>';
        }
        echo '</div>';  // Close .carousel-indicators

        echo '</div>';  // Close .carousel
        echo '</div>';  // Close .productCarouselWrapper
    }
}
?>
