<?php

require("php/util/desc_reader.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {

        $product_name = $_POST['product_name'];
        $products[] = null;

        if (file_exists("database/inventory.json")) {
            $input = file_get_contents("database/inventory.json", true);
            $products = json_decode($input);
        }

        //find in which product the product_name is
        $key = array_search($product_name, array_column($products, 'product_name'));

        //delete product at key
        unset($products[$key]);

        //rebase array
        $products = array_values($products);

        $json = json_encode($products);

        //write json to file
        if (file_put_contents("database/inventory.json", $json)){
            echo "<script type='text/javascript'> document.location = 'backstore/inventory.php'; </script>";
        } else {
            echo "Oops! Error creating json file when deleting product...";
        }
    }
}