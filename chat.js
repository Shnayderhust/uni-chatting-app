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

document.addEventListener('click', function (event) {

    let receiverId, receiverName, receiverProfilePic, convorId, senderId;
    let target = event.target;
    let onechat = target.closest('.onechat');


    if (onechat) {
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

        console.log(`receiverData: ${receiverData}`)
    }
})

sendbuton.addEventListener('click', sendMessage)
function sendMessage() {

    let sentMessage = textInput.value.trim();
    let receiverId = receiverData[0]
    let senderId = receiverData[1]
    let convorId = receiverData[2]
    let timestamp = new Date().toISOString();
    let millisecstimestamp = new Date().getMilliseconds();
    let messageId = `${receiverId}_${senderId}_${millisecstimestamp}`;
    // console.log(receiverId)




    if (sentMessage !== "") {

        let messagePackage = {
            "sentMessage": sentMessage,
            "messageId": messageId,
            "receiverId": receiverId,
            "senderId": senderId,
            "convorId": convorId,
            "timestamp": timestamp
        }

        console.log(messagePackage);

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
                        messagespace.innerHTML += displayRecentSentMessage(data);
                    })
                } else if (response.status === 201) {
                    return response.json().then(function (data) {
                        let allMessageContainer = displayExistingMessages(data);
                        allMessageContainer.forEach(function (oneMessageContainer) {
                            messagespace.appendChild(oneMessageContainer);
                            console.log('onload Messages displayed')
                        })

                    })
                }
            })
    }

};




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




// function startMessaging() {

//     return new Promise((resolve) => {

//         let receiverData = [];
//         document.addEventListener('click', function (event) {

//             let receiverId, receiverName, receiverProfilePic, convorId, senderId;
//             let target = event.target;
//             let onechat = target.closest('.onechat');


//             if (onechat) {
//                 receiverId = onechat.getAttribute('data-receiver-id');
//                 receiverName = onechat.getAttribute('data-receiver-username');
//                 receiverProfilePic = onechat.getAttribute('data-profilepic-id');
//                 convorId = onechat.getAttribute('data-convor-id');
//                 senderId = onechat.getAttribute('data-currentLogedInUserId');

//                 activechatspace.style.right = "0";
//                 noactivechat.style.display = 'none';
//                 friendprof.src = receiverProfilePic;
//                 friendname.textContent = receiverName;

//                 receiverData = [receiverId, senderId, convorId,];

//                 console.log(`receiverData: ${receiverData}`)
//                 resolve(receiverData);
//             }



//         })
//     })
// }



// sendbuton.addEventListener('click', sendMessage);

// async function sendMessage() {
//     const receiverData = await startMessaging();

//     let sentMessage = textInput.value.trim();
//     let receiverId = receiverData[0]
//     let senderId = receiverData[1]
//     let convorId = receiverData[2]
//     let timestamp = new Date().toISOString();
//     let millisecstimestamp = new Date().getMilliseconds();
//     let messageId = `${receiverId}_${senderId}_${millisecstimestamp}`;

//     console.log(receiverId);
//     let messagePackage = {
//         "sentMessage": sentMessage,
//         "messageId": messageId,
//         "receiverId": receiverId,
//         "senderId": senderId,
//         "convorId": convorId,
//         "timestamp": timestamp
//     }

//     if (sentMessage !== "") {

//         console.log(sentMessage);

//         fetch('sendmessage.php', {
//             method: "POST",
//             headers: {
//                 "content-Type": "application/json",
//             },
//             body: JSON.stringify({ messagePackage })
//         })
//             .then(function (response) {
//                 if (response.status === 200) {
//                     return response.json().then(function (data) {
//                         messagespace.innerHTML += displayRecentSentMessage(data);
//                     })
//                 } else if (response.status === 201) {
//                     return response.json().then(function (data) {
//                         let allMessageContainer = displayExistingMessages(data);
//                         allMessageContainer.forEach(function (oneMessageContainer) {
//                             messagespace.appendChild(oneMessageContainer);
//                             console.log('onload Messages displayed')
//                         })

//                     })
//                 }
//             })
//     }
// };
