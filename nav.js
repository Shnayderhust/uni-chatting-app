addEventListener('click', (event) => {
    if (event.target.matches('.reglink')) {
        window.location.href = "register.php";
    }
    else if (event.target.matches('.mlogin')) {
        window.location.href = "loginform.php";
    }
    else if (event.target.matches('#regbutt')) {
        document.getElementsByName(regbutt).submit();
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
        else {
            unorderd.style.display = "none";
        }
    }
});