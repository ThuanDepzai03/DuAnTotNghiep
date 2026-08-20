/* =========================
   BẬT / TẮT KHUNG CHAT
========================= */

function toggleChat() {

    const chatBox = document.getElementById('chat-box');
    const chatButton = document.getElementById('chat-button');

    if (!chatBox) {
        return;
    }

    if (chatBox.style.display === 'flex') {

        chatBox.style.display = 'none';

        if (chatButton) {
            chatButton.style.display = 'flex';
        }

    } else {

        chatBox.style.display = 'flex';

        if (chatButton) {
            chatButton.style.display = 'none';
        }

        loadCustomerMessages();
    }
}


/* =========================
   ĐÓNG KHUNG CHAT
========================= */

function closeChat() {

    const chatBox = document.getElementById('chat-box');
    const chatButton = document.getElementById('chat-button');

    if (chatBox) {
        chatBox.style.display = 'none';
    }

    if (chatButton) {
        chatButton.style.display = 'flex';
    }
}


/* =========================
   GỬI TIN NHẮN KHÁCH
========================= */

function sendMessage() {

    const input = document.getElementById('chat-message');

    if (!input) {
        return;
    }

    const message = input.value.trim();

    if (!message) {
        return;
    }

    const csrfTokenMeta =
        document.querySelector('meta[name="csrf-token"]');

    const csrfToken =
        csrfTokenMeta
            ? csrfTokenMeta.getAttribute('content')
            : '';

    fetch('/chat/send', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },

        body: JSON.stringify({
            message: message
        })

    })

    .then(response => {

        if (!response.ok) {
            throw new Error('HTTP Status: ' + response.status);
        }

        return response.json();

    })

    .then(data => {

        if (data.success) {

            input.value = '';

            loadCustomerMessages();

        }

    })

    .catch(error => {

        console.error('Lỗi gửi tin:', error);

    });
}


/* =========================
   ENTER ĐỂ GỬI
========================= */

function handleChatEnter(event) {

    if (event.key === 'Enter') {

        event.preventDefault();

        sendMessage();
    }
}


/* =========================
   LẤY TIN NHẮN
========================= */

function loadCustomerMessages() {

    fetch('/chat/messages')

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    'Không lấy được tin nhắn'
                );

            }

            return response.json();

        })

        .then(data => {

            const box =
                document.getElementById('chat-messages');

            if (!box) {
                return;
            }

            box.innerHTML = '';

            if (
                !data.messages ||
                data.messages.length === 0
            ) {

                box.innerHTML = `
                    <div style="
                        display:flex;
                        justify-content:flex-start;
                        margin-bottom:10px;
                    ">
                        <div style="
                            background:#e9ecef;
                            color:#333;
                            padding:8px 12px;
                            border-radius:10px;
                            max-width:80%;
                            font-size:13px;
                        ">
                            Xin chào! AE Phoenic Store có thể hỗ trợ gì cho bạn?
                        </div>
                    </div>
                `;

                return;
            }


            data.messages.forEach(message => {

                const wrapper =
                    document.createElement('div');

                wrapper.style.display = 'flex';
                wrapper.style.marginBottom = '10px';


                const content =
                    document.createElement('div');

                content.textContent =
                    message.message;

                content.style.padding =
                    '8px 12px';

                content.style.borderRadius =
                    '10px';

                content.style.maxWidth =
                    '80%';

                content.style.fontSize =
                    '13px';

                content.style.wordBreak =
                    'break-word';


                /* =========================
                   TIN KHÁCH
                ========================= */

                if (
                    message.sender_type === 'customer'
                ) {

                    wrapper.style.justifyContent =
                        'flex-end';

                    content.style.background =
                        '#0088ff';

                    content.style.color =
                        '#ffffff';

                }


                /* =========================
                   TIN ADMIN
                ========================= */

                else if (
                    message.sender_type === 'admin'
                ) {

                    wrapper.style.justifyContent =
                        'flex-start';

                    content.style.background =
                        '#e9ecef';

                    content.style.color =
                        '#333333';

                }


                wrapper.appendChild(content);

                box.appendChild(wrapper);

            });


            box.scrollTop =
                box.scrollHeight;

        })

        .catch(error => {

            console.error(
                'Lỗi tải tin nhắn:',
                error
            );

        });
}


/* =========================
   TỰ ĐỘNG NHẬN TIN ADMIN
   MỖI 2 GIÂY
========================= */

setInterval(function () {

    const chatBox =
        document.getElementById('chat-box');

    if (
        chatBox &&
        chatBox.style.display === 'flex'
    ) {

        loadCustomerMessages();

    }

}, 2000);