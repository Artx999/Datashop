<?php
require "func.php";
$phone = $_POST["phone"];

$result = dbQuery("SELECT orders.order_id, orders.customer_name, orders.order_pickup_time FROM orders WHERE phone = '$phone'");
foreach ($result as $row) {
    $orderId = $row["order_id"];
    $totalPrice = 0;
    print "Ordrenummer: " . $orderId . "<br/>";
    print "Kundens navn: " . $row["customer_name"] . "<br/>";
    print "Ønsket tidspunkt for henting: " . $row["order_pickup_time"] . "<br/>";
    print "<br/>Produkter bestilt:<br/>";
    $result2 = dbQuery("SELECT product_name, item_amount, product_price FROM order_items JOIN products on order_items.product_id = products.product_id WHERE order_id = '$orderId'");
    foreach ($result2 as $row2) {
        print $row2["product_name"] . ": " . $row2["item_amount"] . " stykk" . "<br/>";
        $totalPrice += $row2["product_price"] * $row2["item_amount"];
    }
    print "Totalpris: " . $totalPrice . ",-";
    print "<br/>-------------------------------------------<br/><br/>";
}

// Tripel join for later :(
// SELECT orders.order_id, orders.customer_name, orders.order_pickup_time, products.product_name, products.product_price, order_items.item_amount FROM orders JOIN order_items ON orders.order_id = order_items.order_id JOIN products on order_items.product_id = products.product_id WHERE orders.phone = 97069907