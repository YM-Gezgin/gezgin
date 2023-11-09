
    document.addEventListener("DOMContentLoaded", function() {
        const loginForm = document.querySelector('.login-form');
        const registerForm = document.querySelector('.register-form');
        
        const showLoginFromRegister = document.getElementById('showLoginFromRegister');
        const showRegisterFromRegister = document.getElementById('showRegisterFromRegister');
        const showLoginFromLogin = document.getElementById('showLoginFromLogin');
        const showRegisterFromLogin = document.getElementById('showRegisterFromLogin');

        showLoginFromRegister.addEventListener('click', function() {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        });

        showRegisterFromRegister.addEventListener('click', function() {
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
        });

        showLoginFromLogin.addEventListener('click', function() {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        });

        showRegisterFromLogin.addEventListener('click', function() {
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
        });
    });
