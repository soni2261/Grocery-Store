<?php

require("php/util/desc_reader.php");
require("php/util/order_reader.php");

$order_id = $_GET['id'];

$orders_json = file_get_contents("database/orders.json", true);
$json = json_decode($orders_json);

$index = array_search($order_id, array_column($json, 'id'));

unset($json[$index]);

$json = json_encode($json);

file_put_contents("database/orders.json", $json);
echo "<script type='text/javascript'> document.location = 'backstore/list_of_orders.php'; </script>";
