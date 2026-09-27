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
                <div class="chat-list-heading">
                    <div>
                        <span class="chat-overline">HỘP THƯ</span>
                        <strong>Cuộc trò chuyện</strong>
                    </div>
                    <span class="chat-list-mark"><i class="bi bi-chat-square-dots-fill"></i></span>
                </div>
                <label class="chat-search">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <input id="conversation-search" type="search" placeholder="Tìm khách hàng..." aria-label="Tìm cuộc trò chuyện">
                </label>
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
                <button id="chat-back-button" class="chat-back-button" type="button" aria-label="Quay lại danh sách cuộc trò chuyện">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div class="chat-contact-avatar"><i class="bi bi-person-fill"></i></div>
                <div class="chat-contact-info">
                    <strong id="chat-title">Chọn cuộc trò chuyện</strong>
                    <small id="chat-status"><i></i> Khách hàng</small>
                </div>
                <span class="chat-header-note"><i class="bi bi-shield-check"></i> Hỗ trợ khách hàng</span>
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
    --inbox-ink: #182d3b;
    --inbox-teal: #087f83;
    --inbox-line: #e5ecec;
    display: grid;
    grid-template-columns: minmax(260px, 320px) minmax(0, 1fr);
    height: min(720px, calc(100dvh - 245px));
    min-height: 510px;
    overflow: hidden;
    border: 1px solid #e5ecec;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 12px 34px rgba(24, 45, 59, .08);
}

.chat-conversations { display: flex; min-width: 0; flex-direction: column; border-right: 1px solid var(--inbox-line); background: #fff; }
.chat-list-header { padding: 20px 18px 14px; border-bottom: 1px solid var(--inbox-line); }
.chat-list-heading { display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px; }
.chat-overline { display: block; margin-bottom: 5px; color: var(--inbox-teal); font-size: 10px; font-weight: 800; }
.chat-list-heading strong { color: var(--inbox-ink); font-size: 17px; }
.chat-list-mark { display: grid; place-items: center; width: 36px; height: 36px; border-radius: 11px; background: #e9f5f2; color: var(--inbox-teal); }
.chat-search { display: flex; align-items: center; gap: 9px; height: 40px; padding: 0 12px; border: 1px solid #e2eaea; border-radius: 8px; background: #f8fbfa; color: #789096; }
.chat-search:focus-within { border-color: var(--inbox-teal); box-shadow: 0 0 0 3px rgba(8,127,131,.1); }
.chat-search input { width: 100%; min-width: 0; border: 0; outline: 0; background: transparent; color: var(--inbox-ink); font-size: 12px; }
#conversation-list { flex: 1; overflow-y: auto; }
.conversation-item { position: relative; display: flex; align-items: center; gap: 12px; min-height: 78px; padding: 13px 16px; border-bottom: 1px solid #f0f3f3; cursor: pointer; transition: background .16s ease; }
.conversation-item:hover { background: #f6faf9; }
.conversation-item.active { background: #eaf5f2; }
.conversation-item.active::before { position: absolute; inset: 10px auto 10px 0; width: 3px; border-radius: 0 3px 3px 0; background: var(--inbox-teal); content: ''; }
.conversation-icon { display: grid; flex: 0 0 42px; place-items: center; width: 42px; height: 42px; border-radius: 13px; background: #e4f1f1; color: #087f83; font-size: 17px; }
.conversation-info { flex: 1; min-width: 0; }
.conversation-name { overflow: hidden; margin-bottom: 3px; color: var(--inbox-ink); font-size: 13px; font-weight: 700; text-overflow: ellipsis; white-space: nowrap; }
.conversation-info small { display: block; overflow: hidden; margin-bottom: 4px; color: #859398; font-size: 10px; text-overflow: ellipsis; white-space: nowrap; }
.conversation-last { overflow: hidden; color: #718188; font-size: 11px; text-overflow: ellipsis; white-space: nowrap; }

.chat-admin-box { display: flex; min-width: 0; flex-direction: column; background: #fff; }
.chat-admin-header { display: flex; align-items: center; gap: 12px; min-height: 72px; padding: 12px 20px; border-bottom: 1px solid var(--inbox-line); background: #fff; }
.chat-contact-avatar { display: grid; flex: 0 0 42px; place-items: center; width: 42px; height: 42px; border-radius: 13px; background: #eaf4f1; color: var(--inbox-teal); font-size: 18px; }
.chat-contact-info { min-width: 0; }
.chat-contact-info strong { display: block; overflow: hidden; color: var(--inbox-ink); font-size: 14px; text-overflow: ellipsis; white-space: nowrap; }
.chat-admin-header small { display: block; margin-top: 5px; color: #7b8b91; font-size: 11px; }
.chat-admin-header small i { display: inline-block; width: 7px; height: 7px; margin-right: 5px; border-radius: 50%; background: #46b888; }
.chat-header-note { display: inline-flex; align-items: center; gap: 6px; margin-left: auto; color: #73858a; font-size: 11px; }
.chat-header-note i { color: var(--inbox-teal); font-size: 14px; }
.chat-back-button { display: none; width: 36px; height: 36px; border: 1px solid var(--inbox-line); border-radius: 9px; background: #fff; color: var(--inbox-ink); cursor: pointer; }

#admin-chat-messages { flex: 1; min-height: 0; padding: 24px clamp(16px, 4vw, 42px); overflow-y: auto; background-color: #f5f8f7; background-image: linear-gradient(rgba(255,255,255,.36) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.36) 1px, transparent 1px); background-size: 28px 28px; }
.chat-empty { display: flex; height: 100%; flex-direction: column; align-items: center; justify-content: center; color: #7c8d91; text-align: center; }
.chat-empty i { display: grid; place-items: center; width: 62px; height: 62px; margin-bottom: 14px; border-radius: 18px; background: #e4f1ee; color: var(--inbox-teal); font-size: 27px; }
.chat-empty p { max-width: 240px; margin: 0; font-size: 13px; line-height: 1.6; }

.admin-message { display: flex; margin-bottom: 14px; }
.admin-message.customer { justify-content: flex-start; }
.admin-message.admin { justify-content: flex-end; }
.message-content { max-width: min(72%, 560px); padding: 11px 15px; border-radius: 15px; font-size: 13px; line-height: 1.6; overflow-wrap: anywhere; white-space: pre-wrap; box-shadow: 0 2px 5px rgba(24,45,59,.04); }
.customer .message-content { border: 1px solid #e4ebea; border-bottom-left-radius: 4px; background: #fff; color: #293c47; }
.admin .message-content { border-bottom-right-radius: 4px; background: var(--inbox-teal); color: #fff; }

.admin-chat-input { display: flex; align-items: center; gap: 10px; padding: 13px 18px; border-top: 1px solid var(--inbox-line); background: #fff; }
.admin-chat-input input { flex: 1; min-width: 0; height: 44px; padding: 0 14px; border: 1px solid #dce6e5; border-radius: 9px; outline: 0; background: #f9fbfb; color: var(--inbox-ink); font-size: 13px; }
.admin-chat-input input:focus { border-color: var(--inbox-teal); box-shadow: 0 0 0 3px rgba(8,127,131,.1); }
.admin-chat-input button { display: grid; flex: 0 0 44px; place-items: center; width: 44px; height: 44px; border: 0; border-radius: 9px; background: var(--inbox-teal); color: #fff; font-size: 15px; cursor: pointer; transition: background .16s ease; }
.admin-chat-input button:hover:not(:disabled) { background: #06666a; }
.admin-chat-input button:disabled { background: #aabbb9; cursor: not-allowed; }

@media (max-width: 760px) {
    .chat-admin { grid-template-columns: minmax(0, 1fr); height: calc(100dvh - 210px); min-height: 430px; }
    .chat-admin-box { display: none; }
    .chat-admin.has-active .chat-conversations { display: none; }
    .chat-admin.has-active .chat-admin-box { display: flex; }
    .chat-back-button { display: block; }
    .chat-header-note { display: none; }
    #admin-chat-messages { padding: 18px 14px; }
    .message-content { max-width: 86%; }
}

@media (max-width: 480px) {
    .chat-admin { height: calc(100dvh - 175px); min-height: 390px; margin-inline: -8px; }
    .chat-admin-header { min-height: 64px; padding-inline: 12px; }
    .admin-chat-input { padding: 10px; }
}
</style>


<script>

let currentConversationId = null;
let adminMessagesLoading = false;
let adminConversationsLoading = false;

function ensureJsonResponse(response) {
    if (!response.ok) {
        throw new Error('HTTP Status: ' + response.status);
    }

    return response.json();
}

function filterAdminConversations() {
    const query = document.getElementById('conversation-search')?.value.trim().toLocaleLowerCase('vi') || '';

    document.querySelectorAll('.conversation-item').forEach(item => {
        item.hidden = !item.textContent.toLocaleLowerCase('vi').includes(query);
    });
}

function renderAdminConversations(conversations) {
    const list = document.getElementById('conversation-list');

    if (!list) {
        return;
    }

    list.innerHTML = '';

    conversations.forEach(conversation => {
        const item = document.createElement('div');
        item.className = 'conversation-item' +
            (String(conversation.id) === String(currentConversationId) ? ' active' : '');
        item.dataset.id = conversation.id;
        item.addEventListener('click', function () {
            openConversation(conversation.id);
        });

        const icon = document.createElement('div');
        icon.className = 'conversation-icon';
        icon.innerHTML = '<i class="bi bi-person-fill"></i>';

        const info = document.createElement('div');
        info.className = 'conversation-info';

        const name = document.createElement('div');
        name.className = 'conversation-name';
        name.textContent = conversation.customer_name;

        const lastMessage = document.createElement('div');
        lastMessage.className = 'conversation-last';
        lastMessage.textContent = conversation.last_message;

        info.appendChild(name);
        if (conversation.customer_email) {
            const email = document.createElement('small');
            email.className = 'text-muted';
            email.textContent = conversation.customer_email;
            info.appendChild(email);
        }
        info.appendChild(lastMessage);
        item.appendChild(icon);
        item.appendChild(info);
        list.appendChild(item);
    });

    filterAdminConversations();
}

function loadAdminConversations() {
    if (adminConversationsLoading) {
        return;
    }

    adminConversationsLoading = true;

    fetch('/admin/chat/conversations', {
        headers: { 'Accept': 'application/json' }
    })
        .then(ensureJsonResponse)
        .then(data => {
            renderAdminConversations(data.conversations || []);

            const unread = (data.conversations || []).reduce(
                (total, conversation) => total + conversation.unread,
                0
            );
            const badge = document.getElementById('notification-count');
            if (badge) {
                badge.textContent = unread;
                badge.style.display = unread ? 'inline-block' : 'none';
            }
        })
        .catch(error => console.log('Lỗi tải danh sách chat:', error))
        .finally(() => {
            adminConversationsLoading = false;
        });
}


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

    document.querySelector('.chat-admin')?.classList.add('has-active');

    if (selected) {
        selected.classList.add('active');
    }

    document.getElementById('chat-title').textContent =
        selected?.querySelector('.conversation-name')?.textContent || 'Khách hàng #' + id;

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

    if (!currentConversationId || adminMessagesLoading) {
        return;
    }

    adminMessagesLoading = true;

    fetch(
        '/admin/chat/' +
        currentConversationId +
        '/messages',
        { headers: { 'Accept': 'application/json' } }
    )
    .then(ensureJsonResponse)
    .then(data => {

        const box =
            document.getElementById('admin-chat-messages');

        const wasNearBottom =
            box.scrollHeight - box.scrollTop - box.clientHeight < 40;

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

        if (wasNearBottom) {
            box.scrollTop = box.scrollHeight;
        }

    })
    .catch(error => {
        console.log('Lỗi tải tin nhắn:', error);
    })
    .finally(() => {
        adminMessagesLoading = false;
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
                'Accept': 'application/json',
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
    .then(ensureJsonResponse)
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

document.getElementById('conversation-search')
    ?.addEventListener('input', filterAdminConversations);

document.getElementById('chat-back-button')
    ?.addEventListener('click', function () {
        document.querySelector('.chat-admin')?.classList.remove('has-active');
    });


/*
|--------------------------------------------------------------------------
| TỰ ĐỘNG KIỂM TRA TIN MỚI
|--------------------------------------------------------------------------
*/

setInterval(function() {

    loadAdminConversations();

    if (currentConversationId) {
        loadAdminMessages();
    }

}, 3000);

loadAdminConversations();

</script>

@endsection