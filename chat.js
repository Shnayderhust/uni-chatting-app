const Friends = document.querySelectorAll('.onefriend');
const friendsearch = document.getElementById('friendsearch');

friendsearch.addEventListener('input', function () {
    const searchTerm = friendsearch.value.toLowerCase();

    Friends.forEach(function (friend) {
        const username = friend.getAttribute('data-username').toLowerCase();
        if (username.includes(searchTerm)) {
            friend.style.display = 'flex';
        } else {
            friend.style.display = 'none';
        }
    })
})


const addFriends = document.getElementsByClassName('addfriend');

for (const addFriend of addFriends) {

    addFriend.addEventListener('click', function (event) {
        const getUserId = event.target.getAttribute('data-username');

        fetch('friends.inc.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ getUserId })

        })
            .then(function (response) {
                if (response.status === 200) {
                    console.log('user added successfully')
                } else {
                    console.log('user adding failed')

                }
            })
    })
}
