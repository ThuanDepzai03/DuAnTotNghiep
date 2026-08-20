<div id="chat-button" onclick="toggleChat()" style="position: fixed !important; bottom: 20px !important; right: 20px !important; width: 60px !important; height: 60px !important; background-color: #0088FF !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; cursor: pointer !important; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important; z-index: 999999 !important;">
        <svg width="36" height="36" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24 4C12.95 4 4 11.83 4 21.48C4 26.68 7.02 31.28 11.75 34.39L9.5 42.5L18.25 38.35C20.09 38.88 22.01 39.16 24 39.16C35.05 39.16 44 31.33 44 21.68C44 12.03 35.05 4 24 4Z" fill="#FFFFFF"/>
            <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" fill="#0088FF" font-size="13" font-weight="bold" font-family="Arial">Zalo</text>
        </svg>
    </div>

    <!-- Khung Chat Pop-up -->
    <div id="chat-box" style="display: none; position: fixed !important; bottom: 90px !important; right: 20px !important; width: 320px !important; height: 400px !important; background-color: #ffffff !important; border-radius: 12px !important; box-shadow: 0 5px 25px rgba(0,0,0,0.25) !important; z-index: 999999 !important; flex-direction: column !important; overflow: hidden !important; font-family: Arial, sans-serif !important;">
        <div style="background-color: #0088FF; color: white; padding: 12px 15px; font-weight: bold; display: flex; justify-content: space-between; align-items: center;">
            <span>Hỗ trợ AE PHOENIC</span>
            <button onclick="closeChat()" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer;">&times;</button>
        </div>
        <div id="chat-messages" style="flex: 1; padding: 15px; overflow-y: auto; background-color: #f8f9fa;">
            <div style="display: flex; justify-content: flex-start; margin-bottom: 10px;">
                <div style="background-color: #e9ecef; color: #333; padding: 8px 12px; border-radius: 10px; max-width: 80%; font-size: 13px;">
                    Xin chào! AE Phoenic Store có thể hỗ trợ gì cho bạn?
                </div>
            </div>
        </div>
        <div style="display: flex; padding: 10px; border-top: 1px solid #eee; background: #fff;">
            <input type="text" id="chat-message" placeholder="Nhập tin nhắn..." onkeypress="handleChatEnter(event)" style="flex: 1; border: 1px solid #ddd; padding: 8px 12px; border-radius: 20px; outline: none; font-size: 13px;">
            <button onclick="sendMessage()" style="background: #0088FF; border: none; color: white; padding: 8px 15px; margin-left: 5px; border-radius: 50%; cursor: pointer;"><i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
