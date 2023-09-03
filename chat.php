<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./assets/pics and icons/favicon.png">
    <link rel="stylesheet" href="./assets/chat.css">
    <title>Unigram | Chat</title>
</head>

<body>
    <div class="left" id="chatlist">
        <div id="nav">
            <img src="./assets/pics and icons/profpic.jpg" alt="profile" id="profpic">
            <div class="nextnav">
                <img src="./assets/pics and icons/new message.svg" alt="new text" onclick="newchat()">
                <i class="fa-solid fa-ellipsis-vertical" id="ul" onclick="settnav()"></i>
            </div>
        </div>
        <div id="search">
            <div id="innersearch">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="search a chat">
            </div>
        </div>
        <div id="chats">
            <div class="tempo">
                <p>Newly Created Chat will be displayed here</p>
                <h1></h1>
                <h2></h2>
                <h3></h3>
            </div>
        </div>
    </div>

    <div class="right">

        <section id="noactivechat">
            <img src="./assets/pics and icons/favicon.png" alt="">
            <h1>Unigram</h1>
            <p>Unigram makes it easy and fun to stay close to your favorite people.</p>
            <button type="button" onclick="newchat()">New Chat</button>
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

            </div>

            <div id="chatspace">
                <img src="./assets/pics and icons/emoji.svg" alt="emoji">
                <i class="fa-solid fa-plus"></i>
                <input type="text" placeholder="Type a message">
            </div>
        </section>

    </div>

    <div id="newchat">

        <div id="header">
            <i class="fa-solid fa-arrow-left" onclick="chatlist()"></i>
            <h1>Create New Chat</h1>
        </div>

        <div id="usernav">
            <div class="innerusernav">
                <i class="fa-solid fa-arrow-left"></i>
                <input type="search" placeholder="search a chat">
            </div>
        </div>

        <div id="users">
            <h2>Your Friends</h2>
            <hr>
            <!-- p*100>lorem2 -->
        </div>

    </div>

    <div id="unorderd">
        <ul>
            <li>New Group</li>
            <li>Select Chats</li>
            <li onclick="settings()">Settings</li>
            <li>Log Out</li>
        </ul>
    </div>

    <div id="settings">
        <div id="sethead">
            <i class="fa-solid fa-arrow-left" onclick="chatlist()"></i>
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
                <img src="./assets/pics and icons/profpic.jpg" alt="">
                <div>
                    <h1 id="username">Shnayder</h1>
                    <p id="bio">Se'mi bi Oba</p>
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
                <button type="button">Log Out</button>
            </div>
        </div>
    </div>

    <script src="./nav.js"></script>
</body>

</html>