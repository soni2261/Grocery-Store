<?php

require("php/util/desc_reader.php");
require("php/util/order_reader.php");

$order_id = $_GET['id'];
$user_id = $_GET['user_id'];

$data = $_GET['data'];
$json_data = json_decode($data);

$orders_json = file_get_contents("database/orders.json", true);
$json = json_decode($orders_json);


$total = 0;

$products = [];

foreach ($json_data as $product_id => $quantity) {
    $total += intval($quantity) * floatval(get_prod_property("database/inventory.json", $product_id, 'product_price'));

    $product = array(
        "product_id" => intval($product_id),
        "quantity" => intval($quantity)
    );

    $products[] = $product;
}

$order = array(
    "id" => intval($order_id),
    "userId" => intval($user_id),
    "total" => floatval(number_format((float)$total, 2, '.', '')),
    "products" => $products
);


if (!isset_id("database/orders.json", $order_id))
    $json[] = $order;
else {
    $index = array_search($order_id, array_column($json, 'id'));
    $json[$index] = $order;
}

$json = json_encode($json);

file_put_contents("database/orders.json", $json);
echo "<script type='text/javascript'> document.location = 'backstore/edit_order.php?id=' + $order_id; </script>";
