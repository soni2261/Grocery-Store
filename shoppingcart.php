<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Groscerise</title>
    <link href="css/grocery/shoppingcart.css" rel="stylesheet">
    <script src="js/grocery/shoppingcart.js" async></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@200&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<div class="navbar-wrp">
    <div class="nav-lg" style="padding: 5%">
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
        <a onclick="document.location.reload();">
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
<div class="spacer-wrapper-not-animated-veggies">
</div>

<!---Shopping cart starts here---->
<div id="shoppingList" class="container px-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h1 class="name1">Shopping Cart</h1>
            <div class="empty-spacer"></div>
        </div>
        <div class="col-7 column-titles">
            <div class="row text-right">
                <div class="col-4">
                    <h1 class="name2" Style="text-align: center">Product name</h1>
                </div>
                <div class="col-4">
                    <h1 class="name2" Style="text-align: center">Quantity</h1>
                </div>
                <div class="col-4">
                    <h1 class="name2" Style="text-align: center">Price</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="purchase-wrapper" id="purchaseWrapper">
        <div class="col align-content-end">
            <div class="card align-self-end">
                <div class="row">
                    <div class="row d-flex justify-content-end px-4">
                        <div class="col" style="text-align: left">
                            <h1 class="name4" Style="text-align: center">Total number of items</h1>
                        </div>
                        <div class="col" style="text-align: right">
                            <h1 class="name3" id="amountCheckout" Style="text-align: center">0</h1>
                        </div>
                        <div class="empty-spacer2"></div>
                    </div>
                    <div class="row d-flex justify-content-end px-4">
                        <div class="col" style="text-align: left">
                            <h1 class="name3" Style="text-align: center">Subtotal</h1>
                        </div>
                        <div class="col" style="text-align: right">
                            <h1 class="name3 subtotal" Style="text-align: center">$<span id="subtotal">0.00</span></h1>
                        </div>
                        <div class="empty-spacer2"></div>
                    </div>
                    <div class="row d-flex justify-content-end px-4">
                        <div class="col" style="text-align: left">
                            <h1 class="name3" Style="text-align: center">GST</h1>
                        </div>
                        <div class="col">
                            <h1 class="name3" Style="text-align: center">$<span id="gst">0.00</span></h1>
                        </div>
                        <div class="empty-spacer2"></div>
                    </div>
                    <div class="row d-flex justify-content-end px-4">
                        <div class="col" style="text-align: left">
                            <h1 class="name3" Style="text-align: center">QST</h1>
                        </div>
                        <div class="col">
                            <h1 class="name3" Style="text-align: center">$<span id="qst">0.00</span></h1>
                            <div class="empty-spacer2"></div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end px-4" id="tax">
                        <div class="col">
                            <div class="empty-spacer2"></div>
                            <h1 class="name3" Style="text-align: center">Total</h1>
                        </div>
                        <div class="col">
                            <div class="empty-spacer2"></div>
                            <h1 class="name3" Style="text-align: center">$<span id="total">0.00</span></h1>
                        </div>
                        <div class="empty-spacer2"></div>
                        <div class="empty-spacer2"></div>
                        <div class="row justify-content-center">
                            <button class="btn-block btn-blue" style="width:150px">
                                <span>
                                    <h1 class="name2" Style="text-align: center">Checkout</h1>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


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

<script src="../js/grocery/shoppingcart.js" rel="script"></script>

</html>
