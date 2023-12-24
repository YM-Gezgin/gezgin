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




