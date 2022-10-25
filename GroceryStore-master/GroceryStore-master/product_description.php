<?php
session_start();
include("php/util/desc_reader.php");
if (isset($_GET['id'])) {
    $name = get_prod_property("database/inventory.json", $_GET['id'], 'product_name');
    $description = get_prod_property("database/inventory.json", $_GET['id'], 'description');
    $img_src = get_prod_property("database/inventory.json", $_GET['id'], 'img_src');
    $product_price = get_prod_property("database/inventory.json", $_GET['id'], 'product_price');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="products/product_description.css"/>
    <meta charset="UTF-8"/>
    <?php
    echo "<title>Groscerise - $name Description</title>";
    ?>
    <link href="css/grocery/styles.css" rel="stylesheet"/>
    <link href="css/grocery/styles_p2.css" rel="stylesheet"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Urbanist:wght@200&display=swap");
    </style>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
    />
</head>
<body>
<div class="navbar-wrp">
    <div class="nav-lg">
        <h1 class="nav-tlt">Groscerise</h1>
    </div>
    <div>
        <a href="index.php" type="button" class="btn nav-button">
            <h1 class="nav-text">Home</h1>
        </a>
        <a href="index.php#categories" type="button" class="btn nav-button">
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
        <a href="shoppingcart.php">
            <img src="assets/cart-icon.png" width="70%" height="70%"/>
        </a>
        <a
                href="login.php"
                type="button"
                class="btn nav-button nav-button-special"
        >
            <h1 class="nav-text nav-text-special">Login</h1>
        </a>
        <a href="signup.html" type="button" class="btn nav-button">
            <h1 class="nav-text">Register</h1>
        </a>
    </div>
</div>

<div class="spacer-wrapper-not-animated"></div>

<div class="product-wrapper">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-4">
                <?php
                echo "<div class=\"row\"><h1 id=\"productName\">$name</h1></div>";
                ?>
                <div class="row" style="height: 40px"></div>
                <img
                        id="imgSample"
                    <?php echo "src=\"$img_src\"" ?>
                        class="img-thumbnail img-responsive"
                />
                <div class="row" style="height: 40px"></div>
                <h2>Price: $<span id="productPrice"><?php echo $product_price; ?></span>/pack</h2>
            </div>
            <div class="col-lg-8">
                <div class="row" style="height: 80px"></div>
                <h1 class="description" style="font-size: 40px;">Description</h1>
                <h1 class="description mb-4">
                    <?php
                    echo $description;
                    ?>
                </h1>
                <h5 class="btn btn-danger mb-4" id="moreDescButton" onclick="toggleDisplayMoreDesc()">More
                    Description</h5>
                <div class="row" id="moreDesc" style="padding: 0 20% 0 20%">
                    <h5 style="padding-bottom: 10px">
                        Nutrition Facts
                    </h5>
                    <table class="mb-4" style="background-color: #f4f4f4; border: solid 4px rgb(60,1,1)">
                        <tr>
                            <th><b>Nutrition Facts</b></th>
                            <th><b>Values</b></th>
                        </tr>
                        <tr>
                            <td><b>Calories</b></td>
                            <td>52</td>
                        </tr>
                        <tr>
                            <td><b>Water</b></td>
                            <td>86%</td>
                        </tr>
                        <tr>
                            <td><b>Protein</b></td>
                            <td>0.3 grams</td>
                        </tr>
                        <tr>
                            <td><b>Carbs</b></td>
                            <td>13.8 grams</td>
                        </tr>
                        <tr>
                            <td><b>Sugar</b></td>
                            <td>10.4 grams</td>
                        </tr>
                        <tr>
                            <td><b>Fiber</b></td>
                            <td>2.4 grams</td>
                        </tr>
                        <tr>
                            <td><b>Fat</b></td>
                            <td>0.2 grams</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 style="color: aliceblue">Weight</h4>
                <div class="row" style="height: 20px"></div>
                <h5 style="color: aliceblue">12g/pack</h5>
            </div>
            <div class="col-sm-3 col-lg-2">
                <h4 style="color: aliceblue">Quantity</h4>
                <div class="row" style="height: 20px"></div>
                <div class="increment-wrapper">
                    <span style="cursor: pointer" class="minus">-</span>
                    <span class="number"></span>
                    <span style="cursor: pointer" class="plus">+</span>
                </div>
            </div>
            <div class="col-md-4">
                <h4 style="color: aliceblue">Total Price</h4>
                <div class="row" style="height: 20px"></div>
                <h5 style="color: aliceblue" id="displayedPrice"></h5>
            </div>
        </div>
        <div class="container-md">
            <div class="row" style="height: 120px"></div>
            <div class="row justify-content-sm-center justify-content-lg-end">
                <div class="col-sm-4 col-lg-2 align-self-center">
                    <button class="prod-button-add-cart" onclick="addToCart()" style="padding: 8%">
                        <h1 class="add-cart">Add to Cart</h1>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="spacer-wrapper"></div>
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

<script src="js/grocery/products.js" rel="script"></script>
</body>
</html>
