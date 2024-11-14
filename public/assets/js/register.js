var registerForm = document.querySelector("#register");
var inputFields = document.querySelectorAll("#register .input-box input");

// Attach event listener to the form
registerForm.addEventListener('submit', validateRegisterForm);

// Attach event listener to the input fields
inputFields.forEach(function (field) {
 field.addEventListener('input', function () {
     // Remove the invalid class if the field is not empty
     if (this.value !== '') {
         this.classList.remove("invalid");
     }
 });
});
function validateRegisterForm() {
    var username = document.querySelector("#register .input-box input[type='text']");
    var password = document.querySelector("#register .input-box input[type='password']");
    // var nationalCode = document.querySelector("#register .input-box input[id='nationalCode']");
    var phoneNumber = document.querySelector("#register .input-box input[type='number']:not([id='nationalCode'])"); 
    var email = document.querySelector("#register .input-box input[type='email']");
    var isValid = true; // Flag to track form validity
   
 
    // Reset previous invalid field styles
    var inputFields = document.querySelectorAll("#register .input-box input");
    var errorMessages = document.querySelectorAll("#register .error-message");
    inputFields.forEach(function (field) {
        field.classList.remove("invalid");
    });
    errorMessages.forEach(function (message) {
        message.textContent = "";
    });
 
    // Validate each field separately
    if (username) {
        var usernameValue = username.value.trim();
        var usernamePattern = /^(?![0-9])[a-zA-Z0-9\u0600-\u06FF]{3,}$/;
        if (!usernamePattern.test(usernameValue)) {
            username.classList.add("invalid");
            var existingErrorMessage = username.nextElementSibling;
            if (!existingErrorMessage || !existingErrorMessage.classList.contains('error-message')) {
                var errorMessage = document.createElement('span');
                errorMessage.textContent = 'لطفا یک نام کاربری وارد کنید';
                errorMessage.style.color = "white";
                errorMessage.classList.add('error-message');
                username.parentElement.appendChild(errorMessage);
            }
            isValid = false;
        }
     }
 
     if (password) {
        var passwordValue = password.value.trim();
        var passwordPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}/;
        if (!passwordPattern.test(passwordValue)) {
            password.classList.add("invalid");
            var existingErrorMessage = password.nextElementSibling;
            if (!existingErrorMessage || !existingErrorMessage.classList.contains('error-message')) {
                var errorMessage = document.createElement('span');
                errorMessage.textContent = 'لطفا یک رمز مناسب وارد کنید';
                errorMessage.style.color = "white";
                errorMessage.classList.add('error-message');
                password.parentElement.appendChild(errorMessage);
            }
            isValid = false;
        }
      }
      
   
      
      if (phoneNumber) {
        var phoneNumberValue = phoneNumber.value.trim();
        var phoneNumberPattern = /^0\d{10}$/;
        if (!phoneNumberPattern.test(phoneNumberValue)) {
            phoneNumber.classList.add("invalid");
            var existingErrorMessage = phoneNumber.nextElementSibling;
            if (!existingErrorMessage || !existingErrorMessage.classList.contains('error-message')) {
                var errorMessage = document.createElement('span');
                errorMessage.textContent = 'لطفا شماره تلفن معتبر وارد کنید';
                errorMessage.style.color = "white";
                errorMessage.classList.add('error-message');
                phoneNumber.parentElement.appendChild(errorMessage);
            }
            isValid = false;
        }
      }
      
      if (email) {
        var emailValue = email.value.trim();
        var emailPattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        if (!emailPattern.test(emailValue)) {
            email.classList.add("invalid");
            var existingErrorMessage = email.nextElementSibling;
            if (!existingErrorMessage || !existingErrorMessage.classList.contains('error-message')) {
                var errorMessage = document.createElement('span');
                errorMessage.textContent = 'لطفا یک ایمیل معتبر وارد کنید';
                errorMessage.style.color = "white";
                errorMessage.classList.add('error-message');
                email.parentElement.appendChild(errorMessage);
            }
            isValid = false;
        }
      }
 
    if (isValid) {
        // Submit the form or perform further actions
        window.location.href = "../views/index.html";
    }
 
    return isValid;
 }