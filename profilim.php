<?php require_once("baglan.php");  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Profilim</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/styles_premium.css"> 
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  
    <?php require_once("navbar.php"); ?>

  <section class="section_container mt-5">
    <div class="row mx-auto col-md-9">
      <div class="col-md-4">
        <div style="padding-bottom: 20px;">
          <img src="https://www.dekoros.com/wp-content/uploads/2023/05/YH-00850.jpg" class="yuvarlak-imge" width="60">
          <span style="font-size: larger;font-weight: 500; padding-left: 4px;">Alperen Kösemeci</span>
        </div>
        <!--veri tabanından çekilecek isim ve profilim yazısı-->
        <ul class="fa-ul">
          <li style="padding-top: 8px;"><a onclick="setActiveLink(this)" class="active">
              <span class="fa-li"><i class="fas fa-user-cog"></i></span>
              <span class="fa-li-co">Kullanıcı bilgilerim</span></a> </li>

          <li><a  onclick="setActiveLink(this)">
              <span class="fa-li"><i class="far fa-gem"></i></span>
              <span class="fa-li-co">Premium' u keşfet</span></a></li>

          <li><a  onclick="setActiveLink(this)">
              <span class="fa-li"><i class="fas fa-map-marked-alt"></i></span>
              <span class="fa-li-co" name="rota"> Rotalarım</span></a></li>

          <li><a  onclick="setActiveLink(this)">
              <span class="fa-li"><i class="fas fa-bookmark"></i></span>
              <span class="fa-li-co">Kaydettiklerim</span></a></li>

          <li><a  onclick="setActiveLink(this)">
              <span class="fa-li"><i class="fas fa-thumbs-up"></i></span>
              <span class="fa-li-co">Değerlendirmelerim</span></a></li>

          <li><a  onclick="setActiveLink(this)">
              <span class="fa-li"><i class="fas fa-comment-dots"></i></span>
              <span class="fa-li-co">Soru ve taleplerim</span></a></li>

          <li><a  onclick="setActiveLink(this)">
              <span class="fa-li"><i class="fas fa-sign-out-alt"></i></span>
              <span class="fa-li-co">Çıkış yap</span></a></li>
        </ul>

      </div>
      <div class="col-md-8 mt-4" id="p_div">
        <h4 id="p_title">Kullanıcı bilgilerim</h4>
        <div class="p_content" id="Premium' u keşfet" style="display: none;">
          <div class="card-container">
            <div class="card">
              <div class="circle">
                <h2>Yıllık</h2>
              </div>
              <div class="content">
                <p>Fırsatları kaçırma! Yıl boyunca üyeliğin ayda <br> 10,90 TL</p>
                <button class="yillik-button ilk-yillik-button" onclick="showDescription('yillik')">Premiuma
                  geç</button>
              </div>
            </div>
            <div class="card">
              <div class="circle">
                <h2>Aylık</h2>
              </div>
              <div class="content">
                <p>Fırsatları kaçırma! Premium üyeliğin ayda <br> 15,00 TL</p>
                <button class="aylik-button ikinci-aylik-button" onclick="showDescription('aylik')">Premiuma
                  geç</button>
              </div>
            </div>
            <div id="form-container">
              <form id="aylik-form" style="display:none">
                <label for="aylik-aciklama"><br> <br> Aylık premium üyelik ile sınırsız bir şekilde rota oluşturabilir,
                  rotanızı haritalarınıza kaydederek seyahatinizin keyfini çıkarabilirsiniz. <br> <br></label>
                <button class="aylik_button"> premium al</button>
              </form>
              <form id="yillik-form" style="display:none">
                <label for="yillik-aciklama"><br> <br> Yıllık premium ile sınırsız rota, sınırsız eğlenceyi daha uygun
                  fiyata elde etme şansını kaçırmayın. Kaydettiğiniz rotalarınız ile zamansız seyahatlerin tadını
                  çkarın!<br> <br></label>
                <button class="yillik_button"> premium al</button>
            </div>
          </div>

        </div>

        <div class="p_content" id="Kullanıcı bilgilerim" style="display: inline;">

          <!--BURASI DOLDURULUCAK-->
          <H1>Kullanıcı bilgilerim içeriği</H1>
          <p>default geliyor..</p>
          <!--Fotoğraf değişikliği şifre e posta değişikliği vb.-->

        </div>

        <div class="p_content" id="Soru ve taleplerim" style="display: none;">

          <!--BURASI DOLDURULUCAK-->
          <H1>Soru ve taleplerim içeriği</H1>
          <!--Soru ve talep arayüzü olabilir iki metin içeriği gönder olur admin sayfasında görünür-->

        </div>
        <div class="p_content" id="Rotalarım" style="display: none;">

          <!--BURASI DOLDURULUCAK-->
          <h1>Rotalarım içeriği</h1>
          <!--rota hakkında bilgiler zaman falan tutulur yapanın yaratıcılığına kalmış-->

        </div>
        <div class="p_content" id="Kaydettiklerim" style="display: none;">
          <!--BURASI DOLDURULUCAK-->
          <h1>Kaydettiklerim içeriği</h1>
          <!--Kaydedilen mekanların küçük kartları gösterilebilir-->

          </div>
          <div class="p_content" id="Değerlendirmelerim" style="display: none;">
            <!--BURASI DOLDURULUCAK-->
            <h1>Değerlendirmelerim içeriği</h1>
            <!-- kart adı falan çıkıp verdiği puan yorum gösterebiliriz.-->

            </div>
              <div class="p_content" id="Çıkış yap" style="display: none;">
                <div id="myModal" class="modal" style="display: block;">
                  <div class="modal-content">
                      <h2>Çıkış yapmak istediğinizden emin misiniz?</h2>
                      <div class="modal-buttons">
                          <button onclick="confirmExit()">Evet</button>
                          <button onclick="closeModal()">Hayır</button>
                      </div>
                  </div>
              </div>
            </div>

      </div>
    </div>
  </section>




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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js/scr_profilim.js"></script>

  

</body>

</html>