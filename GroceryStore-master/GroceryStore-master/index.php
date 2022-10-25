<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Groscerise</title>
    <link href="css/grocery/styles.css" rel="stylesheet">
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
        <a href="index.php" type="button" class="btn nav-button">
            <h1 class="nav-text">Home</h1>
        </a>
        <a href="#categories" type="button" class="btn nav-button">
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
        <a href="login.php" type="button" class="btn nav-button nav-button-special">
            <h1 class="nav-text nav-text-special">Login</h1>
        </a>
        <a href="signup.html" type="button" class="btn nav-button">
            <h1 class="nav-text">Register</h1>
        </a>
    </div>
</div>
<div class="app-wrapper">
    <div class="input-wrapper">
        <div class="input-search-wrapper">
            <img src="assets/search-icon.png">
            <input class="input-search" placeholder="What's on your mind?">
        </div>
    </div>
</div>
<div class="categories-wrapper" id="categories">
    <div class="cat-wrapper">
        <div class="cat-img-wrapper">
            <a href="aisles/aisle_fruit.php">
                <img class="cat-img cat-img-kiwi" src="assets/fruits%20free.jpeg"/>
            </a>
        </div>
        <h1 style="margin-top: 5%;font-size: 30px; color: #000000">Fruits</h1>
    </div>

    <div class="cat-wrapper">
        <div class="cat-img-wrapper">
            <a href="aisles/aisle_vegetable.php">
                <img class="cat-img cat-img-veg" src="assets/veggies%20free.jpeg"/>
            </a>
        </div>
        <h1 style="margin-top: 5%;font-size: 30px;color: #000000">Vegetables</h1>
    </div>


    <div class="cat-wrapper">
        <div class="cat-img-wrapper">
            <a href="aisles/aisle_dairy.php">
                <img class="cat-img cat-img-veg" src="assets/dairy%202.0.jpeg"/>
            </a>
        </div>
        <h1 style="margin-top: 5%;font-size: 30px;color: #000000">Dairy</h1>
    </div>
</div>

<div class="categories-wrapper">
    <div class="cat-wrapper">
        <div class="cat-img-wrapper">
            <a href="aisles/aisle_meat.php">
                <img class="cat-img cat-img-veg" src="assets/meat%202.0.jpeg"/>
            </a>
        </div>
        <h1 style="margin-top: 5%;font-size: 30px;color: #000000">Meat</h1>
    </div>

    <div class="cat-wrapper">
        <div class="cat-img-wrapper">
            <a href="aisles/aisle_bakery.php">
                <img class="cat-img cat-img-veg" src="assets/bakery%20free.jpeg"/>
            </a>
        </div>
        <h1 style="margin-top: 5%;font-size: 30px;color: #000000">Bakery</h1>
    </div>

    <div class="cat-wrapper">
        <div class="cat-img-wrapper">
            <a href="aisles/aisle_pantry.php">
                <img class="cat-img cat-img-veg" src="assets/pantry%20free.jpeg"/>
            </a>
        </div>
        <h1 style="margin-top: 5%;font-size: 30px;color: #000000">Pantry</h1>
    </div>
</div>
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
