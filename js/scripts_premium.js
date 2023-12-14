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
