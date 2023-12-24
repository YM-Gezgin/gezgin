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

