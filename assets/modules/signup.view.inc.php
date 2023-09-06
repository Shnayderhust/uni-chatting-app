<?php

function display_error()
{
    if (isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        foreach ($errors as $error) {
            echo '<p class="errormessage"> ' . $error . ' </p>';
        }

        unset($errors);
    }
}
