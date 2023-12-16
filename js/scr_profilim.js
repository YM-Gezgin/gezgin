function setActiveLink(element) {
    // Tıklandığında diğer linklerden 'active' sınıfını kaldır
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

  }

  function showDescription(type) {
    var aylikForm = document.getElementById('aylik-form');
    var yillikForm = document.getElementById('yillik-form')

    // Farklı açıklamaları göster
    if (type === 'aylik') {
        aylikForm.style.display = 'block';
        yillikForm.style.display = 'none';
    } else if (type === 'yillik') {
        
        yillikForm.style.display = 'block';
        aylikForm.style.display = 'none';
        
    }
    // Açıklama satırına kaydır
    document.getElementById('form-container').scrollIntoView({ behavior: 'smooth' });
}