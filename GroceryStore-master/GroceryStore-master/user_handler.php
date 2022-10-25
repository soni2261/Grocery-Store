<?php

require("php/util/user_reader.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postalCode = $_POST['postalCode'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $users[] = null;

        if (file_exists("database/users.json")) {
            $input = file_get_contents("database/users.json", true);
            $users = json_decode($input);
        }

        if (!isset_user($email)) {


            $thisUser = array(
                "firstName" => $firstName,
                "lastName" => $lastName,
                "email" => $email,
                "address" => $address,
                "postalCode" => $postalCode,
                "password" => $password,
                "role" => $role
            );


            //add user to user list
            $users[] = $thisUser;

            //encore users
            $json = json_encode($users);

            if (file_put_contents("database/users.json", $json)) {
                //redirect to selected page after submission
                echo "<script type='text/javascript'> document.location = 'backstore/user_profile_edit.php?user=" . $email . "&msg=Successfully Added'; </script>";
            } else {
                echo "Oops! Error creating json file...";
            }

        }
        else {
            //checks if user already exists, and if it can be edited

            //if users list isnt empty
            if (!is_null($users)){

                echo $email;

                //find where user is in the json list
                $key = array_search($email, array_column($users, 'email'));

                $thisUser = array(
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "address" => $address,
                    "postalCode" => $postalCode,
                    "role" => $role
                );

                $replacementArray = array_replace((array)$users[$key], $thisUser);

                $users[$key] = $replacementArray;

                $json = json_encode($users);

                if (file_put_contents("database/users.json", $json)) {
                    //redirect to selected page after submission
                    echo "<script type='text/javascript'> document.location = 'backstore/user_profile_edit.php?user=" . $email . "&msg=Successfully Modified'; </script>";

                } else {
                    echo "Oops! Error creating json file...";
                }

            }
        }
    } else {
        echo "empty form";
    }
}