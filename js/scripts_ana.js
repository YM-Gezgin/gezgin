var container = document.getElementById('card-container-1');
var slider = document.getElementById('slider-1');
var slider_container = document.getElementById('slider-container-1');
var buttons = container.getElementsByClassName('btn');
var slide = slider_container.getElementsByClassName('slide');
var slides = slide.length;

var currentPosition = 0;
var currentMargin = 0;
var slidesPerPage = 0;
var slidesCount = slides - slidesPerPage;
var containerWidth = container.offsetWidth;
var prevKeyActivate = false;
var nextKeyActivate = true;

window.addEventListener("resize", checkWidth);

function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
}

function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else {
        if (w < 901) {
            slidesPerPage = 2;
        } else {
            if (w < 1101) {
                slidesPerPage = 3;
            } else {
                slidesPerPage = 4;
            }
        }
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    };
    currentMargin = - currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin * '%';
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
    if (currentPosition >= slidesCount) {
        buttons[1].classList.remove('inactive');
    }
}

setParams();

function slideRight1() {
    if (currentPosition != 0) {
        slider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
        currentMargin += (100 / slidesPerPage);
        currentPosition--;
    };
    if (currentPosition === 0) {
        buttons[0].classList.add('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.add('inactive');
    }
};

function slideLeft1() {
    if (currentPosition != slidesCount) {
        slider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
        currentMargin -= (100 / slidesPerPage);
        currentPosition++;
    }
    if (currentPosition == slidesCount) {
        buttons[1].classList.add('inactive');
    }
    if (currentPosition > 0) {
        buttons[0].classList.add('inactive');
    }
};


var container2 = document.getElementById('card-container-2');
var slider2 = document.getElementById('slider-2');
var slider_container2 = document.getElementById('slider-container-2');
var buttons2 = container2.getElementsByClassName('btn');
var slide2 = slider_container2.getElementsByClassName('slide');
var slides2 = slide2.length;

var currentPosition2 = 0;
var currentMargin2 = 0;
var slidesPerPage2 = 0;
var slidesCount2 = slides2 - slidesPerPage2;
var containerWidth2 = container2.offsetWidth;
var prevKeyActivate2 = false;
var nextKeyActivate2 = true;

window.addEventListener("resize", checkWidth2);

function checkWidth2() {
    containerWidth2 = container2.offsetWidth;
    setParams2(containerWidth2);
}

function setParams2(w) {
    if (w < 551) {
        slidesPerPage2 = 1;
    } else {
        if (w < 901) {
            slidesPerPage2 = 2;
        } else {
            if (w < 1101) {
                slidesPerPage2 = 3;
            } else {
                slidesPerPage2 = 4;
            }
        }
    }
    slidesCount2 = slides2 - slidesPerPage2;
    if (currentPosition2 > slidesCount2) {
        currentPosition2 -= slidesPerPage2;
    };
    currentMargin2 = -currentPosition2 * (100 / slidesPerPage2);
    slider2.style.marginLeft = currentMargin2 + '%';
    if (currentPosition2 > 0) {
        buttons2[0].classList.remove('inactive');
    }
    if (currentPosition2 < slidesCount2) {
        buttons2[1].classList.remove('inactive');
    }
    if (currentPosition2 >= slidesCount2) {
        buttons2[1].classList.remove('inactive');
    }
}

setParams2();

function slideRight2() {
    if (currentPosition2 != 0) {
        slider2.style.marginLeft = currentMargin2 + (100 / slidesPerPage2) + '%';
        currentMargin2 += (100 / slidesPerPage2);
        currentPosition2--;
    };
    if (currentPosition2 === 0) {
        buttons2[0].classList.add('inactive');
    }
    if (currentPosition2 < slidesCount2) {
        buttons2[1].classList.add('inactive');
    }
};

function slideLeft2() {
    if (currentPosition2 != slidesCount2) {
        slider2.style.marginLeft = currentMargin2 - (100 / slidesPerPage2) + '%';
        currentMargin2 -= (100 / slidesPerPage2);
        currentPosition2++;
    }
    if (currentPosition2 == slidesCount2) {
        buttons2[1].classList.add('inactive');
    }
    if (currentPosition2 > 0) {
        buttons2[0].classList.add('inactive');
    }
};

var container3 = document.getElementById('card-container-3');
var slider3 = document.getElementById('slider-3');
var slider_container3 = document.getElementById('slider-container-3');
var buttons3 = container3.getElementsByClassName('btn');
var slide3 = slider_container3.getElementsByClassName('slide');
var slides3 = slide3.length;



var currentPosition3 = 0;
var currentMargin3 = 0;
var slidesPerPage3 = 0;
var slidesCount3 = slides3 - slidesPerPage3;
var containerWidth3 = container3.offsetWidth;
var prevKeyActivate3 = false;
var nextKeyActivate3 = true;

window.addEventListener("resize", checkWidth3);

function checkWidth3() {
    containerWidth3 = container3.offsetWidth;
    setParams3(containerWidth3);
}

function setParams3(w) {
    if (w < 551) {
        slidesPerPage3 = 1;
    } else {
        if (w < 901) {
            slidesPerPage3 = 2;
        } else {
            if (w < 1101) {
                slidesPerPage3 = 3;
            } else {
                slidesPerPage3 = 4;
            }
        }
    }
    slidesCount3 = slides3 - slidesPerPage3;
    if (currentPosition3 > slidesCount3) {
        currentPosition3 -= slidesPerPage3;
    };
    currentMargin3 = -currentPosition3 * (100 / slidesPerPage3);
    slider3.style.marginLeft = currentMargin3 + '%';
    if (currentPosition3 > 0) {
        buttons3[0].classList.remove('inactive');
    }
    if (currentPosition3 < slidesCount3) {
        buttons3[1].classList.remove('inactive');
    }
    if (currentPosition3 >= slidesCount3) {
        buttons3[1].classList.remove('inactive');
    }
}

setParams3();

function slideRight3() {
    if (currentPosition3 != 0) {
        slider3.style.marginLeft = currentMargin3 + (100 / slidesPerPage3) + '%';
        currentMargin3 += (100 / slidesPerPage3);
        currentPosition3--;
    };
    if (currentPosition3 === 0) {
        buttons3[0].classList.add('inactive');
    }
    if (currentPosition3 < slidesCount3) {
        buttons3[1].classList.add('inactive');
    }
};

function slideLeft3() {
    if (currentPosition3 != slidesCount3) {
        slider3.style.marginLeft = currentMargin3 - (100 / slidesPerPage3) + '%';
        currentMargin3 -= (100 / slidesPerPage3);
        currentPosition3++;
    }
    if (currentPosition3 == slidesCount3) {
        buttons3[1].classList.add('inactive');
    }
    if (currentPosition3 > 0) {
        buttons3[0].classList.add('inactive');
    }
};

var container4 = document.getElementById('card-container-4');
var slider4 = document.getElementById('slider-4');
var slider_container4 = document.getElementById('slider-container-4');
var buttons4 = container4.getElementsByClassName('btn');
var slide4 = slider_container4.getElementsByClassName('slide');
var slides4 = slide4.length;

var currentPosition4 = 0;
var currentMargin4 = 0;
var slidesPerPage4 = 0;
var slidesCount4 = slides4 - slidesPerPage4;
var containerWidth4 = container4.offsetWidth;
var prevKeyActivate4 = false;
var nextKeyActivate4 = true;

window.addEventListener("resize", checkWidth4);

function checkWidth4() {
    containerWidth4 = container4.offsetWidth;
    setParams4(containerWidth4);
}

function setParams4(w) {
    if (w < 551) {
        slidesPerPage4 = 1;
    } else {
        if (w < 901) {
            slidesPerPage4 = 2;
        } else {
            if (w < 1101) {
                slidesPerPage4 = 3;
            } else {
                slidesPerPage4 = 4;
            }
        }
    }
    slidesCount4 = slides4 - slidesPerPage4;
    if (currentPosition4 > slidesCount4) {
        currentPosition4 -= slidesPerPage4;
    };
    currentMargin4 = -currentPosition4 * (100 / slidesPerPage4);
    slider4.style.marginLeft = currentMargin4 + '%';
    if (currentPosition4 > 0) {
        buttons4[0].classList.remove('inactive');
    }
    if (currentPosition4 < slidesCount4) {
        buttons4[1].classList.remove('inactive');
    }
    if (currentPosition4 >= slidesCount4) {
        buttons4[1].classList.remove('inactive');
    }
}

setParams4();

function slideRight4() {
    if (currentPosition4 != 0) {
        slider4.style.marginLeft = currentMargin4 + (100 / slidesPerPage4) + '%';
        currentMargin4 += (100 / slidesPerPage4);
        currentPosition4--;
    };
    if (currentPosition4 === 0) {
        buttons4[0].classList.add('inactive');
    }
    if (currentPosition4 < slidesCount4) {
        buttons4[1].classList.add('inactive');
    }
};

function slideLeft4() {
    if (currentPosition4 != slidesCount4) {
        slider4.style.marginLeft = currentMargin4 - (100 / slidesPerPage4) + '%';
        currentMargin4 -= (100 / slidesPerPage4);
        currentPosition4++;
    }
    if (currentPosition4 == slidesCount4) {
        buttons4[1].classList.add('inactive');
    }
    if (currentPosition4 > 0) {
        buttons4[0].classList.add('inactive');
    }
};

document.addEventListener('DOMContentLoaded', function () {
    var selectElement = document.getElementById("inlineFormCustomSelect");
    selectElement.addEventListener("change", function () {
        var secilenSehir = this.value;
        var centeredContainer = document.querySelector('.centered-container');
        // var h2Element = centeredContainer.querySelector('h2');
        // h2Element.innerText = secilenSehir + ' için en çok tercih edilen mekanlar'
        centeredContainer.style.display='none';

        var cardContainers = document.getElementsByClassName('card-container');
        if (cardContainers.length > 0) {
            var firstCardContainer = cardContainers[0];
            var secondCardContainer = cardContainers[1];
            var thirdCardContainer = cardContainers[2];
            var fourthCardContainer = cardContainers[3];

            firstCardContainer.style.display = 'none';
            secondCardContainer.style.display = 'none';
            thirdCardContainer.style.display = 'none';
            fourthCardContainer.style.display = 'none';

        } else {
            console.error('card-container bulunamadı.');
        }
        var xhr = new XMLHttpRequest();
        var url = "mekanTanitim.php?secilenSehir=" + encodeURIComponent(secilenSehir);


        xhr.open("GET", url, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // mekanTanitim id'sine sahip HTML öğesinin içeriğini mekanTanitim.php'nin içeriği ile güncelle
                document.getElementById('mekanTanitim').innerHTML = xhr.responseText;
            }
        };
        xhr.send();

    });
    
});

function changeText(count) {
    var button = document.getElementById("myButton"+count);
  
    if (button.innerHTML === "KAYDET") {
      button.innerHTML = "KAYDEDİLDİ";
    } else {
      button.innerHTML = "KAYDET";
    }
  }
  
  function changeText2(count) {
      var button = document.getElementById("myButton2"+count);
  
      if (button.innerHTML === "EKLE") {
          button.innerHTML = "ROTADA";
      } else {
          button.innerHTML = "EKLE";
      }
  }
  
    function rotaOlustur(){
        var count=1;
        var rotalar=[];
        var mekan_sayisi=document.getElementById('mekan_sayac').innerText;
            while(count<=mekan_sayisi){
            var rotaButonlari = document.getElementById('myButton2'+count);
            if(rotaButonlari.innerText=='ROTADA'){
                var rota_mekan_id = document.getElementById('mekan'+count);
                
                rotalar.push(rota_mekan_id.innerText);
            }
            count++;
        }
        
    
    
    $.ajax({
      type: "POST",
      url: "rotaOlustur.php", 
      data: { rotalar: rotalar },
      success: function (response) {
        if(response==='success'){
            window.location.href = "rotasyon.php";
        }
      },
      error: function (xhr, status, error) {
      console.error("AJAX Hatası:", status, error);
      console.log(xhr.responseText); 
    }
    });}

    