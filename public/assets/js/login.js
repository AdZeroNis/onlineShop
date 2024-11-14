var loginForm = document.querySelector("#login");
var loginInputFields = document.querySelectorAll("#login .input-box input");

// Attach event listener to the form
loginForm.addEventListener('submit', validateLoginForm);

// Attach event listener to the input fields
loginInputFields.forEach(function (field) {
 field.addEventListener('input', function () {
    // Remove the invalid class if the field is not empty
    if (this.value !== '') {
        this.classList.remove("invalid");
        
    }
 });
});
function validateLoginForm(event) {
    event.preventDefault(); // Ensure this is the very first line
    var username = document.querySelector("#login .input-box input[type='text']");
    var password = document.querySelector("#login .input-box input[type='password']");
 
   var isValid = true; // Flag to track form validity
 
   var inputFields = document.querySelectorAll("#login .input-box input");
   var errorMessages = document.querySelectorAll("#login .error-message");
 inputFields.forEach(function (field) {
        field.classList.remove("invalid");
    });
    errorMessages.forEach(function (message) {
        message.textContent = "";
    });

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

  if (password) {
       var passwordValue = password.value.trim();
       var passwordPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}/;
       if (!passwordPattern.test(passwordValue)) {
           password.classList.add("invalid");
           var existingErrorMessage = password.nextElementSibling;
           if (!existingErrorMessage || !existingErrorMessage.classList.contains('error-message')) {
               var errorMessage = document.createElement('span');
               errorMessage.textContent = 'لطفا یک رمز وارد کنید';
               errorMessage.style.color = "white";
               errorMessage.classList.add('error-message');
               password.parentElement.appendChild(errorMessage);
           }
           isValid = false;
       }
     }
     if (isValid) {
        password.classList.remove("invalid");
       // Store username and password in local storage
       localStorage.setItem("username", username.value);
       localStorage.setItem("password", password.value);
    }
  
    return isValid;
  } 