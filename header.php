<?php
ob_start();

// Check if session is not already started, then start it
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$loggedIn = isset($_SESSION['user']);


require_once 'Database.php';
require_once 'Product.php';

// Calculate total items in the cart
$total_items = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;

// Fetch categories from the database
$db = Database::getInstance();
$query = $db->prepare("SELECT * FROM u_kat");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <!-- <link rel="stylesheet" href="light-theme.css" id="theme-style"> -->
    <title><?=htmlspecialchars($title)?> - BBQ Apotheke</title>
</head>
<body class="d-flex flex-column min-vh-100">

<main class="flex-grow-1 ms-3 mt-5 pt-5 me-3">
    <div class="container-md">
        <div class="row">
            <div class="col-12">
                <!-- Navigation -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary-fluid fixed-top text-center" style="background-color: #e3f2fd;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php"><img src="img/bbq-apotheke.jpeg" height="50px"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php"><strong>BBQ Apotheke</strong></a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kategorien
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php foreach ($categories as $category): ?>
                                            <li><a class="dropdown-item" href="category.php?u_kat_id=<?= $category['u_kat_id'] ?>"><?= htmlspecialchars($category['u_kat_name']) ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="about_us.php">Über uns</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Kontakt</a></li>
                                <li class="nav-item"><a class="nav-link" href="service_center.php">Service</a></li>
                            </ul>
                        </div>
                            <ul class="navbar-nav ms-auto">
                                <form class="d-flex" action="search.php" method="get" role="search">
                                    <input class="form-control me-2" type="search" name="query" placeholder="suchen" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Suchen</button>
                                </form>
                                <li class="nav-item">
                                    <a class="nav-link" href="account.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="<?= $loggedIn ? 'green' : 'currentColor' ?>" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item position-relative">
                                    <a class="nav-link" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                        </svg>
                                        <?php if ($total_items > 0): ?>
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count">
                                                <?=$total_items?>
                                                <span class="visually-hidden">items in cart</span>
                                            </span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div>&nbsp;</div>
                <!-- End of Navigation -->
            </div>
        </div>