<?php
require_once 'autoload.php';

$productId = filter_input(INPUT_GET, 'product', FILTER_VALIDATE_INT);

if (empty($productId) || !isset($products[$productId])) {
    $_SESSION['message'] = 'Product is missing';
    header('Location: index.php');
}

$product = $products[$productId];
if (!isset($_SESSION['cart'][$product['id']])) {
    $_SESSION['cart'][$product['id']] = $product;
    $_SESSION['cart'][$product['id']]['amount'] = 0;
}

$_SESSION['cart'][$product['id']]['amount'] += 1;

$_SESSION['message'] = 'Product ' . $product['name'] . ' added to cart';
header('Location: index.php');