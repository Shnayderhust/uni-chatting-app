<!-- NOTE THIS FILE WILL HAVE MANY CHANGES IN THE FUTURE -->

<?php
require_once "chat_view.inc.php";
require_once "friends.inc.php";
require_once "sessionconfig.inc.php";

if (!isset($_SESSION["userid"])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="assets/picsandicons/favicon.png">
    <link rel="stylesheet" href="assets/chat.css">
    <title>Unigram | Chat</title>
</head>

<body>

    <!-- To understand this file please refer more to css code given that note every container/secction in this file are displayed at the same time  
    
    The only containers that are by default displayed on visiting this page on browser is the div with class of left and the div with class of right... THE REMAIN CONTAINERS ARE DISPLAYED AFTER CERTAIN CONDITION BEING TRUE SUCH AS WHEN A USER CLICK A BUTTON THAT SAY CREATE NEW CHAT
    -->

    <div class="left">
        <nav id="nav">
            <img src="<?php if (isset($_SESSION["fileDestination"])) {
                            echo $_SESSION["fileDestination"];
                        } else {
                            echo './assets/UserPics/user.png';
                        } ?>" alt="" class="profpic">
            <div class="nextnav">
                <img src="assets/picsandicons/new message.svg" alt="new text" class="creatchat">
                <i class="fa-solid fa-ellipsis-vertical" id="ul"></i>
            </div>
        </nav>
        <div id="search">
            <div id="innersearch">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="Search A Chat">
            </div>
        </div>
        <div id="chats">
            <div class="tempo">
                <p>Newly Created Chats will be displayed here</p>
                <h1></h1>
                <h2></h2>
                <h3></h3>
            </div>
            <!-- <div class="chatslist">
                <div id="onechat">
                    <img src="./assets/picsandicons/avatar.jpg" alt="" id="profpic">
                    <div id="details">
                        <h3 id="jina">Shnayder</h3>
                        <div class="message">
                            <p id="text">Hellow there how have you been doing ghuvd sdkvoiu sdui</p>
                        </div>
                    </div>

                </div>

            </div> -->
        </div>
    </div>
    </div>

    <div class="right">

        <!-- within this div with class of right not all section containers are shown at the same time 

        By default the noactivechat div is shown when a user visit at the first time given he/she wont have previous chats...

        Then after creating new chats the activechat container will be displayed to user showing the chat he/she choose or create

        **--IN FUTURE I'LL UPDATE THIS CODE--**
        -->

        <section id="noactivechat">
            <img src="assets/picsandicons/favicon.png" alt="">
            <h1>Unigram</h1>
            <p>Unigram makes it easy and fun to stay close to your favorite people.</p>
            <button type="button" class="creatchat">New Chat</button>
        </section>

        <section id="activechat">
            <div id="chatnav">
                <p><img src="./assets/pics and icons/profpic02.jpg" alt="">Shnayder</p>
                <div id="nextchatnav">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
            </div>
            <div id="messagespace">

                <div class="outgoing">
                    <div class="outgoingmessage">
                        <p class="actualmessage">what up girl</p>
                    </div>
                </div>

                <div class="incoming">
                    <div class="incomingmessage">
                        <p class="actualmessage">what up</p>
                    </div>
                </div>

            </div>

            <div id="chatspace">
                <img src="assets/picsandicons/emoji.svg" alt="emoji">
                <i class="fa-solid fa-plus"></i>
                <input type="text" placeholder="Type a message">
            </div>
        </section>

    </div>

    <!-- This div with id of newchat is displayed only when the button attached with an event to display this div is clicked... by default in chat.css file it have a display of none... refer nav.js and chat.css -->
    <div id="newchat">

        <div id="header">
            <i class="fa-solid fa-arrow-left" id="chatlist"></i>
            <h1>Create New Chat</h1>
        </div>

        <div id="usernav">
            <div class="innerusernav">
                <i class="fa-solid fa-arrow-left" id="fsearchreturn"></i>
                <input type="search" placeholder="Search Friends" id="friendsearch">
            </div>
        </div>

        <div id="friendsearchresult">
            <?php displayuserprof($users) ?>
        </div>

        <div id="users">
            <h2>Your Friends</h2>
            <hr>
            <div class="userfriendlist">
                <?php displayuserfriends($allUserData) ?>
            </div>
        </div>

    </div>


    <!-- Also this is by default not displayed untill an event occur which is caused when a user click the three dotes on the nav bar of left div -->
    <div id="unorderd">
        <ul>
            <li>New Group</li>
            <li>Select Chats</li>
            <li class="settings">Settings</li>
            <li class="logoutform">Log Out</li>
        </ul>
    </div>


    <!-- This is setting form that is displayed only when a user choose to go to settings form and click setting within unorder small form  -->
    <div id="settings">
        <div id="sethead">
            <i class="fa-solid fa-arrow-left" id="chatlist"></i>
            <h1>Settings</h1>
        </div>

        <div id="setnav">
            <div class="innersetnav">
                <i class="fa-solid fa-arrow-left"></i>
                <input type="search" placeholder="Search Settings">
            </div>
        </div>


        <div id="setlist">

            <div id="setprof">
                <img src="<?php if (isset($_SESSION["fileDestination"])) {
                                echo $_SESSION["fileDestination"];
                            } else {
                                echo './assets/UserPics/user.png';
                            } ?>" alt="" class="profpic">
                <div>
                    <h1 id="username"><?php displayusername() ?></h1>
                    <p id="bio"><?php displaybio() ?></p>
                </div>
            </div>

            <ul>
                <li>Notification</li>
                <li>Theme</li>
                <li>Wallpaper</li>
                <li>Request Account Info</li>
                <li>Help</li>
            </ul>

            <div id="buttdiv">
                <button type="button" class="logoutform">Log Out</button>
            </div>
        </div>
    </div>

    <!-- This is profile form that is displayed only when a user choose to go to profile  -->

    <div id="profile">

        <div id="profhead">
            <i class="fa-solid fa-arrow-left" id="chatlist"></i>
            <h1>Profile</h1>
        </div>

        <div id="profpicture">
            <img src="<?php if (isset($_SESSION["fileDestination"])) {
                            echo $_SESSION["fileDestination"];
                        } else {
                            echo './assets/UserPics/user.png';
                        } ?>" alt="">
            <div id="topprofdiv">
                <i class="fa-solid fa-camera"></i>
                <p>CHANGE <br> PROFILE PICTURE</p>
            </div>
        </div>

        <div id="name-bio">
            <div id="name">
                <div>
                    <p>Your Username</p>
                    <h1><?php displayusername() ?></h1>
                </div>
                <i class="fa-solid fa-pen"></i>
            </div>
            <div id="bio">
                <div>
                    <p>Your Bio</p>
                    <h1><?php displaybio() ?></h1>
                </div>
                <i class="fa-solid fa-pen"></i>
            </div>
        </div>
    </div>

    <!-- This is log out form that is displayed only when a user try to log out of the system -->

    <form action="login_view.inc.php" method="Post" id="logoutform">

        <div id="logoutdiv">
            <div id="diva">
                <h1>Unigram</h1>
                <p>Are You Sure You Want To Log Out?</p>
            </div>
            <div id="divb">
                <button type="button" name="logout">Yes<?php ?></button>
                <button type="button" id="nostay">No</button>
            </div>
        </div>

    </form>

    <script src="nav.js"></script>
    <script src="chat.js"></script>
</body>

</html>