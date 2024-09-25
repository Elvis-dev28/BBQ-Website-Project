<?php
include_once 'Database.php';
include_once 'Product.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>BBQ Apotheke</title>
</head>
<body>
  <div class="container-md">
    <div class="row">
      <div class="col-12">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary-fluid fixed-top text-center" style="background-color: #e3f2fd;">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto"> <!-- Aligned these items to the left/center -->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">BBQ Apotheke</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto"> <!-- Aligned these items to the right -->
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="bi bi-person"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End of Nabigation -->

      </div>
    </div>


 <?php
// Instantiate the Database object and establish a connection
$database = new Database();
$db = $database->connect();

// Instantiate the Product object
$product = new Product($db);

// Fetch the products for the first category (change the u_kat_id as needed)
$u_kat_id = 1;
$products1 = $product->getProducts($u_kat_id);

// Fetch the products for the second category
$u_kat_id = 2;
$products2 = $product->getProducts($u_kat_id);

 function renderProducts($products) {
     echo '<div class="row gx-3 gy-4 text-center mt-2 mb-2">';
     while ($row = $products->fetch(PDO::FETCH_ASSOC)) {
         echo '<div class="col-lg-3 col-md-6 col-sm-12">';
         echo '<div><img src="img/' . $row['art_bild'] . '" /></div>';
         echo '<div class="product-name"><h6>' . $row['art_name'] . '</h6></div>';
         echo '<div><h5 class="price">' . $row['art_preis'] . '</h5></div>';
         echo '<div><button type="button" class="btn btn-primary mt-2">Add to Basket</button></div>';
         echo '</div>';
     }
     echo '</div>';
 }

 ?>

<!-- Products 1 -->
<?php renderProducts($products1); ?>
<!-- Products 1 End -->

<!-- Products 2 -->
<?php renderProducts($products2); ?>

<!-- Products 2 End -->

<!-- End of .container -->
</div>
<!-- footer -->
<div class="container-fluid">
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-dark"
          style="background-color: #e3f2fd"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4 text-black"
             style="background-color: #e3f2fd"
             >
      <!-- Left -->
      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="#" class="text-black me-4"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-black me-4"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="text-black me-4"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-black me-4"><i class="bi bi-linkedin"></i></a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="fw-bold">BBQ Apotheke</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 100%; background-color: #0491f7; height: 2px"
                />
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="fw-bold">Products</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 100%; background-color: #0491f7; height: 2px"
                />
            <p><a href="#!" class="text-dark">Link 1</a></p>
            <p><a href="#!" class="text-dark">Link 2</a></p>
            <p><a href="#!" class="text-dark">Link 3</a></p>
            <p><a href="#!" class="text-dark">Link 4</a></p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="fw-bold">Useful links</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 100%; background-color: #0491f7; height: 2px" />
            <p><a href="#!" class="text-dark">Your Account</a></p>
            <p><a href="#!" class="text-dark">Become an Affiliate</a></p>
            <p><a href="#!" class="text-dark">Shipping Rates</a></p>
            <p><a href="#!" class="text-dark">Help</a></p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="fw-bold">Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 100%; background-color: #0491f7; height: 2px" />
            <p><i class="fas fa-home mr-3"></i> Hamburg, Wendenstrasse 23</p>
            <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 49 1234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 49 1234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: #e3f2fd"
         >
      © 2024 Copyright:
      <a class="text-dark" href="#"
         >BBQ Apotheke</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
