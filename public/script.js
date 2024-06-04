document.addEventListener('DOMContentLoaded', function () {
    const chatBtn = document.getElementById('chatBtn');
    const chatDialog = document.getElementById('chatDialog');
    const closeBtn = document.getElementById('closeBtn');
    const sendBtn = document.getElementById('sendBtn');
    const usernameInput = document.getElementById('usernameInput');
    const messageInput = document.getElementById('messageInput');
    const chatMessages = document.getElementById('chatMessages');

    chatBtn.addEventListener('click', function () {
        chatDialog.style.display = 'block';
    });

    closeBtn.addEventListener('click', function () {
        chatDialog.style.display = 'none';
    });

    function sendMessage() {
        const username = usernameInput.value.trim();
        const message = messageInput.value.trim();

        if (username === '' || message === '') {
            alert('Please enter your username and message');
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../public/send_message.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                messageInput.value = '';
            }
        };
        xhr.send(`username=${username}&message=${message}`);
    }

    sendBtn.addEventListener('click', sendMessage);

    function fetchMessages() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '../public/fetch_messages.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                const messages = JSON.parse(xhr.responseText);
                chatMessages.innerHTML = '';
                messages.forEach(function (message) {
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('chat-bubble');
                    if (message.username === usernameInput.value.trim()) {
                        messageElement.classList.add('sent');
                    } else {
                        messageElement.classList.add('received');
                    }
                    messageElement.innerHTML = `<strong>${message.username}:</strong> ${message.message}`;
                    chatMessages.appendChild(messageElement);
                });
            }
        };
        xhr.send();
    }

    setInterval(fetchMessages, 3000);
});
