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

// Şifremi unuttum butonuna tıklandığında
document.getElementById("sifremiUnuttumButton").addEventListener("click", function() {
    // Giriş yap butonunu ve şifre alanını gizle
    document.getElementById("sifremiUnuttumButton").style.display = "none";
    document.getElementById("sifreResetButton").style.display = "block";
    document.getElementById("g_sifre").style.display = "none";
    document.getElementById("g_girişYap").style.display = "none";
    document.getElementById("g_sifreLabel").style.display = "none";
  });
  




    
    function epostacontrol() {
        
        var email = document.getElementById("email").value;
        var text = document.getElementById("text");

        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if(email.match(pattern)) {
            
            text.innerHTML = "Geçerli e-posta";
            text.style.color = "green";
        } else {
            
            text.innerHTML = "Geçersiz e-posta!";
            text.style.color = "red";

        }
        if (email == "") {
            text.innerHTML = "";
            
        }
    }

    function sifreControl() {
        var sifre = document.getElementById("sifre").value;
        var sifre_tekrar = document.getElementById("sifre_tekrar").value;
        var sifreText = document.getElementById("sifreText");
        var sifre_tekrarText = document.getElementById("sifre_tekrarText");
        
        var hasUppercase = /[A-Z]/.test(sifre);
        var hasNumber = /\d/.test(sifre);
        var hasMinLength = sifre.length >= 8;
    
        if (hasUppercase && hasNumber && hasMinLength) {
            sifreText.innerHTML = "Güçlü şifre";
            sifreText.style.color = "green";
            
        } else {
            sifreText.innerHTML = "Şifre zayıf! En az bir büyük harf, bir sayı ve sekiz karakter içermelidir.";
            sifreText.style.color = "red";
            
            
            }
    
        if (sifre === sifre_tekrar && sifre_tekrar !== "") {
            sifre_tekrarText.innerHTML = "Şifreler eşleşiyor";
            sifre_tekrarText.style.color = "green";
            
            
            
        } else {
            sifre_tekrarText.innerHTML = "Şifreler eşleşmiyor";
            sifre_tekrarText.style.color = "red";
            
            
        }
    }

    function validateForm() {
        
        epostacontrol();
        sifreControl();
    
        
        var emailIsValid = document.getElementById("text").style.color === "green";
        var passwordIsValid = document.getElementById("sifreText").style.color === "green" &&
                              document.getElementById("sifre_tekrarText").style.color === "green";
    
        // kontroller doğru ise return true 
        return emailIsValid && passwordIsValid;
    }

    
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName('close')[0];
    var aydinlatmaMetni = document.getElementById('aydinlatma-metni');

    aydinlatmaMetni.onclick = function () {
        modal.style.display = 'block';
    };

    span.onclick = function () {
        modal.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    function setActiveLink(element) {
        // Tıklandığında diğer linklerden 'active' sınıfını kaldır
        var links = document.querySelectorAll('.fa-ul a');
        links.forEach(function(link) {
          link.classList.remove('active');
        });
        element.classList.add('active');
        
        var faLiCoText = document.querySelector('.active .fa-li-co').innerText;    
        document.getElementById('p_title').innerText=faLiCoText;
    
      }

    

    
    
    




    
