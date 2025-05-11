<!-- Chatbot Icon & Popup - Glassmorphism Style -->
<style>
    #chatbot {
        position: fixed;
        bottom: 20px;
        left: 20px; /* <- dari right ke left */
        z-index: 1000;
    }

    #chatWindow {
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        border-radius: 16px;
        color: #000; /* <- pastikan default teks hitam */
        transition: all 0.3s ease-in-out;
    }

    #chatWindow input,
    #chatWindow button {
        border-radius: 8px;
        border: none;
        outline: none;
    }

    #chatWindow input {
        padding: 6px 10px;
        width: 100%;
        background: rgba(255, 255, 255, 0.3);
        color: #000;
        margin-bottom: 5px;
    }

    #chatWindow button {
        background: #4a90e2;
        color: white;
        padding: 6px 12px;
        cursor: pointer;
    }

    .chat-icon {
        background: #4a90e2;
        color: #000;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }
</style>


<div id="chatbot" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <button id="chatToggle" class="chat-icon">💬</button>

    <div id="chatWindow" style="display: none; width: 320px; height: 460px; padding: 16px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <strong style="font-size: 16px;">ChatBot</strong>
            <button id="closeChat" style="background: none; border: none; font-size: 18px; color: white;">✖</button>
        </div>
        <div id="chatMessages" style="height: 300px; overflow-y: auto; background: rgba(255,255,255,0.1); padding: 10px; border-radius: 8px; margin-bottom: 10px;"></div>
        <form id="chatForm">
            <input type="text" id="chatInput" placeholder="Tulis pesan..." />
            <button type="submit" style="margin-top: 6px; width: 100%;">Kirim</button>
        </form>
    </div>
</div>

<script>
    const chatToggle = document.getElementById('chatToggle');
    const chatWindow = document.getElementById('chatWindow');
    const closeChat = document.getElementById('closeChat');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');

    chatToggle.addEventListener('click', () => {
        chatWindow.style.display = 'block';
    });

    closeChat.addEventListener('click', () => {
        chatWindow.style.display = 'none';
    });

    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const userMessage = chatInput.value;
        if (!userMessage) return;

        appendMessage('user', userMessage);
        chatInput.value = '';

        appendMessage('bot', '...'); // placeholder

        try {
            const response = await fetch('/chatbot/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: userMessage })
            });
            const data = await response.json();
            const botMessage = data.choices?.[0]?.message?.content || 'Tidak ada respon.';

            removeLastBotPlaceholder();
            appendMessage('bot', botMessage);
        } catch (error) {
            removeLastBotPlaceholder();
            appendMessage('bot', 'Terjadi kesalahan.');
        }
    });

    function appendMessage(sender, text) {
        const div = document.createElement('div');
        div.style.marginBottom = '6px';
        div.innerHTML = `<strong style="color: ${sender === 'user' ? '#000' : '#eee'};">${sender === 'user' ? 'Anda' : 'Bot'}:</strong> <span style="color: ${sender === 'user' ? '#000' : '#fff'}">${text}</span>`;
        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function removeLastBotPlaceholder() {
        const last = chatMessages.lastChild;
        if (last && last.innerText.includes('Bot: ...')) {
            chatMessages.removeChild(last);
        }
    }

    function appendMessage(sender, text) {
    const div = document.createElement('div');
    div.style.marginBottom = '6px';
    div.innerHTML = `<strong style="color: ${sender === 'user' ? '#000' : '#000'};">${sender === 'user' ? 'Anda' : 'Bot'}:</strong> <span style="color: #000">${text}</span>`;
    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

</script>
