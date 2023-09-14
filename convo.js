const chatslist = document.querySelector('.chatslist');
const tempo = document.querySelector('.tempo');
const newchat = document.getElementById('newchat');

document.addEventListener('DOMContentLoaded', function () {

    addEventListener('click', function (event) {
        if (event.target.matches('.chat')) {

            console.log('button clicked');
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
                        console.log('convo added successfully')
                        return response.json().then(function (data) {

                            let userOneFriendData = data.userOneFriendData;
                            let lastConvoRowData = data.lastConvoRowData;

                            chatslist.innerHTML = "";
                            newchat.style.left = "-100%";
                            tempo.style.display = "none";
                            chatslist.style.display = "block";
                            chatslist.innerHTML += displayconvo(userOneFriendData, lastConvoRowData);
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


})










function displayconvo(userOneFriendData, lastConvoRowData) {
    const onechat = document.createElement('div');
    onechat.classList.add('onechat')

    const profpic = document.createElement('img');
    profpic.classList.add('profpic')
    onechat.src = userOneFriendData["profile_pic_id"];

    const details = document.createElement('div');
    details.classList.add('details')

    const jina = document.createElement('h3');
    jina.classList.add('jina')
    jina.textContent = userOneFriendData["username"];

    const message = document.createElement('div');
    message.classList.add('message')
    if (convodata["message"]) {
        message.textContent = "No message Yet Open To Chat";
    } else {
        message.textContent = lastConvoRowData["message"];
    }


    const text = document.createElement('p');
    text.classList.add('text');

    message.appendChild(text);
    details.appendChild(jina);
    details.appendChild(message);
    onechat.appendChild(profpic);
    onechat.appendChild(details);

    return onechat.outerHTML;
}
