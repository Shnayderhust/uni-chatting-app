"use strict";

const activechatspace = document.getElementById('activechatspace');
const messagespace = document.querySelector('.messagespace');
const noactivechat = document.getElementById('noactivechat');

const textInput = document.getElementById('textInput');
const receiverprof = document.getElementById('receiverprof');
const friendprof = document.querySelector('.friendprof');
const friendname = document.querySelector('.friendname');
const sendbuton = document.getElementById('sendbuton');
let receiverData = [];
let messageLoaded = false;
let chatMessages = {};

document.addEventListener('click', function (event) {

    let receiverId, receiverName, receiverProfilePic, convorId, senderId;
    let target = event.target;
    let onechat = target.closest('.onechat');


    if (onechat) {
        messagespace.innerHTML = "";
        receiverId = onechat.getAttribute('data-receiver-id');
        receiverName = onechat.getAttribute('data-receiver-username');
        receiverProfilePic = onechat.getAttribute('data-profilepic-id');
        convorId = onechat.getAttribute('data-convor-id');
        senderId = onechat.getAttribute('data-currentLogedInUserId');

        activechatspace.style.right = "0";
        noactivechat.style.display = 'none';
        friendprof.src = receiverProfilePic;
        friendname.textContent = receiverName;

        receiverData = [receiverId, senderId, convorId,];

        console.log(receiverData)

        messagespace.innerHTML = "";

        if (chatMessages[convorId]) {
            messagespace.innerHTML += chatMessages[convorId];
        } else {
            addExistingMessage(convorId)
        }


        // console.log(`receiverData: ${receiverData}`)
    }
})

sendbuton.addEventListener('click', sendMessage)
textInput.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        sendMessage()
    }
})
function sendMessage() {

    let sentMessage = textInput.value.trim();
    let receiverId = receiverData[0]
    let senderId = receiverData[1]
    let convorId = receiverData[2]


    if (sentMessage !== "") {

        let messagePackage = {
            "sentMessage": sentMessage,
            "receiverId": receiverId,
            "senderId": senderId,
            "convorId": convorId,
            "onloadFlag": 'not real'
        }

        textInput.value = "";

        fetch('sendmessage.php', {
            method: "POST",
            headers: {
                "content-Type": "application/json",
            },
            body: JSON.stringify({ messagePackage })
        })
            .then(function (response) {
                if (response.status === 200) {
                    return response.json().then(function (data) {
                        console.log(data);
                        messagespace.innerHTML += displayRecentSentMessage(data);
                        messagespace.scrollTop = messagespace.scrollHeight;
                    })
                }
            })
    }

};

function addExistingMessage(convoId) {

    if (chatMessages[convoId]) {
        return;
    }
    let onloadFlag = 'initial_load';
    let convorId = convoId;

    let messagePackage = {
        "onloadFlag": onloadFlag,
        "convorId": convorId,
    }

    fetch('sendmessage.php', {
        method: "POST",
        headers: {
            "content-Type": "application/json",
        },
        body: JSON.stringify({ messagePackage })
    })
        .then(function (response) {
            if (response.status === 201) {
                return response.json().then(function (data) {
                    let allMessageContainer = displayExistingMessages(data);
                    allMessageContainer.forEach(function (oneMessageContainer) {
                        chatMessages[convoId] = allMessageContainer;
                        messagespace.appendChild(oneMessageContainer);
                        messagespace.scrollTop = messagespace.scrollHeight;
                    })

                    messageLoaded = true;
                })
            }

        })
}




function displayExistingMessages(data) {
    let allMessageContainer = [];

    data.forEach(function (message) {
        const outgoingMain = document.createElement('div');
        outgoingMain.classList.add('outgoing');

        const outgoingContainer = document.createElement('div');
        outgoingContainer.classList.add('outgoingmessage');

        const actualoutgoingmessage = document.createElement('p');
        actualoutgoingmessage.classList.add('actualoutgoingmessage');
        actualoutgoingmessage.textContent = message.message;

        outgoingContainer.appendChild(actualoutgoingmessage);
        outgoingMain.appendChild(outgoingContainer);

        allMessageContainer.push(outgoingMain);
    })

    return allMessageContainer;

}

function displayRecentSentMessage(data) {
    console.log(data);
    const outgoingMain = document.createElement('div');
    outgoingMain.classList.add('outgoing');

    const outgoingContainer = document.createElement('div');
    outgoingContainer.classList.add('outgoingmessage');

    const actualoutgoingmessage = document.createElement('p');
    actualoutgoingmessage.classList.add('actualoutgoingmessage');
    actualoutgoingmessage.textContent = data.message;

    outgoingContainer.appendChild(actualoutgoingmessage);
    outgoingMain.appendChild(outgoingContainer);

    return outgoingMain.outerHTML;
}
