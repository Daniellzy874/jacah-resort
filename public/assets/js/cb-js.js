const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatBox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");
const closebot = document.querySelector('#cloxs');

closebot.addEventListener('click', () =>
    document.body.classList.remove("show-chatbot")
);

chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));