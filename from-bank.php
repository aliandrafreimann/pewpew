<?php

require_once 'autoload.php';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$cart = $_SESSION['cart'];

if ($action == 'success') {
    unset($_SESSION['cart']);
    $_SESSION['message'] = 'Thank you for buying';
    header('Location: index.php');
} elseif ($action == 'cancel') {
    header('Location: cart.php');
}
