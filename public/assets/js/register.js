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
            var errorMessage = this.nextElementSibling.nextElementSibling;
            errorMessage.textContent = ""; // Clear the error message when input is valid
        }
    });
});

function validateRegisterForm(event) {
    event.preventDefault(); // Prevent form submission for testing
    
    var username = document.querySelector("#register .input-box input[type='text']");
    var password = document.querySelector("#register .input-box input[type='password']");
    var phoneNumber = document.querySelector("#register .input-box input[type='number']:not([id='nationalCode'])");
    var email = document.querySelector("#register .input-box input[type='email']");
    var address = document.querySelector("#register .input-box input[type='text']:not([id='username'])");
  
    var isValid = true; // Flag to track form validity

    // Reset previous invalid field styles
    inputFields.forEach(function (field) {
        field.classList.remove("invalid");
    });

    // Clear previous error messages
    var errorMessages = document.querySelectorAll("#register .error-message");
    errorMessages.forEach(function (message) {
        message.textContent = "";
    });

    // Validate each field separately
    if (username) {
        var usernameValue = username.value.trim();
        var usernamePattern = /^(?![0-9])[a-zA-Z0-9\u0600-\u06FF]{3,}$/;
        if (!usernamePattern.test(usernameValue)) {
            username.classList.add("invalid");
            var errorMessage = username.nextElementSibling.nextElementSibling;
            errorMessage.textContent = 'لطفا یک نام کاربری وارد کنید';
            isValid = false;
        }
    }

    if (password) {
        var passwordValue = password.value.trim();
        var passwordPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}/;
        if (!passwordPattern.test(passwordValue)) {
            password.classList.add("invalid");
            var errorMessage = password.nextElementSibling.nextElementSibling;
            errorMessage.textContent = 'لطفا یک رمز مناسب وارد کنید';
            isValid = false;
        }
    }

    if (phoneNumber) {
        var phoneNumberValue = phoneNumber.value.trim();
        var phoneNumberPattern = /^0\d{10}$/;
        if (!phoneNumberPattern.test(phoneNumberValue)) {
            phoneNumber.classList.add("invalid");
            var errorMessage = phoneNumber.nextElementSibling.nextElementSibling;
            errorMessage.textContent = 'لطفا شماره تلفن معتبر وارد کنید';
            isValid = false;
        }
    }

    if (email) {
        var emailValue = email.value.trim();
        var emailPattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        if (!emailPattern.test(emailValue)) {
            email.classList.add("invalid");
            var errorMessage = email.nextElementSibling.nextElementSibling;
            errorMessage.textContent = 'لطفا یک ایمیل معتبر وارد کنید';
            isValid = false;
        }
    }

    // Validate address field (must not be empty)
    if (address) {
        var addressValue = address.value.trim();
        if (addressValue === '') {
            address.classList.add("invalid");
            var errorMessage = address.nextElementSibling.nextElementSibling;
            errorMessage.textContent = 'لطفا آدرس خود را وارد کنید';
            isValid = false;
        }
    }

    return isValid;
}
