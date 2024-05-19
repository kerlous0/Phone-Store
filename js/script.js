let form =document.getElementById("form");
let name = document.getElementById("name");
let email = document.getElementById("email");
let password = document.getElementById("pwd");
let Cpassword = document.getElementById("pwd2");
let sumbit = document.getElementById('sumbit');
let message = document.getElementById('message');




form.onsubmit = function(event) {
    if (password.value !== Cpassword.value) {
        event.preventDefault();
        message.innerHTML = "Passwords do not match";
    }

}
