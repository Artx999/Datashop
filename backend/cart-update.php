<?php
session_start();
require "func.php";
$product = $_POST["product"];
$quantity = $_POST["quantity"];
$productId= dbQuery("SELECT product_id FROM datashop.products WHERE product_name = '$product'")->fetch_assoc()["product_id"];
if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];
if (array_key_exists($productId, $_SESSION["cart"])) $_SESSION["cart"][$productId] += $quantity;
else $_SESSION["cart"] += [$productId => $quantity];
print array_sum($_SESSION["cart"]);