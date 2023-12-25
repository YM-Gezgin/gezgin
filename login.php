<?php require_once("baglan.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giris</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body>

    <?php
    require_once('navbar.php');
    ?>

    <div class="jumbotron text-center header-jumbotron" style="background: none;">
        <h5 style="text-align: center;">"Dünya bir kitaptır ve seyahat etmeyenler, onun sadece bir sayfasını okurlar."-
            Augustinus.</h5>
    </div>


    <!-- Kayıt Ol formu -->
    <div class="register-form">
        <div class="d-flex justify-content-center mt-0">
            <button type="button" id="showLoginFromRegister" class="btn btn-primary">Giriş Yap</button>
            <button type="button" id="showRegisterFromRegister" class="btn btn-secondary ">Üye Ol</button>
        </div>
        <div class="form-container">


            <form id="registerForm" action="uye_ol.php" method="post" onsubmit="return validateForm()">


                <p class="text-center" style="margin-top: 10px;">Merhaba gezgin,<br> Hemen giriş yap ya da hesap oluştur, rotanı belirleyelim
                    seyahate başla!</p>
                <div class="row justify-content-center">

                    <div class="col-md-6">


                        <div class="form-group">
                            <p style="color:red" id="register_error"></p>
                            <label for="isim">İsim-Soy isim:</label>
                            <input type="text" class="form-control" name="isim" id="isim" placeholder="İsminizi giriniz" required>
                        </div>

                        <div class="form-group">

                            <label for="email">E-posta:</label>
                            <input type="text" class="form-control" name="email" id="email" onkeyup="epostacontrol()" placeholder="E-posta adresinizi giriniz" required>
                            <span id="text"></span>

                        </div>


                        <div class="form-group">

                            <label for="sifre">Şifre:</label>
                            <input type="password" class="form-control" name="sifre" id="sifre" onkeyup="sifreControl()" placeholder="Şifrenizi giriniz" required>
                            <span id="sifreText"></span>

                        </div>
                        <div class="form-group">

                            <label for="sifre_tekrar">Tekrar Şifre:</label>
                            <input type="password" class="form-control" name="sifre_tekrar" id="sifre_tekrar" onkeyup="sifreControl()" placeholder="Şifrenizi tekrar giriniz" required>
                            <span id="sifre_tekrarText"></span>

                        </div>




                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="onay1" required>
                            <label class="form-check-label" for="onay1">Tarafıma avantajlı tekliflerin sunulabilmesi
                                amacıyla kişisel verilerimin işlenmesine ve paylaşılmasına açık rıza
                                veriyorum.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="onay2" required>
                            <label class="form-check-label" for="onay2">Tarafıma elektronik ileti gönderilmesini
                                kabul ediyorum.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="onay3" required>
                            <label class="form-check-label" for="onay3">
                                Kişisel verilerimin işlenmesine yönelik
                                <span id="aydinlatma-metni" style="color: gray; cursor: pointer;  text-decoration: underline;">aydınlatma metnini </span>
                                okudum ve anladım.
                            </label>
                        </div>

                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p>Kullanım Şartları ve Gizlilik Politikası <br>

                                    Bu uygulamayı kullanmadan önce lütfen aşağıdaki şartları ve politikaları dikkatlice okuyun. <br>

                                    Kullanım Şartları:<br>

                                    1.Hesap Oluşturma ve Güvenlik:<br>

                                    • Uygulamayı kullanmak için bir hesap oluşturmalısınız.<br> Hesap bilgilerinizin güvenliği sizin sorumluluğunuzdadır.<br>
                                    • Hesap bilgilerinizi paylaşmaktan kaçının ve şifrenizi güvenli tutun.
                                    2.İçerik Kullanımı:<br>

                                    • Uygulama içindeki rehberlik ve bilgilendirme içeriğini kişisel kullanımınız için kullanabilirsiniz.<br>
                                    • İçeriklerin ticari amaçla kullanımı ve başka platformlarda paylaşılması yasaktır.<br>
                                    3.Kullanıcı Sorumluluğu:<br>

                                    • Uygulama içindeki bilgiler genel rehberlik amaçlıdır. Gerçek zamanlı güncellemeler için yerel kaynaklara başvurun.<br>
                                    • Gizlilik Politikası:<br>

                                    1.Kişisel Bilgiler:<br>

                                    • Hesap oluştururken verdiğiniz kişisel bilgiler (ad, e-posta vb.) gizli tutulacaktır.<br>
                                    • Bilgileriniz asla üçüncü şahıslarla paylaşılmayacaktır.<br>
                                    2.Konum ve İzinler:<br>

                                    • Uygulama, konum bilgilerinizi sadece gezginlik amaçlı kullanacaktır.<br>
                                    • Diğer izinler sadece uygulama içindeki işlevselliği artırmak için kullanılacaktır.<br>
                                    3.Çerezler ve Analitik Veriler:<br>

                                    • Uygulama, kullanım istatistikleri ve performans analizi için çerezleri kullanabilir.<br>
                                    •Bu veriler, uygulamayı geliştirmek ve size daha iyi bir deneyim sunmak için kullanılacaktır.<br>
                                    4.Güvenlik:<br>

                                    • Uygulama, güvenlik önlemleri alarak bilgilerinizi koruma amacını taşır.<br>
                                    • Güvenlik ihlali durumunda derhal bildirimde bulunulacaktır.<br>
                                    Bu şartlar ve politikalar zaman zaman güncellenebilir. Güncellemeler hakkında size bildirim yapılacaktır. Uygulamayı kullanarak bu şartları ve politikaları kabul etmiş sayılırsınız.<br>

                                    Seyahat etmeye hazır mısınız? Keyifli geziler dileriz!</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-third" id="uye_ol_button" onclick="validateForm()">Üye Ol</button>
                        </div>

                    </div>

                </div>
            </form>
        </div>

    </div>


    <!-- Giriş yap formu-->
    <div class="login-form" style="display: none;">
        <div class="d-flex justify-content-center mt-0">
            <button type="button" id="showLoginFromLogin" class="btn btn-secondary ">Giriş Yap</button>
            <button type="button" id="showRegisterFromLogin" class="btn btn-primary ">Üye Ol</button>
        </div>
        <div class="form-container">
            <form id="loginForm" action="giris_yap.php" method="post">
                <!-- Form alanları -->

                <p class="text-center" style="margin-top:10px;">Merhaba gezgin,<br> Hemen giriş yap ya da hesap oluştur, rotanı belirleyelim
                    seyahate başla!</p>
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <div class="form-group">
                            <p style="color: red;" id="login_error"></p>
                            <label for="g_email">E-posta: </label>
                            <input type="email" class="form-control" name="g_email" id="g_email" placeholder="E-posta adresinizi girin" required>
                        </div>

                        <div class="form-group">
                            <label for="g_sifre" id="g_sifreLabel">Şifre:</label>
                            <input type="password" class="form-control" name="g_sifre" id="g_sifre" placeholder="Şifrenizi girin" required>
                        </div>
                        <div class="sifremiUnuttum">
                            <button id="sifremiUnuttumButton" class="sifremiUnuttumButton">Şifremi unuttum</button>
                            <button id="sifreResetButton" class="center" style="display: none;">Şifreyi Resetle</button>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-third" id="g_girisYap">Giriş Yap</button>
                        </div>



                    </div>
                </div>

            </form>

        </div>

    </div>

    <script>
            $(document).ready(function() {
            // Üye Ol formunu gönderme
            $("#registerForm").submit(function(event) {
                // Formun normal submit işlemini engelliyoruz
                event.preventDefault();

                // Form verilerini FormData nesnesine alıyoruz
                var formData = new FormData($(this)[0]);

                // Ajax isteği yapılıyor
                $.ajax({
                    url: "uye_ol.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response === 'success') {
                            document.getElementById('register_error').style.color = "green";
                            $('#register_error').text('Sisteme başarıyla kayıt oldunuz.');
                            document.getElementById('isim').value='';
                            document.getElementById('email').value='';
                            document.getElementById('sifre_tekrar').value='';
                            document.getElementById('sifre').value='';                            
                            document.getElementById('onay1').value='';
                            document.getElementById('onay2').value='';
                            document.getElementById('onay3').value='';
                        } else if (response === 'mail') {
                            document.getElementById('register_error').style.color = "red";
                            $('#register_error').text('Mail adresi sisteme kayıtlı.');
                        } else {
                            document.getElementById('register_error').style.color = "red";
                            $('#register_error').text('başarısız');
                        }
                    },
                    error: function(error) {

                        document.getElementById('register_error').style.color = "red";
                        document.getElementById('register_error').innerText = "Bilinmeyen bir hata oluştu";
                    }
                });
            });

            // Giriş Yap formunu gönderme
            $("#loginForm").submit(function(event) {
                // Formun normal submit işlemini engelliyoruz
                event.preventDefault();

                // Form verilerini FormData nesnesine alıyoruz
                var formData = new FormData($(this)[0]);

                // Ajax isteği yapılıyor
                $.ajax({
                    url: "giris_yap.php", // Verilerin gönderileceği sayfa
                    type: "POST", // HTTP methodu
                    data: formData, // Gönderilecek veriler
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // İstek başarılıysa burada işlemler yapabilirsiniz
                        if (response === 'success') {
                            window.location.href = "index.php";

                        } else if (response === 'password') {
                            $('#login_error').text('Şifre hatalı.');
                        } else {
                            $('#login_error').text('Mail adresi kayıtlı değil.');
                        }
                    },
                    error: function(error) {
                        document.getElementById('login_error').innerText = "Bilinmeyen bir hata oluştu.";
                    }
                });
            });
        });
    </script>


    <div class="mt-5 pt-5 pb-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <p>Hakkımızda</p>
                    <p class="pr-5 text-white-50">Gezgin olarak seyahat severlerin Türkiye'nin muhteşem
                        destinasyonlarını keşfetmelerine rehberlik etmek için buradayız.
                        Bizimle keşfedin, düşlerinizdeki seyahati planlamaya başlayın! </p>

                </div>
                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4"></h4>
                    <p>Reklam ve iş birliği için bize ulaşın</p>
                    <p><a href="#"><i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i></p>
                    <p><i class="fa fa-envelope"></i>info@gezgin.com</p>
                </div>
                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3"></h4>
                    <ul class="m-0 p-0">
                        <li><a href="#">Trabzon'da araç kiralama noktaları</a></li>
                        <li><a href="#">İstanbul' da gezilecek en güzel 10 yerı</a></li>
                        <li><a href="#">Ankara' da gezilecek en güzel 10 yer</a></li>
                        <li><a href="#">İzmir' de gezilecek en güzel 10 yer</a></li>
                        <li><a href="#">Antalya' da gezilecek en güzel 10 yer</a></li>
                        <li><a href="#">İstanbul' da araç kiralama noktaları</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© 2023. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script> 


</body>

</html>