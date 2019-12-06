function solve() {
   function HandleButtonSend(e) {
      let input = document.querySelector('#chat_input');
      let output = document.createElement('div');
      output.classList.add('message', 'my-message');
      output.innerHTML = input.value;
      console.log(output)

      let chat_messages = document.querySelector('#chat_messages');
      chat_messages.appendChild(output);
      input.value = '';
   }
   document.getElementById('send').addEventListener('click', HandleButtonSend);
}