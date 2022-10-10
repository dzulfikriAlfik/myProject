const form = document.querySelector('.typing-area'),
      inputField = form.querySelector('.input-field'),
      sendBtn = form.querySelector('button'),
      chatBox = document.querySelector('.chat-box');
      
form.addEventListener('submit', (event) => {
   event.preventDefault();
});

sendBtn.addEventListener('click', () => {
   // ajax
   let xhr = new XMLHttpRequest(); //creating XML object
   xhr.open("POST", "action/insert-chat.php", true);
   xhr.addEventListener('load', () => {
      if(xhr.readyState === XMLHttpRequest.DONE) {
         if(xhr.status === 200) {
            inputField.value = "";
            scrollToBottom();
         }
      }
   });
   // send data from ajax to php
   let formData = new FormData(form); //creating new format data object
   xhr.send(formData); //sending formData to php
});

chatBox.addEventListener('mouseenter', () => {
   chatBox.classList.add('active');
});
chatBox.addEventListener('mouseleave', () => {
   chatBox.classList.remove('active');
});

setInterval(() => {
   let xhr = new XMLHttpRequest(); //creating XML object
   xhr.open("POST", "action/get-chat.php", true);
   xhr.addEventListener('load', () => {
      if(xhr.readyState === XMLHttpRequest.DONE) {
         if(xhr.status === 200) {
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains('active')) {
               scrollToBottom();
            }
         }
      }
   });
   // send data from ajax to php
   let formData = new FormData(form); //creating new format data object
   xhr.send(formData); //sending formData to php
}, 500);

function scrollToBottom() {
   chatBox.scrollTop = chatBox.scrollHeight;
}