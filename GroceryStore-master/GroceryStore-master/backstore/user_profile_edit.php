<?php
session_start();
if (strcasecmp($_SESSION['role'], 'admin') != 0)
    echo "<script type='text/javascript'>document.location.replace(\"../index.php\");</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@200&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../css/grocery/styles_backstore.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Urbanist:wght@200&display=swap");
    </style>
    <title>Groscerise</title>
</head>
<body>
<main>
    <div class="container-md colorfill-pink">
        <div class="row transparent">
            <h1 style="color: black;">Profile</h1>
        </div>
    </div>

    <div class="container-md">

        <div class="row colorfill-grey align-items-center">
            <form action="../user_handler.php" method="post" id="form">
                <div class="row transparent">
                    <div class="col-md-12">
                        <h5> Change Avatar</h5>
                        <img src="../assets/user-backstore/default_user_image.png"
                             class="img-user img-responsive img-button">
                    </div>
                </div>

                <div class="row transparent" id="editBlock">
                    <div class="col-md-5">
                        <h5>First Name</h5>
                        <input type="first name" class="form-control" placeholder="First Name" id="firstName"
                               name="firstName">
                        <h5>Last Name</h5>
                        <input type="last name" class="form-control" placeholder="Last Name" id="lastName"
                               name="lastName">
                        <h5>Email</h5>
                        <input type="email" class="form-control" placeholder="someone123@email.com" id="email"
                               name="email">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5">
                        <h5>Address</h5>
                        <input type="text" class="form-control" placeholder="1234 Apple Street" id="address"
                               name="address">
                        <h5>Postal Code</h5>
                        <input type="text" class="form-control" placeholder="A1B 2C3" id="postalCode" name="postalCode">
                        <h5>Password</h5>
                        <input type="password" class="form-control" placeholder="Password" id="password"
                               name="password">
                        <h5>Admin</h5>
                        <label class="switch">
                            <input type="checkbox" id="checkBox">
                            <span class="slider round"></span>
                        </label>
                        <input type="hidden" class="form-control" id="role" name="role" value="customer">
                    </div>
                </div>
            </form>

            <div class="container-md">
                <div class="row transparent">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-dark btn-lg" id="save_changes">
                            <h1 class="textcolor">Save Changes</h1>
                        </button>
                    </div>
                </div>
            </div>
</main>

<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <a href="#" class="nav-link">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "<span class=\"link-text logo-text\">$username</span>";
                }
                ?>
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="angle-double-right"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                                class="fa-secondary"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                                class="fa-primary"
                        ></path>
                    </g>
                </svg>
            </a>
        </li>

        <li class="nav-item">
            <a href="user_profiles.php" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="space-station-moon-alt"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512"
                        class="fa-solid:users"
                >
                    <path
                            fill="currentColor"
                            d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"
                            class="fa-primary"
                    />
                </svg>
                <span class="link-text">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="inventory.php" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="space-station-moon-alt"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512"
                        class="fa-solid:box-open"
                >
                    <path
                            fill="currentColor"
                            d="M425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5c-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9zm212.6-112.2L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64L69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9z"
                            class="fa-primary"
                    />
                </svg>
                <span class="link-text">Inventory</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="list_of_orders.php" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="space-station-moon-alt"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"
                        class="fa-solid:dolly"
                >
                    <path
                            fill="currentColor"
                            d="M294.2 277.7c18 5 34.7 13.4 49.5 24.7l161.5-53.8c8.4-2.8 12.9-11.9 10.1-20.2L454.9 47.2c-2.8-8.4-11.9-12.9-20.2-10.1l-61.1 20.4l33.1 99.4L346 177l-33.1-99.4l-61.6 20.5c-8.4 2.8-12.9 11.9-10.1 20.2l53 159.4zm281 48.7L565 296c-2.8-8.4-11.9-12.9-20.2-10.1l-213.5 71.2c-17.2-22-43.6-36.4-73.5-37L158.4 21.9C154 8.8 141.8 0 128 0H16C7.2 0 0 7.2 0 16v32c0 8.8 7.2 16 16 16h88.9l92.2 276.7c-26.1 20.4-41.7 53.6-36 90.5c6.1 39.4 37.9 72.3 77.3 79.2c60.2 10.7 112.3-34.8 113.4-92.6l213.3-71.2c8.3-2.8 12.9-11.8 10.1-20.2zM256 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z"
                            class="fa-primary"
                    />
                </svg>
                <span class="link-text">Orders</span>
            </a>
        </li>

        <li class="nav-item" id="themeButton">
            <a href="../index.php" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="space-station-moon-alt"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="fa-solid:power-off"
                >
                    <path
                            fill="currentColor"
                            d="M400 54.1c63 45 104 118.6 104 201.9c0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4C7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31c-41.5 30.8-68 79.6-68 134.9c-.1 92.3 74.5 168.1 168 168.1c91.6 0 168.6-74.2 168-169.1c-.3-51.8-24.7-101.8-68.1-134c-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"
                            class="fa-primary"
                    />
                </svg>
                <span class="link-text">Logout</span>
            </a>
        </li>
    </ul>
</nav>

</body>

<script src="user_profile_edit.js" rel="script"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script

</html>