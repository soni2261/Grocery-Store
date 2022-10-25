<?php

function isset_prod($productName)
{
    $exists = false;
    $json_array = get_prod_json_array("database/inventory.json");

    foreach ($json_array as $product)
        if (strcasecmp($product["product_name"], $productName) == 0)
            $exists = true;

    return $exists;
}

function get_prod_property($path, $id, $property_name)
{
    $json_array = get_prod_json_array($path);

    foreach ($json_array as $product)
        if ($product["id"] == $id)
            return $product[$property_name];

    return null;
}

function get_prod_by_aisle($path, $aisle)
{
    $json_array = get_prod_json_array($path);

    $products = [];

    foreach ($json_array as $product)
        if ($product["aisle"] == $aisle)
            $products[] = $product;

    return $products;
}

function get_unset_id($path)
{
    $id = 1;
    $json_array = get_prod_json_array($path);
    foreach ($json_array as $product)
        if ($product["id"] != $id)
            return $id;
        else
            $id++;

    return sizeof($json_array) + 1;
}

function get_prod_json_array($path)
{
    $json_str_contents = file_get_contents($path, true);
    return json_decode($json_str_contents, true);
}
