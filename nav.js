function register() {
    window.location.href = "register.php";
};

function login() {
    window.location.href = "loginform.php";
    document.getElementsByName(regbutt).submit();
}

function home() {
    window.location.href = "index.php";
}

function chat() {
    window.location.href = "chat.php";
}

function newchat() {
    document.getElementById('newchat').style.left = "0";
}

function chatlist() {
    document.getElementById('newchat').style.left = "-100%";
    document.getElementById('newchat').style.transition = "2s";
    document.getElementById('settings').style.left = "-100%";
    document.getElementById('settings').style.transition = "2s";
    document.getElementById('profile').style.left = "-100%";
    document.getElementById('profile').style.transition = "2s";
}


function settnav() {
    const unorderd = document.getElementById('unorderd');
    unorderd.style.display = "flex";
};

function settings() {
    document.getElementById('settings').style.left = "0";
    document.getElementById('unorderd').style.display = "none";
};

function profile() {
    document.getElementById('profile').style.left = "0";
};
