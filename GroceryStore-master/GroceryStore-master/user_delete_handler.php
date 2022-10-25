<?php

require("php/util/user_reader.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {

        $email = $_POST['email'];
        $users[] = null;

        if (file_exists("database/users.json")) {
            $input = file_get_contents("database/users.json", true);
            $users = json_decode($input);
        }

        //find in which user the email is
        $key = array_search($email, array_column($users, 'email'));

        //delete user at key
        unset($users[$key]);

        //rebase array
        $users = array_values($users);

        $json = json_encode($users);

        //write json to file
        if (file_put_contents("database/users.json", $json)){
            echo "<script type='text/javascript'> document.location = 'backstore/user_profiles.php'; </script>";
        } else {
            echo "Oops! Error creating json file when deleting user...";
        }
    }
}