document.getElementById('toRegister').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.form-login').classList.add('hidden');
    document.querySelector('.form-register').classList.remove('hidden');
});

document.getElementById('toLogin').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.form-register').classList.add('hidden');
    document.querySelector('.form-login').classList.remove('hidden');
});

document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Login submitted');
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Registration submitted');
});
