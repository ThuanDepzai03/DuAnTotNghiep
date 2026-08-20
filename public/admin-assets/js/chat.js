/* =========================================
   BIẾN QUẢN LÝ TỰ ĐỘNG PHẢN HỒI (AUTO REPLY)
========================================= */
let autoReplyTimeout = null;
let autoReplySent = false; // Đánh dấu đã gửi tin tự động trong phiên này chưa

function toggleChat() {
    const chatBox = document.getElementById('chat-box');
    const chatButton = document.getElementById('chat-button');

    if (!chatBox) return;

    if (chatBox.style.display === 'flex') {
        chatBox.style.display = 'none';
        if (chatButton) chatButton.style.display = 'flex';
    } else {
        chatBox.style.display = 'flex';
        if (chatButton) chatButton.style.display = 'none';
        loadCustomerMessages();
    }
}

function closeChat() {
    const chatBox = document.getElementById('chat-box');
    const chatButton = document.getElementById('chat-button');

    if (chatBox) chatBox.style.display = 'none';
    if (chatButton) chatButton.style.display = 'flex';
}

/* =========================
   GỬI TIN NHẮN KHÁCH
========================= */
function sendMessage() {
    const input = document.getElementById('chat-message');
    if (!input) return;

    const message = input.value;
    if (!message.trim()) return;

    fetch('/chat/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            input.value = '';
            loadCustomerMessages();

            // Kích hoạt bộ đếm thời gian tự động phản hồi sau 10 giây nếu Admin chưa trả lời
            scheduleAutoReply();
        }
    })
    .catch(error => console.log('Lỗi gửi tin:', error));
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
            if (!response.ok) throw new Error('Không lấy được tin nhắn');
            return response.json();
        })
        .then(data => {
            const box = document.getElementById('chat-messages');
            if (!box) return;

            box.innerHTML = '';

            if (!data.messages || data.messages.length === 0) {
                box.innerHTML = `
                    <div style="display:flex; justify-content:flex-start; margin-bottom:10px;">
                        <div style="background:#e9ecef; color:#333; padding:8px 12px; border-radius:10px; max-width:80%; font-size:13px;">
                            Xin chào! AE Phoenic Store có thể hỗ trợ gì cho bạn?
                        </div>
                    </div>
                `;
                return;
            }

            // Kiểm tra xem Admin đã từng phản hồi chưa
            let hasAdminReplied = false;

            data.messages.forEach(message => {
                const wrapper = document.createElement('div');
                wrapper.style.display = 'flex';
                wrapper.style.marginBottom = '10px';

                const content = document.createElement('div');
                content.textContent = message.message;
                content.style.padding = '8px 12px';
                content.style.borderRadius = '10px';
                content.style.maxWidth = '80%';
                content.style.fontSize = '13px';

                /* TIN KHÁCH */
                if (message.sender_type === 'customer') {
                    wrapper.style.justifyContent = 'flex-end';
                    content.style.background = '#0088ff';
                    content.style.color = '#ffffff';
                }
                /* TIN ADMIN */
                else if (message.sender_type === 'admin') {
                    hasAdminReplied = true; // Admin đã có phản hồi
                    wrapper.style.justifyContent = 'flex-start';
                    content.style.background = '#e9ecef';
                    content.style.color = '#333333';
                }

                wrapper.appendChild(content);
                box.appendChild(wrapper);
            });

            // Nếu Admin đã trả lời, hủy đếm ngược tự động báo bận
            if (hasAdminReplied && autoReplyTimeout) {
                clearTimeout(autoReplyTimeout);
                autoReplyTimeout = null;
            }

            box.scrollTop = box.scrollHeight;
        })
        .catch(error => console.log('Lỗi tải tin nhắn:', error));
}

/* =========================================
   HÀM ĐẾM GIỜ PHẢN HỒI TỰ ĐỘNG
========================================= */
function scheduleAutoReply() {
    // Nếu đã từng phát tin tự động trong phiên này rồi thì không lặp lại nữa
    if (autoReplySent) return;

    // Hủy bộ đếm cũ nếu khách nhắn nhiều tin liên tiếp
    if (autoReplyTimeout) clearTimeout(autoReplyTimeout);

    // Đặt hẹn giờ 10 giây (10000 ms)
    autoReplyTimeout = setTimeout(() => {
        appendAutoReplyMessage();
        autoReplySent = true; // Đánh dấu đã gửi
    }, 10000); 
}

function appendAutoReplyMessage() {
    const box = document.getElementById('chat-messages');
    if (!box) return;

    const wrapper = document.createElement('div');
    wrapper.style.display = 'flex';
    wrapper.style.marginBottom = '10px';
    wrapper.style.justifyContent = 'flex-start';

    const content = document.createElement('div');
    content.textContent = 'Cảm ơn bạn đã liên hệ! Hiện tại Admin đang vắng mặt. Vui lòng đợi trong giây lát, chúng tôi sẽ phản hồi ngay khi quay lại nhé!';
    content.style.padding = '8px 12px';
    content.style.borderRadius = '10px';
    content.style.maxWidth = '80%';
    content.style.fontSize = '13px';
    content.style.background = '#e9ecef';
    content.style.color = '#333333';
    content.style.fontStyle = 'italic'; // Làm nghiêng để phân biệt tin tự động

    wrapper.appendChild(content);
    box.appendChild(wrapper);
    box.scrollTop = box.scrollHeight;
}

/* =========================
   TỰ ĐỘNG NHẬN TIN ADMIN
========================= */
setInterval(function () {
    const chatBox = document.getElementById('chat-box');
    if (chatBox && chatBox.style.display === 'flex') {
        loadCustomerMessages();
    }
}, 2000);