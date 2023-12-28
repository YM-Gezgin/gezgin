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
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" class="yuvarlak-imge" width="60">
          <span style="font-size: larger;font-weight: 500; padding-left: 4px;">Zeynep İlkay</span>
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

          
            <div class="container py-5 ">
              <div class="row d-flex  align-items-center ">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                  <div class="card-1 mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                      <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img id="avatarImage" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                        alt="Avatar" class="img-fluid my-5" style="width: 80px;" />

                        <h5 id="kullaniciAdi">Zeynep İlkay Şahin</h5>
                        <p>Gezgin</p>
                        <i class="far fa-edit mb-5" onclick="duzenle()"></i>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body p-4">
                          <h6>Bilgi</h6>
                          <hr class="mt-0 mb-4">
                          <div class="row pt-1">
                            <div class="col-6 mb-3">
                              <h6>Email</h6>
                              <p class="text-muted" id="kullaniciEmail">zeynep_ilkay@hotmail.com</p>
                            </div>
                            <div class="col-6 mb-3">
                              <h6>Telefon</h6>
                              <p class="text-muted" id="kullaniciTelefon">0545 423 81 20</p>
                            </div>
                          </div>
                          <h6>Hakkında</h6>
                          <hr class="mt-0 mb-4">
                          <div class="row pt-1">
                            <div class="col-6 mb-3">
                              <h6>Premium musunuz?</h6>
                              <p class="text-muted">Evet</p>
                            </div>
                            <div class="col-6 mb-3">
                              <h6>Kaç rotan var?</h6>
                              <p class="text-muted">4 rota oluşturdun</p>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
            <!-- Düzenleme Formu -->
            <div id="editForm" style="display: none;">
            <label for="editAvatar">Avatar yükleyin:</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" onchange="previewAvatar()">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>

              <label for="editIsim">İsim:</label>
              <input type="text" id="editIsim" name="Isim"><br>
            
              <label for="editEmail">Email:</label>
              <input type="text" id="editEmail" name="Email"><br>
            
              <label for="editTelefon">Telefon:</label>
              <input type="text" id="editTelefon" name="Telefon"><br>
            
              <div id="buttonContainer">
                <button onclick="saveChanges()">Değişiklikleri Kaydet</button>
              </div>
            </div>
            


        </div>

        <div class="p_content" id="Soru ve taleplerim" style="display: none;">
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">E-posta</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="gezgin@example.com">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Soru ve talepleriniz</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Talebim">
            </div>
            <button type="submit" class="soru-button">Gönder</button>
          </form>

        </div>
        <div class="p_content" id="Rotalarım" style="display: none;">

          <!--BURASI DOLDURULUCAK-->
          <h1>Rotalarım içeriği</h1>
          <!--rota hakkında bilgiler zaman falan tutulur yapanın yaratıcılığına kalmış-->

        </div>
        <div class="p_content" id="Kaydettiklerim" style="display: none;">

          <div class="row">
            <div class="col-md-6">
              <a href="mekanlink" class="card-link text-decoration-none">
                <div class="card mb-3" style="max-width: 18rem; height: 250px;">
                  <img class="card-img-top half-width-image" src="images\boyabat kalesi.jpg" alt="Card image cap">
                  <div class="card-body text-center">
                    <h5 class="card-title" style="color: #fa8000;">Boyabat Kalesi</h5>
                    <p class="card-text" style="color: #fa8000;">Boyabat/Sinop</p>
                  </div>
                </div>
              </a>
            </div>
            
        
            <div class="col-md-6">
              <a href="mekanlink" class="card-link text-decoration-none">
                <div class="card mb-3" style="max-width: 18rem; height: 250px;">
                  <img class="card-img-top half-width-image" src="images\route_icon.png" alt="Card image cap">
                  <div class="card-body text-center">
                    <h5 class="card-title" style="color: #fa8000;">Boyabat Kalesi</h5>
                    <p class="card-text" style="color: #fa8000;">Boyabat/Sinop</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <a href="mekanlink" class="card-link text-decoration-none">
                <div class="card mb-3" style="max-width: 18rem; height: 250px;">
                  <img class="card-img-top half-width-image" src="images\sarnic.jpg" alt="Card image cap">
                  <div class="card-body text-center">
                    <h5 class="card-title" style="color: #fa8000;">Boyabat Kalesi</h5>
                    <p class="card-text" style="color: #fa8000;">Boyabat/Sinop</p>
                  </div>
                </div>
              </a>
            </div>
        
            <div class="col-md-6">
              <a href="mekanlink" class="card-link text-decoration-none">
                <div class="card mb-3" style="max-width: 18rem; height: 250px;">
                  <img class="card-img-top half-width-image" src="images\route_icon.png" alt="Card image cap">
                  <div class="card-body text-center">
                    <h5 class="card-title" style="color: #fa8000;">Boyabat Kalesi</h5>
                    <p class="card-text" style="color: #fa8000;">Boyabat/Sinop</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <a href="mekanlink" class="card-link text-decoration-none">
                  <div class="card mb-3" style="max-width: 18rem; height: 250px;">
                    <img class="card-img-top half-width-image" src="images\sarnic.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                      <h5 class="card-title" style="color: #fa8000;">Boyabat Kalesi</h5>
                      <p class="card-text" style="color: #fa8000;">Boyabat/Sinop</p>
                    </div>
                  </div>
                </a>
              </div>
          
              <div class="col-md-6">
                <a href="mekanlink" class="card-link text-decoration-none">
                  <div class="card mb-3" style="max-width: 18rem; height: 250px;">
                    <img class="card-img-top half-width-image" src="images\route_icon.png" alt="Card image cap">
                    <div class="card-body text-center">
                      <h5 class="card-title" style="color: #fa8000;">Boyabat Kalesi</h5>
                      <p class="card-text" style="color: #fa8000;">Boyabat/Sinop</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
              
              
          
              
            
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




  <?php require_once('footer.php') ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js/scr_profilim.js"></script>

  

</body>

</html>