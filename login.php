<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/pics and icons/favicon.png">
    <link rel="stylesheet" href="./assets/reg.css">
    <title>Unigram | Log In</title>
</head>

<body>

    <!-- Explanation for this file refer the register file given both this file and register file are designed the same way and ofcourse use the same css and js file 

    The difference is only how the js file target its event i changed some class and id names so the js file could only refer to events target available in this file only
    -->

    <section class="left">
        <div>
            <h1 class="mlogo"><img src="./assets/pics and icons/favicon.png" alt="">Unigram</h1>
            <p>Unigram makes it easy and fun to communicate!.</p>
            <button>Log In With Google</button>
            <div class="div">
                <hr>
                <span>OR</span>
                <hr>
            </div>
        </div>

        <form action="" id="loginform" method="POST">

            <section>
                <label for="user name">User Name</label>
                <input type="text" id="un" placeholder="Enter Your Username" autocomplete="off"><br>
            </section>

            <section>
                <label for="password" id="ps">Password</label>
                <input type="password" placeholder="Enter Your Password"><br>
            </section>

            <button type="button" name="login" id="gochat">Log In</button>
            <p>Dont have an account yet?<span class="reglink">Sign up for free</span></p>
        </form>

    </section>

    <section class="right">

    </section>

    <script src="nav.js"></script>
</body>

</html>