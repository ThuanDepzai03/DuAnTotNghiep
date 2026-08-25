@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="page-heading mb-4">
        <h3>Hỗ trợ khách hàng</h3>
        <p class="text-muted">
            Quản lý và trả lời tin nhắn của khách hàng
        </p>
    </div>

    <div class="chat-admin">

        <!-- DANH SÁCH KHÁCH -->
        <div class="chat-conversations">

            <div class="chat-list-header">
                <strong>Cuộc trò chuyện</strong>
            </div>

            <div id="conversation-list">

                @foreach($conversations as $conversation)

                    @php
                        $lastMessage = $conversation->messages->first();
                    @endphp

                    <div
                        class="conversation-item"
                        data-id="{{ $conversation->id }}"
                        onclick="openConversation('{{ $conversation->id }}')"
                    >

                        <div class="conversation-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div class="conversation-info">

                            <div class="conversation-name">
                                {{ $conversation->customer_user ?: ($conversation->customer_email ?: 'Khách hàng #' . $conversation->id) }}
                            </div>

                            @if($conversation->customer_email)
                                <small class="text-muted">{{ $conversation->customer_email }}</small>
                            @endif

                            <div class="conversation-last">

                                @if($lastMessage)
                                    {{ $lastMessage->message }}
                                @else
                                    Chưa có tin nhắn
                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        <!-- KHUNG CHAT -->
        <div class="chat-admin-box">

            <div class="chat-admin-header">

                <div>
                    <strong id="chat-title">
                        Chọn cuộc trò chuyện
                    </strong>

                    <small id="chat-status">
                        Khách hàng
                    </small>
                </div>

            </div>


            <div id="admin-chat-messages">

                <div class="chat-empty">
                    <i class="bi bi-chat-dots"></i>
                    <p>
                        Chọn một khách hàng để bắt đầu trò chuyện
                    </p>
                </div>

            </div>


            <div class="admin-chat-input">

                <input
                    type="text"
                    id="admin-message"
                    placeholder="Nhập tin nhắn..."
                    disabled
                >

                <button
                    id="admin-send-button"
                    onclick="sendAdminMessage()"
                    disabled
                >
                    <i class="bi bi-send-fill"></i>
                </button>

            </div>

        </div>

    </div>

</div>


<style>

.chat-admin {
    display: flex;
    height: 650px;
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
}


/* DANH SÁCH */

.chat-conversations {
    width: 320px;
    border-right: 1px solid #eeeeee;
    background: #ffffff;
}

.chat-list-header {
    padding: 20px;
    border-bottom: 1px solid #eeeeee;
    font-size: 16px;
}

.conversation-item {
    display: flex;
    gap: 12px;
    padding: 15px;
    cursor: pointer;
    border-bottom: 1px solid #f1f1f1;
    transition: 0.2s;
}

.conversation-item:hover {
    background: #f5f8ff;
}

.conversation-item.active {
    background: #eef5ff;
}

.conversation-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #0088ff;
    color: white;

    display: flex;
    align-items: center;
    justify-content: center;
}

.conversation-info {
    flex: 1;
    min-width: 0;
}

.conversation-name {
    font-weight: 700;
    margin-bottom: 4px;
}

.conversation-last {
    font-size: 12px;
    color: #777;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


/* KHUNG CHAT */

.chat-admin-box {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.chat-admin-header {
    height: 70px;
    padding: 15px 20px;
    border-bottom: 1px solid #eeeeee;

    display: flex;
    align-items: center;
}

.chat-admin-header small {
    display: block;
    color: #888;
    margin-top: 3px;
}

#admin-chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    background: #f7f8fa;
}

.chat-empty {
    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    color: #999;
}

.chat-empty i {
    font-size: 45px;
    margin-bottom: 10px;
}


/* TIN NHẮN */

.admin-message {
    display: flex;
    margin-bottom: 12px;
}

.admin-message.customer {
    justify-content: flex-start;
}

.admin-message.admin {
    justify-content: flex-end;
}

.message-content {
    max-width: 65%;
    padding: 10px 14px;
    border-radius: 15px;
    font-size: 14px;
    line-height: 1.5;
}

.customer .message-content {
    background: #ffffff;
    border: 1px solid #eeeeee;
}

.admin .message-content {
    background: #0088ff;
    color: white;
}


/* INPUT */

.admin-chat-input {
    display: flex;
    padding: 12px;
    border-top: 1px solid #eeeeee;
    background: white;
}

.admin-chat-input input {
    flex: 1;
    border: 1px solid #ddd;
    border-radius: 25px;
    padding: 10px 15px;
    outline: none;
}

.admin-chat-input button {
    width: 42px;
    height: 42px;

    margin-left: 8px;

    border: none;
    border-radius: 50%;

    background: #0088ff;
    color: white;

    cursor: pointer;
}

.admin-chat-input button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

</style>


<script>

let currentConversationId = null;


/*
|--------------------------------------------------------------------------
| MỞ CUỘC TRÒ CHUYỆN
|--------------------------------------------------------------------------
*/

function openConversation(id) {

    currentConversationId = id;

    document.querySelectorAll('.conversation-item')
        .forEach(item => {
            item.classList.remove('active');
        });

    const selected = document.querySelector(
        '.conversation-item[data-id="' + id + '"]'
    );

    if (selected) {
        selected.classList.add('active');
    }

    document.getElementById('chat-title').textContent =
        'Khách hàng #' + id;

    document.getElementById('chat-status').textContent =
        'Đang trò chuyện';

    document.getElementById('admin-message').disabled = false;
    document.getElementById('admin-send-button').disabled = false;

    loadAdminMessages();
}


/*
|--------------------------------------------------------------------------
| LẤY TIN NHẮN
|--------------------------------------------------------------------------
*/

function loadAdminMessages() {

    if (!currentConversationId) {
        return;
    }

    fetch(
        '/admin/chat/' +
        currentConversationId +
        '/messages'
    )
    .then(response => response.json())
    .then(data => {

        const box =
            document.getElementById('admin-chat-messages');

        box.innerHTML = '';

        data.messages.forEach(message => {

            const wrapper =
                document.createElement('div');

            wrapper.className =
                'admin-message ' +
                message.sender_type;

            const content =
                document.createElement('div');

            content.className =
                'message-content';

            content.textContent =
                message.message;

            wrapper.appendChild(content);

            box.appendChild(wrapper);

        });

        box.scrollTop = box.scrollHeight;

    })
    .catch(error => {
        console.log('Lỗi tải tin nhắn:', error);
    });
}


/*
|--------------------------------------------------------------------------
| ADMIN GỬI TIN
|--------------------------------------------------------------------------
*/

function sendAdminMessage() {

    if (!currentConversationId) {
        return;
    }

    const input =
        document.getElementById('admin-message');

    const message =
        input.value;

    if (!message.trim()) {
        return;
    }

    fetch(
        '/admin/chat/' +
        currentConversationId +
        '/reply',
        {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':
                    document.querySelector(
                        'meta[name="csrf-token"]'
                    )?.getAttribute('content')
            },

            body: JSON.stringify({
                message: message
            })
        }
    )
    .then(response => response.json())
    .then(data => {

        if (data.success) {

            input.value = '';

            loadAdminMessages();

        }

    })
    .catch(error => {
        console.log('Lỗi gửi tin:', error);
    });
}


/*
|--------------------------------------------------------------------------
| ENTER ĐỂ GỬI
|--------------------------------------------------------------------------
*/

document.getElementById('admin-message')
    ?.addEventListener('keydown', function(event) {

        if (event.key === 'Enter') {

            event.preventDefault();

            sendAdminMessage();

        }

    });


/*
|--------------------------------------------------------------------------
| TỰ ĐỘNG KIỂM TRA TIN MỚI
|--------------------------------------------------------------------------
*/

setInterval(function() {

    if (currentConversationId) {
        loadAdminMessages();
    }

}, 3000);

</script>

@endsection