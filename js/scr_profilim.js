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
    console.log(screenWidth);
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
  /*window.location.replace = "http://localhost:3000/girisKayit.html";   sadece yayınlanmış sayfalara yönlendiriyormuş*/
  window.open("girisKayit.html", "_blank");
}

function closeModal() {
  /*window.location.href = "profilim.html";*/
  document.getElementById("myModal").style.display = "none";

}




