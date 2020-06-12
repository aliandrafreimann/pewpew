<?php
session_start();

//reset session
//unset($_SESSION);
//session_destroy();

$products = require_once 'products.php';
require_once 'functions.php';