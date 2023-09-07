<?php

function display_error()
{
    if (isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        foreach ($errors as $error) {
            echo '<p class="errormessage"> ' . $error . ' </p>';
        }

        unset($_SESSION["error_signup"]);
    }
}

function signupsuccess()
{
    if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<p class='signupsuccessmessage'>You Have Successfull Sign Up</p>";
        echo "<p class='signupsuccessmessage'>Now Log In Using Your Credentials</p>";
    }
}
