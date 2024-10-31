
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendBtn = document.querySelector("#send-btn");
const navItems = document.querySelectorAll(".nav-item input");


const API_KEY = "AIzaSyBy0FwxgUwQTlZODgizisb3yhovTmL2LTY";
const API_URL = `https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=${API_KEY}`;


let isResponseGenerating = false;


const createMessageElement = (message, isUser = true) => {
    const messageElem = document.createElement("li");
    messageElem.className = `chat ${isUser ? "outgoing" : "incoming"}`;
    const avatar = document.createElement("span");
    avatar.className = "material-symbols-outlined";
    // avatar.innerText = isUser ? "person" : "smart_toy";
    const messageText = document.createElement("p");
    messageText.innerText = message;
    messageElem.append(avatar, messageText);
    return messageElem;
};

const addMessageToChat = (message, isUser = true) => {
    const messageElem = createMessageElement(message, isUser);
    chatbox.appendChild(messageElem);
    chatbox.scrollTo(0, chatbox.scrollHeight);
};


const getChatbotResponse = async (userMessage) => {
    try {
        const response = await fetch(API_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                contents: [{ role: "user", parts: [{ text: userMessage }] }]
            })
        });
        const data = await response.json();

        if (!response.ok) throw new Error(data.error.message);


        const botMessage = data?.candidates[0]?.content?.parts[0]?.text || "Sorry, I couldn't understand.";
        addMessageToChat(botMessage, false);
    } catch (error) {
        addMessageToChat("Error: " + error.message, false);
    } finally {
        isResponseGenerating = false;
    }
};


const handleUserMessage = () => {
    const userMessage = chatInput.value.trim();
    if (!userMessage || isResponseGenerating) return;

    isResponseGenerating = true;
    addMessageToChat(userMessage);
    chatInput.value = ""; 

    getChatbotResponse(userMessage); 
};


sendBtn.addEventListener("click", handleUserMessage);

chatInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter" && !e.shiftKey) {
        e.preventDefault();
        handleUserMessage();
    }
});


const highlightActivePage = () => {
    const path = window.location.pathname;
    navItems.forEach((input) => {
        if (path.includes(input.id.replace("input-", ""))) {
            input.checked = true;
        }
    });
};

window.onload = highlightActivePage;
