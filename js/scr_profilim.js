function setActiveLink(element) {

  var links = document.querySelectorAll('.fa-ul a');
  links.forEach(function(link) {
    link.classList.remove('active');
  });
  element.classList.add('active');
  
  var faLiCoText = document.querySelector('.active .fa-li-co').innerText;    
  document.getElementById('p_title').innerText=faLiCoText;

  var links = document.querySelectorAll('.p_content');
  links.forEach(function(link) {
    link.style.display='none';
  });
  
  document.getElementById(faLiCoText).style.display='inline';

  var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  var div = document.getElementById('p_title');
  div.classList.remove('mt-4');
  if(screenWidth <= 760){
    div.classList.add('mt-4');
    document.getElementById('p_div').scrollIntoView({ behavior: 'smooth' });
    
  }
  else{
    window.scrollTo({
      top: 30,
      behavior: 'smooth' 
  });
  }
  
  
}

function showDescription(type) {

  var aylikForm = document.getElementById('aylik-form');
  var yillikForm = document.getElementById('yillik-form')

  if (type === 'aylik') {
      aylikForm.style.display = 'block';
      yillikForm.style.display = 'none';
  } else if (type === 'yillik') {
      
      yillikForm.style.display = 'block';
      aylikForm.style.display = 'none';
      
  }
  
  document.getElementById('form-container').scrollIntoView({ behavior: 'smooth' });
}


function confirmExit() {
// AJAX ile sunucuya istek gönderme
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
  if (xhr.readyState == 4 && xhr.status == 200) {
    // Sunucudan gelen cevap işleniyor
    var response = JSON.parse(xhr.responseText);
    if (response.status === "success") {
      window.location.href = 'login.php'; // Yönlendirme
    } else {
      alert("Yönlendirme hatası!");
    }
  }
};
xhr.open("GET", "logout.php", true);
xhr.send();
}

function closeModal() {
/*window.location.href = "profilim.html";*/
document.getElementById("myModal").style.display = "none";

}



function duzenle() {
// Bilgileri düzenleme formunu göster
document.getElementById("editForm").style.display = "block";

// Mevcut bilgileri form elemanlarına aktar
document.getElementById("editIsim").value = document.getElementById("kullaniciAdi").innerText;
document.getElementById("editEmail").value = document.getElementById("kullaniciEmail").innerText;
document.getElementById("editTelefon").value = document.getElementById("kullaniciTelefon").innerText;

// Form görünür olduktan sonra form elemanına kaydır
editForm.scrollIntoView({ behavior: "smooth", block: "start" });

}

function saveChanges() {
// Formdan alınan yeni bilgileri güncelle
document.getElementById("kullaniciAdi").innerText = document.getElementById("editIsim").value;
document.getElementById("kullaniciEmail").innerText = document.getElementById("editEmail").value;
document.getElementById("kullaniciTelefon").innerText = document.getElementById("editTelefon").value;

//avatar değiştir
var avatarImage = document.getElementById('avatarImage');
var customFile = document.getElementById('customFile');

if (customFile.files.length > 0) {
  avatarImage.src = URL.createObjectURL(customFile.files[0]);
}

// Formu gizle
document.getElementById("editForm").style.display = "none";
}

function previewAvatar() {
  var fileInput = document.getElementById('customFile');
  var file = fileInput.files[0];

  if (file) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var avatarImage = document.getElementById('avatarImage');
      avatarImage.src = e.target.result;
    };

    reader.readAsDataURL(file);
  }
}
