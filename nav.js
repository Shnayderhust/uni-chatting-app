addEventListener('click', (event) => {
    if (event.target.matches('.reglink')) {
        window.location.href = "signup.php";
    }
    else if (event.target.matches('.mlogin')) {
        window.location.href = "login.php";
    }
    else if (event.target.matches('.mlogo')) {
        window.location.href = "index.php";
    }
    else if (event.target.matches('#gochat')) {
        window.location.href = "chat.php";
    }
    else if (event.target.matches('.profpic')) {
        document.getElementById('newchat').style.left = "-100%";
        document.getElementById('settings').style.left = "-100%";
        document.getElementById('profile').style.left = "0";
    }
    else if (event.target.matches('.creatchat')) {
        document.getElementById('profile').style.left = "-100%";
        document.getElementById('settings').style.left = "-100%";
        document.getElementById('newchat').style.left = "0";
    }
    else if (event.target.matches('#chatlist')) {
        document.getElementById('newchat').style.left = "-100%";
        document.getElementById('newchat').style.transition = "2s";
        document.getElementById('settings').style.left = "-100%";
        document.getElementById('settings').style.transition = "2s";
        document.getElementById('profile').style.left = "-100%";
        document.getElementById('profile').style.transition = "2s";
    }
    else if (event.target.matches('.settings')) {
        document.getElementById('settings').style.left = "0";
        document.getElementById('unorderd').style.display = "none";
    }
    else if (event.target.matches('.logoutform')) {
        document.getElementById('logoutform').style.display = "flex";
    }
    else if (event.target.matches('#yeslogout')) {
        window.location.href = "index.php";
    }
    else if (event.target.matches('#nostay')) {
        document.getElementById('unorderd').style.display = "none";
        document.getElementById('logoutform').style.display = "none";
    }
    else {
        const unorderd = document.getElementById('unorderd');
        if (event.target.matches('#ul')) {
            unorderd.style.display = "flex";
        }
    }
});


// BIG NOTE 

/*

    The "document.getElementById" method is responsible for querying an element by its id in the html file that this js file is sourced

    The "event.target.matches('')" method check for any match you provide from an html file it can be id in which the parameter of matches method will start with # or class param 'll start with . or tag

    The "addEventListener('click', (event) => {}" method with first parameter of click and callback function is responsible for listening to specified click events in the dom and execute the callback function with the event param that specify the clicked event

*/