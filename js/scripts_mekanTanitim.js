function changeText1() {
  var button = document.getElementById("myButton1");

  if (button.innerHTML === "KAYDET") {
    button.innerHTML = "KAYDEDİLDİ";
  } else {
    button.innerHTML = "KAYDET";
  }
}

function changeText2() {
    var button = document.getElementById("myButton2");

    if (button.innerHTML === "EKLE") {
        button.innerHTML = "ROTADA";
    } else {
        button.innerHTML = "EKLE";
    }
}

