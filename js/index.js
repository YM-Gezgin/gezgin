function initMap() {
    const myLatLng = { lat: 41.002697, lng: 39.716763 };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: myLatLng,
    });
  
    new google.maps.Marker({
      position: myLatLng,
      map,
      title: "Hello World!",
    });
  }
  
  window.initMap = initMap;