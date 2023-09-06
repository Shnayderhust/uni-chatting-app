<?php
require_once "./modules/signup.view.inc.php";
require_once "./modules/sessionconfig.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- linking shortcut icon at the header of the site on the tab named favicon found in assets the pics and icons subfolder -->
    <link rel="shortcut icon" href="./assets/pics and icons/favicon.png">
    <!-- linking css file named reg.css found in assets folder -->
    <link rel="stylesheet" href="./assets/reg.css">
    <title>Unigram | Register</title>
</head>

<body>

    <!-- in body container there are two container named section one with class of left and another with class of right -->

    <!-- this section tag is like a container that hold other html contents  -->
    <section class="left">
        <!-- the div bellow acts as the header of the this section -->
        <div>
            <h1 class="mlogo"><img src="./assets/pics and icons/favicon.png" alt="">Unigram</h1>
            <p>Unigram makes it easy and fun to communicate!.</p>
            <button>Sign Up With Google</button>
            <div class="div">
                <hr>
                <span>OR</span>
                <hr>
            </div>



            <!-- This Container Bellow is Responsible for Receiving Error Messages On Registration -->

            <div id="<?php if (isset($_SESSION["error_signup"])) {
                            echo 'errorcontainer';
                        } else {
                            echo 'noerror';
                        } ?>">
                <?php display_error(); ?>
            </div>

        </div>

        <!-- This is the inputs form that a user fill out his/her details for registration
    
        Each input and its lable are wrapped inside section just for easy and responsive styling with css

        The method of form is set to Post which is more secure than get in the case of submitting user data
        -->

        <form action="./modules/signup.inc.php" id="regform" method="POST">
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

            <button>Sign Up</button>
            <p>Already got an account?<span class="mlogin">Log in</span></p>
        </form>

    </section>

    <!-- This section with clss of rigth is the one with purple color in the registration form which is empty we can fill it with some dope design like the app logo or a picture later -->
    <section class="right">

    </section>


    <script src="nav.js"></script>
</body>

</html>