<?php
session_start();
require "func.php";
$name = $_POST["customer-name"];
$phone = $_POST["phone"];
$time = $_POST["pickup-time"];
$cart = $_SESSION["cart"];

$orderId = dbInsertOrder("INSERT INTO datashop.orders (phone, customer_name, order_pickup_time) VALUES ('$phone', '$name', '$time')");
foreach ($cart as $productId => $amount) {
    dbQuery("INSERT INTO datashop.order_items (order_id, product_id, item_amount) VALUES ('$orderId', '$productId', '$amount')");
}

$_SESSION["orderConfirmation"] = ["orderId" => $orderId, "pickupTime" => $time, "name" => $name, "phone" => $phone];
header("Location: ../order-confirmation.php");