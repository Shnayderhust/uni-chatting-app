const chatslist = document.querySelector('.chatslist');
const tempo = document.querySelector('.tempo');
const newchat = document.getElementById('newchat');

document.addEventListener('DOMContentLoaded', function () {

    onpageloaddisplayconvo();
    addConvo()

})

function addConvo() {
    addEventListener('click', function (event) {
        if (event.target.matches('.chat')) {

            const getUserId = event.target.getAttribute('data-user-id');

            fetch('convo.inc.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ getUserId })

            })
                .then(function (response) {
                    if (response.status === 200) {
                        console.log('convo added successfully');

                        return response.json().then(function (data) {

                            const convoId = data.convoId;
                            const userOneFriendData = data.userOneFriendData;

                            newchat.style.left = "-100%";
                            tempo.style.display = "none";
                            chatslist.style.display = "block";
                            chatslist.innerHTML += displayconvo(userOneFriendData, convoId);
                            console.log('convo displayed successfully')
                        })
                    } else {
                        console.log('user adding failed')
                    }
                })
                .catch(function (error) {
                    console.log("Error fetching user data:", error);
                })

        }
    })
}


function displayconvo(userOneFriendData, convoId) {
    const onechat = document.createElement('div');
    onechat.classList.add('onechat')
    onechat.setAttribute('data-receiver-id', userOneFriendData["user_id"]);
    onechat.setAttribute('data-convor-d', convoId["convor_id"]);
    onechat.setAttribute('data-profilepic-id', userOneFriendData["profile_pic_id"]);
    onechat.setAttribute('data-receiver-username', userOneFriendData["profile_pic_id"]);

    const profpic = document.createElement('img');
    profpic.classList.add('profpic')
    profpic.src = userOneFriendData["profile_pic_id"];

    const details = document.createElement('div');
    details.classList.add('details')

    const jina = document.createElement('h3');
    jina.classList.add('jina')
    jina.textContent = userOneFriendData["username"];

    const message = document.createElement('div');
    message.classList.add('message')


    const text = document.createElement('p');
    text.classList.add('text');
    text.textContent = "No message Yet... Open To Chat";



    message.appendChild(text);
    details.appendChild(jina);
    details.appendChild(message);
    onechat.appendChild(profpic);
    onechat.appendChild(details);

    return onechat.outerHTML;
}


function onpageloaddisplayconvo() {

    // fetch for displaying conversation which already exist in database
    fetch('convo.inc.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ getUserId: 'initial_load' })

    })
        .then(function (response) {
            if (response.status === 200) {

                return response.json().then(function (data) {

                    const allUserFriendsData = data.allUserFriendsData;
                    const currentLoggedUserConvoIds = data.currentLoggedUserConvoIds;
                    // chatslist.innerHTML = "";
                    newchat.style.left = "-100%";
                    tempo.style.display = "none";
                    chatslist.style.display = "block";

                    convocontainers = displayconvoonload(allUserFriendsData, currentLoggedUserConvoIds);
                    convocontainers.forEach(function (convocontainer) {
                        chatslist.appendChild(convocontainer);
                    })

                    console.log('convo displayed successfully')
                })
            } else {
                console.log('friends displaying failed')
            }
        })
        .catch(function (error) {
            console.log("Error fetching user data:", error);
        })
}




function displayconvoonload(allUserFriendsData, currentLoggedUserConvoIds) {
    let convocontainers = [];

    const maxLength = Math.max(allUserFriendsData.length, currentLoggedUserConvoIds.length)

    for (let i = 0; i < maxLength; i++) {
        let oneUserFriendData = i < allUserFriendsData.length ? allUserFriendsData[i] : null;
        let oneConvoId = i < currentLoggedUserConvoIds.length ? currentLoggedUserConvoIds[i] : null;


        const onechat = document.createElement('div');
        onechat.classList.add('onechat')
        onechat.setAttribute('data-receiver-id', oneUserFriendData["user_id"]);
        onechat.setAttribute('data-convor-id', oneConvoId["convor_id"]);
        onechat.setAttribute('data-profilepic-id', oneUserFriendData["profile_pic_id"]);
        onechat.setAttribute('data-receiver-username', oneUserFriendData["username"]);

        const profpic = document.createElement('img');
        profpic.classList.add('profpic')
        profpic.src = oneUserFriendData["profile_pic_id"];

        const details = document.createElement('div');
        details.classList.add('details')

        const jina = document.createElement('h3');
        jina.classList.add('jina')
        jina.textContent = oneUserFriendData["username"];

        const message = document.createElement('div');
        message.classList.add('message')

        const text = document.createElement('p');
        text.classList.add('text');
        text.textContent = "No message Yet... Open To Chat";

        message.appendChild(text);
        details.appendChild(jina);
        details.appendChild(message);
        onechat.appendChild(profpic);
        onechat.appendChild(details);

        convocontainers.push(onechat);
    }

    return convocontainers;

}



