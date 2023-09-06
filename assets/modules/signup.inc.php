<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["fn"];
    $lastname = $_POST["ln"];
    $username = $_POST["us"];
    $email = $_POST["em"];
    $password = $_POST["fn"];

    try {
        require_once "./dbconnection.inc.php";
        require_once "./signup.model.inc.php";
        require_once "./signup.control.inc.php";

        // ERROR HANDLING
        $errors = [];

        if (is_input_empty($firstname, $lastname, $username, $email, $password)) {
            $errors["empty_input"] = "Please fill out the Empty fields";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Please fill out a valid email";
        }
        if (is_username_taken($unigram_conn, $username)) {
            $errors["username_taken"] = "The username you choose is already taken";
        }
        if (is_email_registered($unigram_conn, $email)) {
            $errors["registered_email"] = "The email you used is already registered";
        }

        require_once "../modules/sessionconfig.inc.php";
        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            header("Location: ../Unigram/signup.php");
            die();
        }
    } catch (PDOException $e) {
        die("connection error:" . $e->getMessage());
    };
} else {
    header("location: ../../signup.php");
    die();
}
