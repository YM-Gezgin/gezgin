<?php require_once('baglan.php');
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotasyon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styles_ana.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="css/rotasyon.css" />
</head>

<body>

    <?php require_once("navbar.php"); ?>

    <div class="rotasyonGiris">
        <br><br>
        <h4><i style="color: #fa8000;" class="fas fa-map"></i> SEYAHAT ROTAN HAZIR!</h4>
    </div>

    <br>
    <div class="rotasyonGirisAlt">
        <p class="mobilUyarisi">(Mobil cihazlarda haritayı tam ekran yapınız)</p>
    </div>
    <div id="map"></div>
    <?php
    $rotalar = $_SESSION['rotalar'];
    $locations = [];

    foreach ($rotalar as $mekanAdi) {
        $sql_koordinat = "SELECT enlem, boylam,mekan_adi FROM mekanlar WHERE mekan_adi = '$mekanAdi'";
        $result_koordinat = $baglanti->query($sql_koordinat);

        if ($result_koordinat) {
            $koordinatlar = $result_koordinat->fetch_assoc();

            if ($koordinatlar) {
                $locations[] = [
                    'lat' => $koordinatlar['enlem'],
                    'lng' => $koordinatlar['boylam'],
                    'mekan_adi' => $koordinatlar['mekan_adi'],
                ];
            }
        }
    }
    $sonEleman = end($locations);

    ?>
    



    <div class="rotasyonGirisAlt">
        <p><i style="color: #fa8000;" class="fas fa-map-marker-alt"></i> Rota ekranından rotanı detaylı inceleyebilirsin.</p>
        <p id="rotasyonGirisAltDetay"><i style="color: #fa8000;" class="fa fa-info-circle"></i> Ayrıca seyahatinde yararlanabileceğin anlaşmalı
            konaklama, restoran&kafe ve araç kiralama noktalarını da haritana ekledik.
            Rotanı düzenleyebilir ya da haritanı tamamlayıp valizini şimdiden hazırlayabilirsin!</p>
    </div>



    <div class="secilenMekanlar">
        <h2><i class='fas fa-university'></i> Gezilecek Yerler</h2><br>
        <ul class="list-group list-group-horizontal-xl">
            <?php
                       
            for ($count = 1;$count<9;$count++) {
                
            ?>
                <li class="list-group-item" id="mekan_number<?php echo $count; ?>">
                    
                </li>

            <?php
                if ($count % 4 == 0) {
                    echo '</ul><ul class="list-group list-group-horizontal-xl">';
                }
            }
            ?>
        </ul>

        <br><br>

        <h2><i class="fas fa-utensils"></i> Restoran & Kafe</h2><br>
        <ul class="list-group list-group-horizontal-xl">
            <li class="list-group-item"><i class="numberCircle2">1</i>
                <p class="seciliMekanAdi">Burak Aspava</p>
            </li>
            <li class="list-group-item"><i class="numberCircle2">2</i>
                <p class="seciliMekanAdi">Coffy</p>
            </li>

        </ul>

        <br><br>

        <h2><i class="fas fa-hotel"></i> Konaklama</h2><br>
        <ul class="list-group list-group-horizontal-xl">
            <li class="list-group-item"><i class="numberCircle3">1</i>
                <p class="seciliMekanAdi" id="otel1">Engin Pansiyon</p>
            </li>
            <li class="list-group-item"><i class="numberCircle3">2</i>
                <p class="seciliMekanAdi">Ramada Otel</p>
            </li>
        </ul>
        <br><br>
    </div>

    <div class="altBilgi">
        <p style="font-size: 16px;">Bu rota kişisel tercihleriniz dikkate alınarak size özel oluşturulmuştur. Verilen sıralamayı dikkate alarak seyehatinizi
            gerçekleştirmeniz durumunda yakıt tüketiminizden %10 oranda tasarruf edebilirsiniz.
        </p>
        <p>İyi eğlenceler! Görüş ve önerilerinizi bizimle ve diğer gezginlerle paylaşmanızdan mutluluk duyarız.</p>
    </div>

    <div>
        <a href="#" class="clickable-text"><i class="fas fa-download"></i> Buradan rotanı indirebilirsin! <i class="fas fa-download"></i></a>
    </div>


    <?php require_once("footer.php"); ?>

    <script>
        function dijkstra(locations) {
            const graph = {};
            const unvisited = new Set();
            const distance = {};
            const previous = {};

            locations.forEach((location, index) => {
                graph[index] = {};
                unvisited.add(index);

                locations.forEach((otherLocation, otherIndex) => {
                    if (index !== otherIndex) {
                        const dist = google.maps.geometry.spherical.computeDistanceBetween(
                            new google.maps.LatLng(location.lat, location.lng),
                            new google.maps.LatLng(otherLocation.lat, otherLocation.lng)
                        );

                        graph[index][otherIndex] = dist;
                    }
                });
            });

            distance[0] = 0;

            locations.forEach((location, index) => {
                if (index !== 0) {
                    distance[index] = Infinity;
                }

                previous[index] = null;
            });

            while (unvisited.size > 0) {
                const current = Array.from(unvisited).reduce((minIndex, index) =>
                    distance[index] < distance[minIndex] ? index : minIndex
                );

                unvisited.delete(current);

                Object.keys(graph[current]).forEach(neighbor => {
                    const alt = distance[current] + graph[current][neighbor];

                    if (alt < distance[neighbor]) {
                        distance[neighbor] = alt;
                        previous[neighbor] = current;
                    }
                });
            }

            const sortedShortestPath = locations.map((_, i) => locations[i])
                .sort((a, b) => distance[locations.indexOf(a)] - distance[locations.indexOf(b)]);



            return sortedShortestPath;
        }
        const additionalPoints = [
    { lat: 39.905, lng: 32.8301, mekan_adi: 'Nokta 1' },
    { lat: 39.980, lng: 32.6522, mekan_adi: 'Nokta 2' },
];
const additionalPoints2 = [
    { lat: 39.945, lng: 32.7901},
    { lat: 39.950, lng: 32.6522},
];

function addAdditionalPointsToMap(map) {
    additionalPoints.forEach((point, index) => {
        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat(point.lat),
                lng: parseFloat(point.lng),
            },
            map: map,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                fillColor: 'green', // Marker rengi
                fillOpacity: 0.8,
                strokeWeight: 0,
                scale: 15,
            },
            label: {
                text: (index + 1).toString(),
                color: 'black',
                fontSize: '12px',
                fontWeight: 'bold',
            },
        });

        const infowindow = new google.maps.InfoWindow({
            content: `<div>${point.mekan_adi}</div>`, // İnfo penceresi içeriği
        });

        marker.addListener('click', () => {
            infowindow.open(map, marker);
        });
    });
}
function addAdditionalPoints2ToMap(map) {
    additionalPoints2.forEach((point, index) => {
        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat(point.lat),
                lng: parseFloat(point.lng),
            },
            map: map,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                fillColor: 'blue',
                fillOpacity: 0.8,
                strokeWeight: 0,
                scale: 15,
            },
            label: {
                text: (index + 1).toString(),
                color: 'black',
                fontSize: '12px',
                fontWeight: 'bold',
            },
        });
    });
}

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: {
                    lat: <?php echo ($locations[0]['lat'] + $sonEleman['lat']) / 2; ?>,
                    lng: <?php echo ($locations[0]['lng'] + $sonEleman['lng']) / 2; ?>
                },
            });

            const locations = <?php echo json_encode($locations); ?>;
            const shortestPath = dijkstra(locations);
            $.ajax({
                type: 'POST',
                url: 'dizili_rota.php',
                data: {
                    sortedShortestPath: JSON.stringify(shortestPath)
                },
                success: function(data) {
                    var counter=0;
                    
                    while(counter<shortestPath.length){
                        document.getElementById(`mekan_number${counter+1}`).innerHTML = `<i class="numberCircle">${counter+1}</i>
                        <p class="seciliMekanAdi">${shortestPath[counter]['mekan_adi']}</p>`;
                        counter++;
                    }
                    },
                    
                error: function(error) {
                    console.error('Error:', error);
                }
            });
            addAdditionalPointsToMap(map);
            addAdditionalPoints2ToMap(map);
            const coordinates = shortestPath.map(location => ({
                lat: parseFloat(location.lat),
                lng: parseFloat(location.lng),
            }));

            const polyline = new google.maps.Polyline({
                path: coordinates,
                geodesic: true,
                strokeColor: '#fa8000',
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            polyline.setMap(map);

            let openInfowindow = null;

            shortestPath.forEach((location, index) => {
                var contentString = "";
                var origin = new google.maps.LatLng(location.lat, location.lng);

                if (index + 1 < shortestPath.length) {
                    var destination = new google.maps.LatLng(shortestPath[index + 1].lat, shortestPath[index + 1].lng);
                } else {
                    var destination = new google.maps.LatLng(shortestPath[index].lat, shortestPath[index].lng);
                }

                var service = new google.maps.DistanceMatrixService();
                service.getDistanceMatrix({
                    origins: [origin],
                    destinations: [destination],
                    travelMode: 'DRIVING',
                }, callback);

                function callback(response, status) {
                    if (status == 'OK') {
                        var origins = response.originAddresses;
                        var destinations = response.destinationAddresses;

                        for (var i = 0; i < origins.length; i++) {
                            var results = response.rows[i].elements;

                            for (var j = 0; j < results.length; j++) {
                                var element = results[j];

                                if (element.status === 'OK') {
                                    var distanceText = element.distance.text;
                                    var durationText = element.duration.text;
                                    if (distanceText !== '1 m') {
                                        var contentString = `
                                    <div>${index + 1}. ile ${index + 2}. Arasındaki </div>
                                    <div>Mesafe: ${distanceText}</div>
                                    <div>Süre: ${durationText}</div>
                                `;
                                    } else {
                                        var contentString = 'Seçtiğiniz son nokta';
                                    }

                                    const infowindow = new google.maps.InfoWindow({
                                        content: contentString,
                                    });

                                    const marker = new google.maps.Marker({
                                        position: {
                                            lat: parseFloat(location.lat),
                                            lng: parseFloat(location.lng),
                                        },
                                        map: map,
                                        icon: {
                                            path: google.maps.SymbolPath.CIRCLE,
                                            fillColor: '#fa8000',
                                            fillOpacity: 0.8,
                                            strokeWeight: 0,
                                            scale: 15,
                                        },
                                        label: {
                                            text: (index + 1).toString(),
                                            color: 'black',
                                            fontSize: '12px',
                                            fontWeight: 'bold',
                                        },
                                    });

                                    if (index === 0) {
                                        infowindow.open(map, marker);
                                        openInfowindow = infowindow;
                                    }

                                    marker.addListener('click', () => {
                                        if (openInfowindow && openInfowindow !== infowindow) {
                                            openInfowindow.close();
                                        } else {
                                            infowindow.open(map, marker);
                                        }

                                        openInfowindow = infowindow;
                                    });
                                } else {
                                    console.log('Error: ' + element.status);
                                }
                            }
                        }
                    } else {
                        console.log('Error: ' + status);
                    }
                }
            });
        }

        window.initMap = initMap;
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?geometry&key=AIzaSyBoO4UbHcZCiWIlOLCFe-_cM9qkjlEXFs8&libraries=geometry&callback=initMap&v=weekly" defer></script>

</body>

</html>