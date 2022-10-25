<?php
session_start();
include("../php/util/desc_reader.php");
$products = get_prod_by_aisle("../database/inventory.json", "Fruits");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Groscerise - Fruits Aisle</title>
    <link href="../css/grocery/styles.css" rel="stylesheet">
    <link href="../css/grocery/styles_p2.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@200&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
<div class="navbar-wrp">
    <div class="nav-lg">
        <h1 class="nav-tlt">Groscerise</h1>
    </div>
    <div>
        <a href="../index.php" type="button" class="btn nav-button">
            <h1 class="nav-text">Home</h1>
        </a>
        <a href="../index.php#categories" type="button" class="btn nav-button">
            <h1 class="nav-text">Aisles</h1>
        </a>
    </div>
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h1 class=\"nav-text\" style=\"color: white\">$username</h1>";
    }
    ?>
    <div class="nav-login">
        <a href="../shoppingcart.php">
            <img src="../assets/cart-icon.png" width="70%" height="70%"/>
        </a>
        <a href="../login.php" type="button" class="btn nav-button nav-button-special">
            <h1 class="nav-text nav-text-special">Login</h1>
        </a>
        <a href="../signup.html" type="button" class="btn nav-button">
            <h1 class="nav-text">Register</h1>
        </a>
    </div>
</div>
<div class="spacer-wrapper-not-animated">
</div>

<div class="empty-spacer">
    <h1 class="title">Fruits</h1>
</div>

<?php
$rows = ceil(sizeof($products) / 4);
$columns_last_line = sizeof($products) % 4 == 0 ? 4 : sizeof($products) % 4;
$index = -1;

for ($i = 0; $i < $rows; $i++) {
    echo "<div class=\"categories-wrapper\">";

    if ($i == $rows - 1)
        for ($j = 0; $j < $columns_last_line; $j++) {
            $index++;

            $id = $products[$index]['id'];
            $name = get_prod_property("../database/inventory.json", $id, 'product_name');
            $img_src = get_prod_property("../database/inventory.json", $id, 'img_src');
            $product_price = get_prod_property("../database/inventory.json", $id, 'product_price');


            echo
            "<div class=\"cat-wrapper\">
                <div class=\"cat-img-wrapper\">
                    <a href=\"../product_description.php?id=$id\">
                        <img class=\"cat-img\" src=\"../$img_src\"/>
                    </a>
                </div>
                <a href=\"../product_description.php?id=$id\" style=\"text-decoration: none;\">
                    <h1 class=\"name\">$name</h1>
                </a>
                <h1 class=\"price\">$$product_price/unit</h1>
            </div>";
        }
    else
        for ($j = 0; $j < 4; $j++) {
            $index++;

            $id = $products[$index]['id'];
            $name = get_prod_property("../database/inventory.json", $id, 'product_name');
            $img_src = get_prod_property("../database/inventory.json", $id, 'img_src');
            $product_price = get_prod_property("../database/inventory.json", $id, 'product_price');


            echo
            "<div class=\"cat-wrapper\">
                <div class=\"cat-img-wrapper\">
                    <a href=\"../product_description.php?id=$id\">
                        <img class=\"cat-img\" src=\"../$img_src\"/>
                    </a>
                </div>
                <a href=\"../product_description.php?id=$id\" style=\"text-decoration: none;\">
                    <h1 class=\"name\">$name</h1>
                </a>
                <h1 class=\"price\">$$product_price/unit</h1>
            </div>";
        }
    echo "</div>";
}
?>
<div class="empty-spacer">
</div>

<div class="spacer-wrapper">
</div>

<div class="foot-wrapper">
    <div class="foot-cat-wrapper">
        <h1 class="foot-cat-title">Get to Know Us</h1>
        <h1 class="foot-cat-elem">Careers</h1>
        <h1 class="foot-cat-elem">Category</h1>
        <h1 class="foot-cat-elem">Category</h1>
    </div>
    <div class="foot-cat-wrapper">
        <h1 class="foot-cat-title">Meat</h1>
        <h1 class="foot-cat-elem">Category</h1>
        <h1 class="foot-cat-elem">Category</h1>
        <h1 class="foot-cat-elem">Category</h1>
    </div>
    <div class="foot-cat-wrapper">
        <h1 class="foot-cat-title">Dairy</h1>
        <h1 class="foot-cat-elem">Category</h1>
        <h1 class="foot-cat-elem">Category</h1>
        <h1 class="foot-cat-elem">Category</h1>
    </div>
    <div class="foot-cat-wrapper">
        <h1 class="foot-cat-title">Customer service</h1>
        <h1 class="foot-cat-elem">Contact us</h1>
        <h1 class="foot-cat-elem">Find a store</h1>
        <h1 class="foot-cat-elem">FAQ</h1>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</html>
