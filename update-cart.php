<?php

require_once 'autoload.php';

$productId = filter_input(INPUT_GET, 'product', FILTER_VALIDATE_INT);
$amount = filter_input(INPUT_GET, 'amount', FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

print_r($_REQUEST);
//kontroll kas toode olmas ja kas olemas cart
//milline action, [update, delete]

//update
//$product = $products[$productId];
// $_SESSION['cart'][$product['id']]['amount'] = $amount;
//suunamine cart.php

//delete unset($_SESSION['cart'][$product['id']])
//suunamine cart.php