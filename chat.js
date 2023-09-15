const activechatspace = document.getElementById('activechatspace');
const textInput = document.getElementById('textInput');
const receiverprof = document.getElementById('receiverprof');

document.addEventListener('DOMContentLoaded', function () {
    sendMessage()
})

function sendMessage() {

    document.body.addEventListener('click', function (event) {
        activechatspace.style.right = "0";

        let getReceiverId, getReceiverName, getReceiverProfpic, getConverId;
        let target = event.target;
        let onechat = target.closest('.onechat');

        if (onechat) {

            getReceiverId = onechat.getAttribute('data-receiver-id');
            getReceiverName = onechat.getAttribute('data-receiver-username');
            getReceiverProfpic = onechat.getAttribute('data-profilepic-id');
            getConverId = onechat.getAttribute('data-convor-id');
        }
    })
}

function createChatSpace() {
    // Chat navigation container
    const chatnav = document.createElement('div');
    chatnav.classList.add('chatnav');

    const header = document.createElement('div');
    header.classList.add('chatnavheader')

    const friendname = document.createElement('p');
    friendname.classList.add('friendname');

    const friendprof = document.createElement('img');
    friendprof.classList.add('friendprof');
    friendprof.src;

    const nextchatnav = document.createElement('div');
    nextchatnav.classList.add('nextchatnav');

    // Message Space container
    const messagespace = document.createElement('div');
    messagespace.classList.add('messagespace');

    // Outgoing Messages
    const outgoing = document.createElement('div');
    outgoing.classList.add('outgoing');

    const outgoingmessage = document.createElement('div');
    outgoingmessage.classList.add('outgoingmessage');

    const actualoutgoingmessage = document.createElement('p');
    actualoutgoingmessage.classList.add('actualoutgoingmessage');

    // Incoming Messages
    const incoming = document.createElement('div');
    incoming.classList.add('incoming');

    const incomingmessage = document.createElement('div');
    incomingmessage.classList.add('incomingmessage');

    const actualincomingmessage = document.createElement('p');
    actualincomingmessage.classList.add('actualincomingmessage');

    // Chat Space
    const chatspace = document.createElement('div');
    chatspace.classList.add('chatspace');

    const receiverprof = document.createElement('img');
    receiverprof.classList.add('receiverprof')

    const multimediaaddericon = '<i class="fa-solid fa-plus"></i>';

    const chatinput = document.createElement('input');
    chatinput.classList.add('textInput');


}


//              <div id="chatnav">
//                 <p><img src="" alt="">Shnayder</p>
//                 <div id="nextchatnav">
//                     <i class="fa-solid fa-magnifying-glass"></i>
//                     <i class="fa-solid fa-ellipsis-vertical"></i>
//                 </div>
//             </div>
//             <div id="messagespace">

//                 <div class="outgoing">
//                     <div class="outgoingmessage">
//                         <p class="actualmessage">what up girl</p>
//                     </div>
//                 </div>
//                 <div class="incoming">
//                     <div class="incomingmessage">
//                         <p class="actualincomingmessage">what up</p>
//                     </div>
//                 </div>

//             </div>
//             <div id="chatspace">
//                 <img src="assets/UserPics//userDefaultProfile.png" alt="emoji" id="receiverprof">
//                 <i class="fa-solid fa-plus"></i>
//                 <input type="text" placeholder="Type a message" id="textInput">
//             </div>