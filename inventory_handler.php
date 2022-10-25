<?php

require("php/util/desc_reader.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {

        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $product_price = floatval($_POST['product_price']);
        $aisle = strcmp($_POST['aisle'], "") == 0 ? "Fruits" : $_POST['aisle'];
        $quantity = intval($_POST['quantity']);
        $id = get_unset_id("database/inventory.json");
        $img_src = "assets/aisles/" . strtolower($aisle) . "/" . basename($_FILES["productImage"]["name"]);
        move_uploaded_file($_FILES["productImage"]["tmp_name"], $img_src);

        $products[] = null;

        if (file_exists("database/inventory.json")) {
            $input = file_get_contents("database/inventory.json", true);
            $products = json_decode($input);
        }

        if (!isset_prod($product_name)) {

            $thisProduct = array(
                "id" => $id,
                "product_name" => $product_name,
                "description" => $description,
                "img_src" => filesize($_FILES["productImage"]["tmp_name"]) == 0 ? "../assets/aisles/other/default_image.png" : $img_src,
                "product_price" => $product_price,
                "aisle" => $aisle,
                "quantity" => $quantity,
            );

            //add products to product list, or create product list if doesn't already exist
            $products[] = $thisProduct;

            $json = json_encode($products);

            //write json to file

            if (file_put_contents("database/inventory.json", $json)) {
                //redirect to selected page after submission
                echo "<script type='text/javascript'> document.location = 'backstore/inventory_edit.php?msg=Successfully Added'; </script>";
            } else {
                echo "Oops! Error creating json file...";
            }
        } else {
            //checks if product already exists, and if it can be edited

            //if products isnt empty
            if (!is_null($products)) {

                //find where product is in the json list
                $key = array_search($product_name, array_column($products, 'product_name'));

                if (filesize($_FILES["productImage"]["tmp_name"]) == 0)
                    $thisProduct = array(
                        "description" => $description,
                        "product_price" => $product_price,
                        "aisle" => $aisle,
                        "quantity" => $quantity,
                    );
                else
                    $thisProduct = array(
                        "description" => $description,
                        "img_src" => $img_src,
                        "product_price" => $product_price,
                        "aisle" => $aisle,
                        "quantity" => $quantity,
                    );

                $replacementArray = array_replace((array)$products[$key], $thisProduct);

                $products[$key] = $replacementArray;

                $json = json_encode($products);

                if (file_put_contents("database/inventory.json", $json)) {
                    //redirect to selected page after submission
                    echo "<script type='text/javascript'> document.location = 'backstore/inventory_edit.php?product=" . $product_name . "&msg=Successfully Modified'; </script>";
                } else
                    echo "Oops! Error creating json file...";
            }

        }
    }

}