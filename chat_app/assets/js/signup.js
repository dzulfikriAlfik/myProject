const form = document.querySelector('.signup form'),
continueBtn = form.querySelector('.button input'),
errorText = form.querySelector('.error-txt');

form.addEventListener('submit', (event) => {
   event.preventDefault();
});

continueBtn.addEventListener('click', () => {
   // ajax
   let xhr = new XMLHttpRequest(); //creating XML object
   xhr.open("POST", "action/signup.php", true);
   xhr.addEventListener('load', () => {
      if(xhr.readyState === XMLHttpRequest.DONE) {
         if(xhr.status === 200) {
            let data = xhr.response;
            if(data == 'success') {
               location.href = 'users.php';
            } else {
               errorText.textContent = data;
               errorText.style.display = 'block';
            }
         }
      }
   });
   // send data from ajax to php
   let formData = new FormData(form); //creating new format data object
   xhr.send(formData); //sending formData to php
});