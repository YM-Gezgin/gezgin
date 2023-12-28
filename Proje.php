<script>
    var uzaklik;
    class Node {
        constructor(val, priority) {
            this.val = val;
            this.priority = priority;
        }
    }

    class PriorityQueue {
        constructor() {
            this.values = [];
        }
        enqueue(val, priority) {
            let newNode = new Node(val, priority);
            this.values.push(newNode);
            this.bubbleUp();
        }
        bubbleUp() {
            let idx = this.values.length - 1;
            const element = this.values[idx];
            while (idx > 0) {
                let parentIdx = Math.floor((idx - 1) / 2);
                let parent = this.values[parentIdx];
                if (element.priority >= parent.priority) break;
                this.values[parentIdx] = element;
                this.values[idx] = parent;
                idx = parentIdx;
            }
        }
        dequeue() {
            const min = this.values[0];
            const end = this.values.pop();
            if (this.values.length > 0) {
                this.values[0] = end;
                this.sinkDown();
            }
            return min;
        }
        sinkDown() {
            let idx = 0;
            const length = this.values.length;
            const element = this.values[0];
            while (true) {
                let leftChildIdx = 2 * idx + 1;
                let rightChildIdx = 2 * idx + 2;
                let leftChild, rightChild;
                let swap = null;

                if (leftChildIdx < length) {
                    leftChild = this.values[leftChildIdx];
                    if (leftChild.priority < element.priority) {
                        swap = leftChildIdx;
                    }
                }
                if (rightChildIdx < length) {
                    rightChild = this.values[rightChildIdx];
                    if (
                        (swap === null && rightChild.priority < element.priority) ||
                        (swap !== null && rightChild.priority < leftChild.priority)
                    ) {
                        swap = rightChildIdx;
                    }
                }
                if (swap === null) break;
                this.values[idx] = this.values[swap];
                this.values[swap] = element;
                idx = swap;
            }
        }
    }

    //Dijkstra's algorithm only works on a weighted graph.

    class WeightedGraph {
        constructor() {
            this.adjacencyList = {};
        }
        addVertex(vertex) {
            if (!this.adjacencyList[vertex]) this.adjacencyList[vertex] = [];
        }
        addEdge(vertex1, vertex2, weight) {
            this.adjacencyList[vertex1].push({
                node: vertex2,
                weight
            });
            this.adjacencyList[vertex2].push({
                node: vertex1,
                weight
            });
        }
        Dijkstra(start, finish) {
            const nodes = new PriorityQueue();
            const distances = {};
            const previous = {};
            var path = []; //to return at end
            let smallest;
            //build up initial state
            for (let vertex in this.adjacencyList) {
                if (vertex === start) {
                    distances[vertex] = 0;
                    nodes.enqueue(vertex, 0);
                } else {
                    distances[vertex] = Infinity;
                    nodes.enqueue(vertex, Infinity);
                }
                previous[vertex] = null;
            }
            // as long as there is something to visit
            while (nodes.values.length) {
                smallest = nodes.dequeue().val;
                if (smallest === finish) {
                    //WE ARE DONE
                    //BUILD UP PATH TO RETURN AT END
                    while (previous[smallest]) {
                        path.push(smallest);
                        smallest = previous[smallest];
                    }
                    break;
                }
                if (smallest || distances[smallest] !== Infinity) {
                    for (let neighbor in this.adjacencyList[smallest]) {
                        //find neighboring node
                        let nextNode = this.adjacencyList[smallest][neighbor];
                        //calculate new distance to neighboring node
                        var candidate = distances[smallest] + nextNode.weight;
                        let nextNeighbor = nextNode.node;
                        if (candidate < distances[nextNeighbor]) {
                            //updating new smallest distance to neighbor
                            distances[nextNeighbor] = candidate;
                            //updating previous - How we got to neighbor
                            previous[nextNeighbor] = smallest;
                            //enqueue in priority queue with new priority
                            nodes.enqueue(nextNeighbor, candidate);
                        }
                    }
                }
            }
            uzaklik=`${candidate}'KM dir`;
            console.log(`${start} - ${finish} arasındaki mesafe ${candidate}'km dir.`)
            return path.concat(smallest).reverse();
            //return candidate;
        }
    }

    //EXAMPLES=====================================================================

    var graph = new WeightedGraph();
    // graph.addVertex("A");
    // graph.addVertex("B");
    // graph.addVertex("C");
    // graph.addVertex("D");
    // graph.addVertex("E");
    // graph.addVertex("F");

    // graph.addEdge("A", "C", 20);
    // graph.addEdge("B", "E", 3);
    // graph.addEdge("C", "D", 2);
    // graph.addEdge("C", "F", 4);
    // graph.addEdge("D", "E", 3);
    // graph.addEdge("D", "F", 1);
    // graph.addEdge("E", "F", 1);

    // console.log(graph.Dijkstra("A", "E"));
</script>


<?php

use function PHPSTORM_META\map;

$iller = [
    [],
    [
        "id" => "01",
        "name" => "Adana",
        "latitude" => "37.0000",
        "longitude" => "35.3213",
        "population" => 2183167,
        "region" => "Akdeniz"
    ],
    [
        "id" => "02",
        "name" => "Adıyaman",
        "latitude" => "37.7648",
        "longitude" => "38.2786",
        "population" => 602774,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "03",
        "name" => "Afyonkarahisar",
        "latitude" => "38.7507",
        "longitude" => "30.5567",
        "population" => 709015,
        "region" => "Ege"
    ],
    [
        "id" => "04",
        "name" => "Ağrı",
        "latitude" => "39.7191",
        "longitude" => "43.0503",
        "population" => 547210,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "05",
        "name" => "Amasya",
        "latitude" => "40.6499",
        "longitude" => "35.8353",
        "population" => 322167,
        "region" => "Karadeniz"
    ],
    [
        "id" => "06",
        "name" => "Ankara",
        "latitude" => "39.9208",
        "longitude" => "32.8541",
        "population" => 5270575,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "07",
        "name" => "Antalya",
        "latitude" => "36.8841",
        "longitude" => "30.7056",
        "population" => 2288456,
        "region" => "Akdeniz"
    ],
    [
        "id" => "08",
        "name" => "Artvin",
        "latitude" => "41.1828",
        "longitude" => "41.8183",
        "population" => 168370,
        "region" => "Karadeniz"
    ],
    [
        "id" => "09",
        "name" => "Aydın",
        "latitude" => "37.8560",
        "longitude" => "27.8416",
        "population" => 1053506,
        "region" => "Ege"
    ],
    [
        "id" => "10",
        "name" => "Balıkesir",
        "latitude" => "39.6484",
        "longitude" => "27.8826",
        "population" => 1186688,
        "region" => "Ege"
    ],
    [
        "id" => "11",
        "name" => "Bilecik",
        "latitude" => "40.0567",
        "longitude" => "30.0665",
        "population" => 212361,
        "region" => "Marmara"
    ],
    [
        "id" => "12",
        "name" => "Bingöl",
        "latitude" => "39.0626",
        "longitude" => "40.7696",
        "population" => 267184,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "13",
        "name" => "Bitlis",
        "latitude" => "38.3938",
        "longitude" => "42.1232",
        "population" => 267184,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "14",
        "name" => "Bolu",
        "latitude" => "40.5760",
        "longitude" => "31.5788",
        "population" => 291095,
        "region" => "Karadeniz"
    ],
    [
        "id" => "15",
        "name" => "Burdur",
        "latitude" => "37.4613",
        "longitude" => "30.0665",
        "population" => 258339,
        "region" => "Akdeniz"
    ],
    [
        "id" => "16",
        "name" => "Bursa",
        "latitude" => "40.2669",
        "longitude" => "29.0634",
        "population" => 2842547,
        "region" => "Marmara"
    ],
    [
        "id" => "17",
        "name" => "Çanakkale",
        "latitude" => "40.1553",
        "longitude" => "26.4142",
        "population" => 513341,
        "region" => "Marmara"
    ],
    [
        "id" => "18",
        "name" => "Çankırı",
        "latitude" => "40.6013",
        "longitude" => "33.6134",
        "population" => 180945,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "19",
        "name" => "Çorum",
        "latitude" => "40.5506",
        "longitude" => "34.9556",
        "population" => 525180,
        "region" => "Karadeniz"
    ],
    [
        "id" => "20",
        "name" => "Denizli",
        "latitude" => "37.7765",
        "longitude" => "29.0864",
        "population" => 993442,
        "region" => "Ege"
    ],
    [
        "id" => "21",
        "name" => "Diyarbakır",
        "latitude" => "37.9144",
        "longitude" => "40.2306",
        "population" => 1654196,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "22",
        "name" => "Edirne",
        "latitude" => "41.6818",
        "longitude" => "26.5623",
        "population" => 402537,
        "region" => "Marmara"
    ],
    [
        "id" => "23",
        "name" => "Elâzığ",
        "latitude" => "38.6810",
        "longitude" => "39.2264",
        "population" => 574304,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "24",
        "name" => "Erzincan",
        "latitude" => "39.7500",
        "longitude" => "39.5000",
        "population" => 222918,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "25",
        "name" => "Erzurum",
        "latitude" => "39.9000",
        "longitude" => "41.2700",
        "population" => 762321,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "26",
        "name" => "Eskişehir",
        "latitude" => "39.7767",
        "longitude" => "30.5206",
        "population" => 826716,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "27",
        "name" => "Gaziantep",
        "latitude" => "37.0662",
        "longitude" => "37.3833",
        "population" => 1931836,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "28",
        "name" => "Giresun",
        "latitude" => "40.9128",
        "longitude" => "38.3895",
        "population" => 426686,
        "region" => "Karadeniz"
    ],
    [
        "id" => "29",
        "name" => "Gümüşhane",
        "latitude" => "40.4386",
        "longitude" => "39.5086",
        "population" => 151449,
        "region" => "Karadeniz"
    ],
    [
        "id" => "30",
        "name" => "Hakkâri",
        "latitude" => "37.5833",
        "longitude" => "43.7333",
        "population" => 278775,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "31",
        "name" => "Hatay",
        "latitude" => "36.4018",
        "longitude" => "36.3498",
        "population" => 1533507,
        "region" => "Akdeniz"
    ],
    [
        "id" => "32",
        "name" => "Isparta",
        "latitude" => "37.7648",
        "longitude" => "30.5566",
        "population" => 421766,
        "region" => "Akdeniz"
    ],
    [
        "id" => "33",
        "name" => "Mersin",
        "latitude" => "36.8000",
        "longitude" => "34.6333",
        "population" => 1745221,
        "region" => "Akdeniz"
    ],
    [
        "id" => "34",
        "name" => "İstanbul",
        "latitude" => "41.0053",
        "longitude" => "28.9770",
        "population" => 15651905,
        "region" => "Marmara"
    ],
    [
        "id" => "35",
        "name" => "İzmir",
        "latitude" => "38.4189",
        "longitude" => "27.1287",
        "population" => 4168415,
        "region" => "Ege"
    ],
    [
        "id" => "36",
        "name" => "Kars",
        "latitude" => "40.6167",
        "longitude" => "43.1000",
        "population" => 292660,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "37",
        "name" => "Kastamonu",
        "latitude" => "41.3887",
        "longitude" => "33.7827",
        "population" => 372633,
        "region" => "Karadeniz"
    ],
    [
        "id" => "38",
        "name" => "Kayseri",
        "latitude" => "38.7312",
        "longitude" => "35.4787",
        "population" => 1341056,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "39",
        "name" => "Kırklareli",
        "latitude" => "41.7333",
        "longitude" => "27.2167",
        "population" => 346973,
        "region" => "Marmara"
    ],
    [
        "id" => "40",
        "name" => "Kırşehir",
        "latitude" => "39.1425",
        "longitude" => "34.1709",
        "population" => 225562,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "41",
        "name" => "Kocaeli",
        "latitude" => "40.8533",
        "longitude" => "29.8815",
        "population" => 1780055,
        "region" => "Marmara"
    ],
    [
        "id" => "42",
        "name" => "Konya",
        "latitude" => "37.8667",
        "longitude" => "32.4833",
        "population" => 2130544,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "43",
        "name" => "Kütahya",
        "latitude" => "39.4167",
        "longitude" => "29.9833",
        "population" => 571463,
        "region" => "Ege"
    ],
    [
        "id" => "44",
        "name" => "Malatya",
        "latitude" => "38.3552",
        "longitude" => "38.3095",
        "population" => 772904,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "45",
        "name" => "Manisa",
        "latitude" => "38.6191",
        "longitude" => "27.4289",
        "population" => 1380366,
        "region" => "Ege"
    ],
    [
        "id" => "46",
        "name" => "Kahramanmaraş",
        "latitude" => "37.5858",
        "longitude" => "36.9371",
        "population" => 1096610,
        "region" => "Akdeniz"
    ],
    [
        "id" => "47",
        "name" => "Mardin",
        "latitude" => "37.3212",
        "longitude" => "40.7245",
        "population" => 796591,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "48",
        "name" => "Muğla",
        "latitude" => "37.2153",
        "longitude" => "28.3636",
        "population" => 908877,
        "region" => "Ege"
    ],
    [
        "id" => "49",
        "name" => "Muş",
        "latitude" => "38.9462",
        "longitude" => "41.7539",
        "population" => 408728,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "50",
        "name" => "Nevşehir",
        "latitude" => "38.6939",
        "longitude" => "34.6857",
        "population" => 286767,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "51",
        "name" => "Niğde",
        "latitude" => "37.9667",
        "longitude" => "34.6833",
        "population" => 346114,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "52",
        "name" => "Ordu",
        "latitude" => "40.9839",
        "longitude" => "37.8764",
        "population" => 728949,
        "region" => "Karadeniz"
    ],
    [
        "id" => "53",
        "name" => "Rize",
        "latitude" => "41.0201",
        "longitude" => "40.5234",
        "population" => 328979,
        "region" => "Karadeniz"
    ],
    [
        "id" => "54",
        "name" => "Sakarya",
        "latitude" => "40.6940",
        "longitude" => "30.4358",
        "population" => 953181,
        "region" => "Marmara"
    ],
    [
        "id" => "55",
        "name" => "Samsun",
        "latitude" => "41.2928",
        "longitude" => "36.3313",
        "population" => 1279884,
        "region" => "Karadeniz"
    ],
    [
        "id" => "56",
        "name" => "Siirt",
        "latitude" => "37.9333",
        "longitude" => "41.9500",
        "population" => 320351,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "57",
        "name" => "Sinop",
        "latitude" => "42.0231",
        "longitude" => "35.1531",
        "population" => 204133,
        "region" => "Karadeniz"
    ],
    [
        "id" => "58",
        "name" => "Sivas",
        "latitude" => "39.7477",
        "longitude" => "37.0179",
        "population" => 618617,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "59",
        "name" => "Tekirdağ",
        "latitude" => "40.9833",
        "longitude" => "27.5167",
        "population" => 937910,
        "region" => "Marmara"
    ],
    [
        "id" => "60",
        "name" => "Tokat",
        "latitude" => "40.3167",
        "longitude" => "36.5500",
        "population" => 593990,
        "region" => "Karadeniz"
    ],
    [
        "id" => "61",
        "name" => "Trabzon",
        "latitude" => "41.0015",
        "longitude" => "39.7178",
        "population" => 768417,
        "region" => "Karadeniz"
    ],
    [
        "id" => "62",
        "name" => "Tunceli",
        "latitude" => "39.3074",
        "longitude" => "39.4388",
        "population" => 86076,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "63",
        "name" => "Şanlıurfa",
        "latitude" => "37.1591",
        "longitude" => "38.7969",
        "population" => 1892320,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "64",
        "name" => "Uşak",
        "latitude" => "38.6823",
        "longitude" => "29.4082",
        "population" => 353048,
        "region" => "Ege"
    ],
    [
        "id" => "65",
        "name" => "Van",
        "latitude" => "38.4891",
        "longitude" => "43.4089",
        "population" => 1096397,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "66",
        "name" => "Yozgat",
        "latitude" => "39.8181",
        "longitude" => "34.8147",
        "population" => 419440,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "67",
        "name" => "Zonguldak",
        "latitude" => "41.4564",
        "longitude" => "31.7987",
        "population" => 595907,
        "region" => "Karadeniz"
    ],
    [
        "id" => "68",
        "name" => "Aksaray",
        "latitude" => "38.3687",
        "longitude" => "34.0370",
        "population" => 386514,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "69",
        "name" => "Bayburt",
        "latitude" => "40.2552",
        "longitude" => "40.2249",
        "population" => 78550,
        "region" => "Karadeniz"
    ],
    [
        "id" => "70",
        "name" => "Karaman",
        "latitude" => "37.1759",
        "longitude" => "33.2287",
        "population" => 242196,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "71",
        "name" => "Kırıkkale",
        "latitude" => "39.8468",
        "longitude" => "33.5153",
        "population" => 270271,
        "region" => "İç Anadolu"
    ],
    [
        "id" => "72",
        "name" => "Batman",
        "latitude" => "37.8812",
        "longitude" => "41.1351",
        "population" => 566633,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "73",
        "name" => "Şırnak",
        "latitude" => "37.4187",
        "longitude" => "42.4918",
        "population" => 490184,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "74",
        "name" => "Bartın",
        "latitude" => "41.5811",
        "longitude" => "32.4610",
        "population" => 190708,
        "region" => "Karadeniz"
    ],
    [
        "id" => "75",
        "name" => "Ardahan",
        "latitude" => "41.1105",
        "longitude" => "42.7022",
        "population" => 99265,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "76",
        "name" => "Iğdır",
        "latitude" => "39.8880",
        "longitude" => "44.0048",
        "population" => 192435,
        "region" => "Doğu Anadolu"
    ],
    [
        "id" => "77",
        "name" => "Yalova",
        "latitude" => "40.6500",
        "longitude" => "29.2667",
        "population" => 233009,
        "region" => "Marmara"
    ],
    [
        "id" => "78",
        "name" => "Karabük",
        "latitude" => "41.2061",
        "longitude" => "32.6204",
        "population" => 236978,
        "region" => "Karadeniz"
    ],
    [
        "id" => "79",
        "name" => "Kilis",
        "latitude" => "36.7184",
        "longitude" => "37.1212",
        "population" => 130655,
        "region" => "Güneydoğu Anadolu"
    ],
    [
        "id" => "80",
        "name" => "Osmaniye",
        "latitude" => "37.2130",
        "longitude" => "36.1763",
        "population" => 512873,
        "region" => "Akdeniz"
    ],
    [
        "id" => "81",
        "name" => "Düzce",
        "latitude" => "40.8438",
        "longitude" => "31.1565",
        "population" => 360388,
        "region" => "Karadeniz"
    ]
];


$mesafeler = [
    '01' => [array('33', 69), array('51', 184), array('42', 275), array('31', 99), array('80', 119), array('46', 173)],
    '02' => [array('27', 100), array('79', 83), array('63', 224), array('21', 103), array('44', 160)],
    '03' => [array('64', 154), array('43', 105), array('11', 236), array('26', 229), array('42', 225), array('32', 136), array('20', 207), array('15', 202)],
    '04' => [array('65', 294), array('76', 236), array('36', 201), array('25', 169), array('49', 257), array('13', 260)],
    '05' => [array('55', 96), array('60', 43), array('66', 104), array('19', 133)],
    '06' => [array('14', 184), array('42', 258), array('68', 213), array('71', 77), array('18', 103), array('26', 228)],
    '07' => [array('48', 323), array('15', 199), array('32', 196), array('42', 296)],
    '08' => [array('53', 67), array('25', 198), array('75', 217)],
    '09' => [array('48', 155), array('20', 104), array('45', 101), array('35', 126)],
    '10' => [array('45', 155), array('43', 215), array('11', 309), array('17', 156), array('16', 103)],
    '11' => [array('43', 88), array('26', 91), array('54', 106), array('14', 222), array('10', 309), array('16', 91)],
    '12' => [array('21', 184), array('49', 279), array('25', 229), array('24', 195), array('62', 84), array('23', 112)],
    '13' => [array('56', 129), array('65', 112), array('04', 260), array('49', 262), array('72', 149)],
    '14' => [array('26', 217), array('06', 184), array('18', 249), array('67', 145), array('81', 34), array('54', 237), array('11', 222)],
    '15' => [array('48', 170), array('07', 199), array('32', 70), array('03', 202), array('20', 179)],
    '16' => [array('10', 103), array('43', 148), array('11', 91), array('54', 187), array('77', 82)],
    '17' => [array('10', 156), array('59', 133), array('22', 150)],
    '18' => [array('06', 103), array('71', 85), array('19', 231), array('37', 216), array('14', 249), array('78', 204)],
    '19' => [array('66', 76), array('05', 133), array('55', 193), array('57', 187), array('18', 231), array('71', 179)],
    '20' => [array('48', 206), array('15', 179), array('03', 207), array('64', 175), array('45', 219), array('09', 104)],
    '21' => [array('63', 147), array('47', 94), array('72', 125), array('49', 196), array('12', 184), array('23', 131), array('44', 208), array('02', 103)],
    '22' => [array('17', 150), array('59', 127), array('39', 152)],
    '23' => [array('21', 131), array('12', 112), array('62', 164), array('24', 142), array('44', 111)],
    '24' => [array('23', 142), array('62', 84), array('12', 195), array('25', 146), array('69', 155), array('29', 231), array('28', 236), array('58', 247), array('44', 210)],
    '25' => [array('04', 169), array('36', 202), array('75', 198), array('08', 198), array('53', 251), array('61', 306), array('69', 118), array('29', 197), array('58', 422), array('24', 146)],
    '26' => [array('03', 229), array('14', 217), array('06', 228), array('11', 91), array('43', 114), array('64', 172)],
    '27' => [array('02', 100), array('79', 43), array('63', 103), array('46', 58)],
    '28' => [array('61', 95), array('29', 99), array('24', 231), array('58', 217)],
    '29' => [array('61', 83), array('69', 52), array('25', 197), array('24', 231), array('28', 99)],
    '30' => [array('65', 139), array('73', 145)],
    '31' => [array('80', 25), array('01', 99)],
    '32' => [array('20', 207), array('03', 136), array('07', 196), array('15', 70)],
    '33' => [array('01', 69), array('70', 124)],
    '34' => [array('59', 128), array('41', 56)],
    '35' => [array('09', 126), array('45', 42)],
    '36' => [array('04', 201), array('76', 102), array('75', 68), array('25', 202)],
    '37' => [array('18', 216), array('57', 75), array('74', 94), array('19', 192)],
    '38' => [array('50', 72), array('58', 199), array('44', 181), array('01', 253), array('51', 110)],
    '39' => [array('22', 152), array('59', 63)],
    '40' => [array('68', 139), array('42', 160), array('50', 107)],
    '41' => [array('54', 42), array('16', 99), array('34', 56)],
    '42' => [array('51', 85), array('68', 168), array('06', 258), array('26', 229), array('03', 275), array('07', 296), array('15', 202), array('32', 246), array('64', 323)],
    '43' => [array('03', 105), array('64', 61), array('26', 114), array('11', 88), array('10', 215)],
    '44' => [array('02', 160), array('21', 208), array('23', 111), array('24', 210), array('38', 181)],
    '45' => [array('09', 101), array('20', 219), array('10', 155), array('35', 42)],
    '46' => [array('27', 58), array('80', 120), array('01', 173)],
    '47' => [array('21', 94), array('73', 115)],
    '48' => [array('20', 206), array('09', 155), array('07', 323), array('15', 170)],
    '49' => [array('04', 257), array('13', 262), array('72', 152), array('21', 196), array('12', 279), array('25', 293)],
    '50' => [array('68', 63), array('40', 107)],
    '51' => [array('01', 184), array('68', 111), array('38', 110)],
    '52' => [array('28', 88), array('58', 277), array('60', 136)],
    '53' => [array('08', 67), array('25', 251), array('61', 72)],
    '54' => [array('14', 237), array('11', 106), array('16', 187), array('41', 42)],
    '55' => [array('05', 96), array('19', 193)],
    '56' => [array('72', 56), array('13', 129)],
    '57' => [array('37', 75), array('19', 187)],
    '58' => [array('24', 247), array('25', 422), array('38', 199), array('28', 217), array('52', 277)],
    '59' => [array('22', 127), array('17', 133), array('34', 128)],
    '60' => [array('05', 43), array('52', 136)],
    '61' => [array('53', 72), array('25', 306), array('28', 95)],
    '62' => [array('23', 164), array('24', 84), array('12', 84)],
    '63' => [array('02', 224), array('27', 103), array('21', 147)],
    '64' => [array('03', 154), array('20', 175), array('26', 172), array('42', 323)],
    '65' => [array('04', 294), array('76', 236), array('13', 112), array('30', 139)],
    '66' => [array('05', 104), array('19', 76)],
    '67' => [array('14', 145), array('78', 52)],
    '68' => [array('51', 111), array('50', 63), array('71', 157), array('06', 213), array('42', 168), array('40', 139)],
    '69' => [array('24', 155), array('25',), array('29', 52), array('61', 122), array('53', 123)],
    '70' => [array('33', 124), array('42', 101), array('68', 169)],
    '71' => [array('06', 77), array('68', 157), array('18', 85), array('19', 179)],
    '72' => [array('21', 125), array('56', 56), array('47', 152)],
    '73' => [array('30', 145), array('47', 115)],
    '74' => [array('78', 77), array('37', 94)],
    '75' => [array('36', 68), array('08', 217)],
    '76' => [array('36', 102), array('04', 236)],
    '77' => [array('16', 82)],
    '78' => [array('67', 52), array('74', 77), array('14', 204)],
    '79' => [array('27', 43), array('02', 83)],
    '80' => [array('01', 119), array('46', 120), array('31', 25)],
    '81' => [array('54', 107), array('14', 34)]

];





$baglanti = new mysqli("localhost", "root", "", "projedb");

if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

//echo "MySQL bağlantısı başarıyla gerçekleştirildi.";




// foreach ($mesafeler as $ilKodu => $mesafeListesi) {
//     foreach ($mesafeListesi as $mesafe) {
//         $ilKodu1 = intval($ilKodu);
//         $komsu = intval($mesafe[0]);
//         $mesafe1 = $mesafe[1];
//         if( ($komsu)>($ilKodu1)){
//             $insertSql = "INSERT INTO komsuluktablo (il, komsu, mesafe) VALUES ('$ilKodu1', '$komsu', '$mesafe1')";
//             if (mysqli_query($baglanti, $insertSql)) {
//             echo "Veri eklendi.<br>";
//         } else {
//             echo "Veri ekleme hatası: " . mysqli_error($baglanti) . "<br>";
//         }
//         }


//    }
// }

// $sql="SELECT * From `sehirlerTablo`";
// //         echo $sql."<br>";

// $data=mysqli_query($baglanti,$sql);
// if (!$data) {
//     trigger_error(mysqli_error($baglanti), E_USER_ERROR);
// }
// $datas=mysqli_fetch_all($data,MYSQLI_ASSOC);
// print_r($datas);

// foreach  ($iller as $tmp)
// {

//     if($tmp!=null)
//        {
//         $id=$tmp["id"];
//         $name=$tmp["name"];
//         $latitude=$tmp["latitude"];
//         $longitude=$tmp["longitude"];
//         $population=$tmp["population"];
//         $region=$tmp["region"];

//         $sql= "INSERT INTO `sehirlerTablo`(`id`, `name`, `latitude`, `longitude`, `population`,`region`) VALUES ('$id','$name','$latitude','$longitude','$population','$region')";
//         echo $sql."<br>";

//        # $baglanti->query($sql);

//     }
// }



$sql = "SELECT `id` From `sehirlertablo`";
$data = mysqli_query($baglanti, $sql);
if (!$data) {
    trigger_error(mysqli_error($baglanti), E_USER_ERROR);
}
$datas = mysqli_fetch_all($data, MYSQLI_ASSOC);

foreach ($datas as $plaka) {
    echo "<script>   graph.addVertex('" . $plaka["id"] . "');</script>";
}


$sql = "SELECT * From `komsuluktablo`";
$data = mysqli_query($baglanti, $sql);
if (!$data) {
    trigger_error(mysqli_error($baglanti), E_USER_ERROR);
}
$datas = mysqli_fetch_all($data, MYSQLI_ASSOC);

foreach ($datas as $komsu) {
    //graph.addEdge("A", "C", 20);
    // echo $komsu["id"];
    echo "<script>   graph.addEdge('" . $komsu["il"] . "','" . $komsu["komsu"] . "'," . intval($komsu["mesafe"]) . ");</script>";
}





?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>

    <title>Proje Mesafe Ölçümü</title>
</head>

<body>

    <div id="map" style="width:100%;height:500px"></div>
    <div id="rst"></div>
    <script>
        function haversineYontemi(rota, ertR = 6371000) {

            //işlem için derecelerin dönüşümü 
            var sLatRad = Math.PI / 180 * (rota[0]["latitude"]);
            var sLonRad = Math.PI / 180 * (rota[0]["longitude"]);
            var eLatRad = Math.PI / 180 * (rota[rota.length - 1]["latitude"]);
            var eLonRad = Math.PI / 180 * (rota[rota.length - 1]["longitude"]);

            var farkLat = eLatRad - sLatRad;
            var farkLon = eLonRad - sLonRad;

            var tmp = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(farkLat / 2), 2) +
                Math.cos(sLatRad) * Math.cos(eLatRad) * Math.pow(Math.sin(farkLon / 2), 2)));


            var haversineResult = tmp * ertR / 1000;
            var km = Math.floor(haversineResult);
            var m = Math.round((haversineResult - km) * 100);

            return km + "." + m;
        }

        var rota = [];

        function alg(s, e, drm) {
           
            var data = graph.Dijkstra(s, e);
           
            var xhttp;

      

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var jsonData = JSON.parse(this.responseText);
                    //k+=data.length-1
                    for (let k = 0; k < data.length;
                        (drm == true ? k++ : k += (data.length - 1))) {
                        for (let i = 0; i < jsonData.length; i++) {
                            if (data[k] == jsonData[i]["id"]) { // sıralama işlemi yap 
                                rota.push(jsonData[i]);
                                document.getElementById("rst").innerHTML += " => " + jsonData[i]["name"];

                            }
                        }

                    }
                    console.log(rota);

                    //kontol yap

                    map(rota);
                    document.getElementById("rst").innerHTML += "=> Uzaklık=" + (drm==true ? uzaklik:haversineYontemi(rota) );


                }
            };
            xhttp.open("POST", "dbcon.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("data=" + data);


        }

        function map(rota) {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                destinations: [{
                    lat: parseFloat(rota[0]["latitude"]),
                    lng: parseFloat(rota[0]["longitude"])
                }, {
                    lat: parseFloat(rota[rota.length - 1]["latitude"]),
                    lng: parseFloat(rota[rota.length - 1]["longitude"])
                }],
                center: {
                    lat: 38.4274,
                    lng: 35
                },

                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // var fromMarker = new google.maps.Marker({
            //     position: new google.maps.LatLng(parseFloat(rota[0]["latitude"]),parseFloat( rota[0]["longitude"])),
            //     map,
            //     title: "Hello World!",
            // });


            // var infowindow = new google.maps.InfoWindow({
            //     content: "<span>Your title</span>"
            // });
            // google.maps.event.addListener(fromMarker, 'click', function() {
            //     infowindow.open(map, fromMarker);
            // });


            const flightPlanCoordinates = [];

            for (let i = 0; i < rota.length; i++) {
                flightPlanCoordinates.push({
                    "lat": parseFloat(rota[i]["latitude"]),
                    "lng": parseFloat(rota[i]["longitude"])
                })
                new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(rota[i]["latitude"]), parseFloat(rota[i]["longitude"])),
                    map,
                    title: rota[i]["name"],

                });




            }

            console.log(flightPlanCoordinates);


            const flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,

            });

            flightPath.setMap(map);





        }
    </script>






    <?php


    if (isset($_GET)) {




        echo "<script>alg('" . $_GET['plaka1'] . "','" . $_GET['plaka2'] . "'," . $_GET['drm'] . ")</script>";

        // $sql = "SELECT * From `sehirlerTablo` where id=$_POST[plaka1] or id=$_POST[plaka2]";
        // //         echo $sql."<br>";

        // $data = $baglanti->query($sql);
        // $row = [];
        // while ($tmp = $data->fetch_array(MYSQLI_ASSOC)) {
        //     array_push($row, $tmp);
        // }

        // echo "id: " . $row[1]["id"] . " - Name: " . $row[1]["name"] . " " . $row[1]["region"] . "<br>";
        // echo '<script> map(' . $row[1]["latitude"] . ',' . $row[1]["longitude"] . ',' . $row[0]["latitude"] . ',' . $row[0]["longitude"] . '); </script>';


    }

    ?>

</body>

</html>