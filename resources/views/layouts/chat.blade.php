<button id="chat-button" class="customer-chat-launcher" type="button" onclick="toggleChat()" aria-label="Mở chat hỗ trợ">
    <i class="fa fa-comments" aria-hidden="true"></i>
    <span class="customer-chat-launcher__dot"></span>
</button>

<section id="chat-box" class="customer-chat" aria-label="Chat hỗ trợ khách hàng" aria-live="polite">
    <header class="customer-chat__header">
        <div class="customer-chat__identity">
            <div class="customer-chat__avatar"><i class="fa fa-headphones" aria-hidden="true"></i></div>
            <div>
                <strong>AE Phoenix Support</strong>
                <span><i></i> Đang trực tuyến</span>
            </div>
        </div>
        <button class="customer-chat__close" type="button" onclick="closeChat()" aria-label="Đóng chat">&times;</button>
    </header>

    <div class="customer-chat__intro">
        <span class="customer-chat__eyebrow">HỖ TRỢ KHÁCH HÀNG</span>
        <strong>Chúng tôi có thể giúp gì?</strong>
        <p>Để lại lời nhắn, đội ngũ sẽ phản hồi bạn sớm nhất.</p>
    </div>

    <div id="chat-messages" class="customer-chat__messages" aria-live="polite">
        <div class="customer-chat-row customer-chat-row--admin">
            <div class="customer-chat-bubble">Xin chào! AE Phoenix Store có thể hỗ trợ gì cho bạn?</div>
        </div>
    </div>

    <div class="customer-chat__composer">
        <input type="text" id="chat-message" placeholder="Viết tin nhắn..." onkeypress="handleChatEnter(event)" aria-label="Tin nhắn của bạn">
        <button type="button" onclick="sendMessage()" aria-label="Gửi tin nhắn"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    </div>
    <div class="customer-chat__footnote">AE Phoenix Store <span>•</span> Hỗ trợ trực tuyến</div>
</section>

<style>
    .customer-chat-launcher,
    .customer-chat {
        --chat-ink: #172a3a;
        --chat-blue: #087f9c;
        --chat-mint: #dff4ef;
        font-family: inherit;
    }

    .customer-chat-launcher {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 62px;
        height: 62px;
        border: 0;
        border-radius: 20px;
        background: var(--chat-blue);
        color: #fff;
        box-shadow: 0 12px 30px rgba(8, 127, 156, .32);
        cursor: pointer;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .customer-chat-launcher:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 34px rgba(8, 127, 156, .38);
    }

    .customer-chat-launcher > i { font-size: 25px; }
    .customer-chat-launcher__dot {
        position: absolute;
        top: 9px;
        right: 9px;
        width: 10px;
        height: 10px;
        border: 2px solid #fff;
        border-radius: 50%;
        background: #55c99a;
    }

    .customer-chat {
        position: fixed;
        right: 24px;
        bottom: 100px;
        z-index: 999999;
        display: none;
        flex-direction: column;
        width: min(390px, calc(100vw - 32px));
        height: min(610px, calc(100dvh - 124px));
        min-height: 390px;
        overflow: hidden;
        border: 1px solid rgba(23, 42, 58, .09);
        border-radius: 18px;
        background: #fff;
        color: var(--chat-ink);
        box-shadow: 0 24px 70px rgba(23, 42, 58, .22);
    }

    .customer-chat__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 78px;
        padding: 15px 18px;
        background: var(--chat-blue);
        color: #fff;
    }

    .customer-chat__identity { display: flex; align-items: center; gap: 12px; }
    .customer-chat__avatar {
        display: grid;
        place-items: center;
        width: 44px;
        height: 44px;
        border: 1px solid rgba(255,255,255,.35);
        border-radius: 14px;
        background: rgba(255,255,255,.14);
        font-size: 20px;
    }

    .customer-chat__identity strong,
    .customer-chat__identity span { display: block; }
    .customer-chat__identity strong { font-size: 15px; font-weight: 700; }
    .customer-chat__identity span { margin-top: 4px; color: rgba(255,255,255,.82); font-size: 12px; }
    .customer-chat__identity span i { display: inline-block; width: 7px; height: 7px; margin-right: 5px; border-radius: 50%; background: #73e0a7; }
    .customer-chat__close { width: 34px; height: 34px; border: 0; border-radius: 10px; background: rgba(255,255,255,.13); color: #fff; font-size: 24px; line-height: 1; cursor: pointer; }
    .customer-chat__close:hover { background: rgba(255,255,255,.24); }

    .customer-chat__intro { padding: 19px 20px 13px; background: #f5faf9; }
    .customer-chat__eyebrow { display: block; margin-bottom: 6px; color: var(--chat-blue); font-size: 10px; font-weight: 800; }
    .customer-chat__intro strong { display: block; font-size: 18px; }
    .customer-chat__intro p { margin: 5px 0 0; color: #687a84; font-size: 12px; line-height: 1.5; }

    .customer-chat__messages { flex: 1; min-height: 0; padding: 18px; overflow-y: auto; background: #fbfdfd; }
    .customer-chat-row { display: flex; margin-bottom: 12px; }
    .customer-chat-row--admin { justify-content: flex-start; }
    .customer-chat-row--customer { justify-content: flex-end; }
    .customer-chat-bubble { max-width: 82%; padding: 11px 14px; border-radius: 15px 15px 15px 4px; background: #edf3f4; color: #253946; font-size: 13px; line-height: 1.55; overflow-wrap: anywhere; white-space: pre-wrap; }
    .customer-chat-row--customer .customer-chat-bubble { border-radius: 15px 15px 4px 15px; background: var(--chat-blue); color: #fff; }

    .customer-chat__composer { display: flex; align-items: center; gap: 9px; padding: 12px 14px 8px; border-top: 1px solid #e8efef; background: #fff; }
    .customer-chat__composer input { flex: 1; min-width: 0; height: 44px; padding: 0 14px; border: 1px solid #dce6e7; border-radius: 13px; outline: 0; background: #f8fbfb; color: var(--chat-ink); font-size: 13px; }
    .customer-chat__composer input:focus { border-color: var(--chat-blue); box-shadow: 0 0 0 3px rgba(8,127,156,.1); }
    .customer-chat__composer button { flex: 0 0 44px; height: 44px; border: 0; border-radius: 13px; background: var(--chat-blue); color: #fff; font-size: 16px; cursor: pointer; }
    .customer-chat__composer button:hover { background: #06677f; }
    .customer-chat__footnote { padding: 0 14px 11px; color: #87969d; text-align: center; font-size: 10px; }
    .customer-chat__footnote span { padding: 0 4px; color: #55b89b; }

    @media (max-width: 540px) {
        .customer-chat-launcher { right: 16px; bottom: 16px; width: 56px; height: 56px; border-radius: 18px; }
        .customer-chat { inset: 0; width: 100%; height: 100dvh; min-height: 0; border: 0; border-radius: 0; }
    }
</style>