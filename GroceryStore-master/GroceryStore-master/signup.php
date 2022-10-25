<?php

require("php/util/user_reader.php");

if (!empty($_POST)) {

    $email = $_POST['email'];

    if (file_exists("database/users.json")) {
        $input = file_get_contents("database/users.json", true);
        $users = json_decode($input);
    }

    if (!isset_user($email)) {

        $thisUser = array(
            "firstName" => $_POST['firstName'],
            "lastName" => $_POST['lastName'],
            "email" => $email,
            "address" => $_POST['address'],
            "postalCode" => $_POST['postalCode'],
            "password" => $_POST['password'],
            "role" => "customer",
        );

        $users[] = $thisUser;

        $json = json_encode($users);

        //write json to file

        if (file_put_contents("database/users.json", $json)) {
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        } else {
            echo "Oops! Error creating json file...";
        }
    } else {
        echo "<script type='text/javascript'> document.location = 'signup.html?msg=This User Already Exists'; </script>";
    }
}

