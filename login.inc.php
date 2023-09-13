<?php
require_once "sessionconfig.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password_received = $_POST["password"];
    $password = trim($password_received);

    try {
        require_once "dbconnection.inc.php";
        require_once "login_model.inc.php";
        require_once "login_control.inc.php";

        // ERROR HANDLING
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Please fill out all your credentials";
        }

        $result = get_user($unigram_conn, $username);
        $hashed_pass_db = trim($result["password"]);

        if (!is_input_empty($username, $password) && is_username_invalid($result["username"])) {
            $errors["wrong_username"] = "This User Name doesn't exist";
        } else if (!is_input_empty($username, $password) && is_password_invalid($password, $hashed_pass_db)) {
            $errors["wrong_password"] = "Incorect Password";
        } else if (!is_input_empty($username, $password) && !is_password_invalid($password, $hashed_pass_db) && !is_username_invalid($result["username"])) {
            $_SESSION["userid"] = $result["user_id"];
            $_SESSION["username"] = $result["username"];
            $_SESSION["userbio"] = $result["bio"];
            $_SESSION["fileDestination"] = $result["profile_pic_id"];
            $profile_pic_id = $_SESSION["fileDestination"];

            $newUserId = session_create_id();
            $sessionId = $newUserId . "_" . $result["user_id"];
            session_id($sessionId);
            $_SESSION["last_regenarate"] = time();
            header("location: chat.php");

            exit();
        }

        if ($errors) {
            $_SESSION["error_login"] = $errors;
            header("location: login.php");
            exit();
        }


        $unigram_conn = null;
        $stmt = null;
        exit();
    } catch (PDOException $e) {
        die("connection error:" . $e->getMessage());
    };
} else {
    header("location: login.php");
    exit();
}
