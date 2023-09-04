<!-- <?php  ?> -->
<?php
require './connection.php';

if (isset($_POST['regbutt'])) {
    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $username = $_POST['us'];
    $email = $_POST['em'];

    $password = password_hash($_POST["pas"], PASSWORD_DEFAULT);
    $date = date("Y-m-d");

    $query = "INSERT INTO users (firstname,lastname,username,email,password,reg_date) values('$firstname','$lastname','$username','$email','$password','$date')";

    $register = $unigram_conn->query($query) or die($unigram_conn->error . __LINE__);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/pics and icons/favicon.png">
    <link rel="stylesheet" href="./assets/reg.css">
    <title>Unigram | Register</title>
</head>

<body>
    <section class="left">
        <div>
            <h1 class="mlogo"><img src="./assets/pics and icons/favicon.png" alt="">Unigram</h1>
            <p>Unigram makes it easy and fun to communicate!.</p>
            <button>Sign Up With Google</button>
            <div class="div">
                <hr>
                <span>OR</span>
                <hr>
            </div>
        </div>

        <form action="./register.php" id="regform" method="POST">
            <section>
                <label for="first name">First Name</label>
                <input type="text" name="fn" placeholder="Enter Your First Name"><br>
            </section>

            <section>
                <label for="last name">Last Name</label>
                <input type="text" name="ln" placeholder="Enter Your Last Name"><br>
            </section>

            <section>
                <label for="user name">User Name</label>
                <input type="text" name="us" placeholder="Choose a Unique username" autocomplete="off"><br>
            </section>

            <section>
                <label for="email">Email</label>
                <input type="email" name="em" placeholder="Enter Your Email"><br>
            </section>

            <section>
                <label for="password">Password</label>
                <input type="password" name="pas" placeholder="Enter Your Password"><br>
            </section>

            <button type="button" id="regbutt" class="mlogin">Sign Up</button>
            <p>Already got an account?<span class="mlogin">Log in</span></p>
        </form>

    </section>
    <section class="right">

    </section>

    <script src="nav.js"></script>
</body>

</html>