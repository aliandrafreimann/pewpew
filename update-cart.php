<?php

require_once 'autoload.php';

$productId = filter_input(INPUT_GET, 'product', FILTER_VALIDATE_INT);
$amount = filter_input(INPUT_GET, 'amount', FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

//print_r($_REQUEST);
if (empty($_SESSION['cart'] && $productId)) {
    $_SESSION['message'] = 'Product is missing';
    header('Location: cart.php');
}

$product = $products[$productId];

if ($action == 'update') {
    $_SESSION['cart'][$product['id']]['amount'] = $amount;
    header('Location: cart.php');

} elseif ($action == 'delete') {
    unset($_SESSION['cart'][$product['id']]);
    header('Location: cart.php');
}