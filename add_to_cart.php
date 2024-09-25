<?php
session_start();

$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
if (!$product_id) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Product ID not set.'
    ]);
    exit;
}

// Check if the cart session is set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Debugging logs
//file_put_contents('debug_log.txt', "Product ID: $product_id\n", FILE_APPEND);

if (isset($_SESSION['cart'][$product_id])) {
    // Increase the quantity
    $_SESSION['cart'][$product_id]['quantity'] += 1;
} else {
    // Add the product to the cart with a quantity of 1
    $_SESSION['cart'][$product_id] = ['quantity' => 1];
}
header('Location: index.php');

// Calculate the total number of items in the cart
$total_items = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_items += $item['quantity'];
}

// Log the total items for debugging
//file_put_contents('debug_log.txt', "Total Items in Cart: $total_items\n", FILE_APPEND);

// Return a JSON response
echo json_encode([
    'status' => 'success',
    'total_items' => $total_items
]);