<!-- Chatbot Icon & Popup - Glassmorphism Style -->
<style>
  #chatbot {
    position: fixed;
    bottom: 20px;
    top: 30px;
    left: 20px;
    z-index: 1000;
}

/* Add these new styles */
@keyframes floatBubble {
        0% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(3deg); }
        100% { transform: translateY(0px) rotate(0deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 4px solid #6e48aa;
        animation: spin 1s linear infinite;
        margin: 20px auto;
        display: none;
    }

    #chatWindow {
  position: relative;
  overflow: hidden;
  backdrop-filter: blur(15px);
  background: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
  border-radius: 16px;
  color: #000;
  transition: all 0.3s ease-in-out;
}

/* Container untuk bubble */
#chatWindow .bubbles {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  z-index: 0;
  overflow: hidden;
  pointer-events: none;
}

/* Bubble 3D style */
#chatWindow .bubble {
  position: absolute;
  bottom: -60px;
  border-radius: 50%;
  background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.1));
  box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
  animation: rise 12s infinite ease-in;
  opacity: 0.6;
  will-change: bottom, opacity;
  transition: transform 0.2s ease-in-out;
}

/* Responsive bubble sizes and animation */
#chatWindow .bubble:nth-child(1) {
  width: 40px; height: 40px; left: 10%;
  animation-duration: 9s;
}
#chatWindow .bubble:nth-child(2) {
  width: 25px; height: 25px; left: 25%;
  animation-duration: 11s; animation-delay: 2s;
}
#chatWindow .bubble:nth-child(3) {
  width: 50px; height: 50px; left: 45%;
  animation-duration: 13s; animation-delay: 3s;
}
#chatWindow .bubble:nth-child(4) {
  width: 30px; height: 30px; left: 65%;
  animation-duration: 10s; animation-delay: 1.5s;
}
#chatWindow .bubble:nth-child(5) {
  width: 20px; height: 20px; left: 80%;
  animation-duration: 12s; animation-delay: 4s;
}

/* Animasi vertikal + opacity dinamis */
@keyframes rise {
  0% {
    bottom: -60px;
    opacity: 0;
    transform: scale(0.9);
  }
  50% {
    opacity: 0.7;
    transform: scale(1.05);
  }
  100% {
    bottom: 460px;
    opacity: 0;
    transform: scale(1.2);
  }
}




    /* @keyframes fadeIn{
       to {
        opacity: 1;

       }
    } */

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
    #chatWindow {
    pointer-events: auto;
    z-index: 9998;
}

.chat-icon {
    z-index: 9998;
}

.checkbox-label {
    pointer-events: auto; /* bisa klik */
}
#closeChat {
    background: none !important; border: none; font-size: 18px; color: white; border-radius: 20%; opacity: 0; animation: fadeInClose 2s forwards;
    }
@keyframes fadeInClose {
    to {
        opacity: 1;
    }
}
</style>


<div id="chatbot" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <button id="chatToggle" class="chat-icon">💬</button>

    <div id="chatWindow" class="bubble" style="display: none; width: 320px; height: 460px; padding: 16px;">
        <div class="bubbles">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <!-- Tambahkan elemen .bubble sesuai kebutuhan -->
  </div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <strong style="font-size: 16px;">ChatBot</strong>
            <button id="closeChat">✖</button>
        </div>
        <div id="chatMessages" style="height: 300px; overflow-y: auto; background: rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 8px; margin-bottom: 10px;"></div>
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
