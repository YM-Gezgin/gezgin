<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sortedShortestPath'])) {
    $sortedShortestPath = json_decode($_POST['sortedShortestPath'], true);
    $_SESSION["siralanmis_dizi"] = [];
    // PHP tarafındaki bir diziye ekleyebilirsiniz
    $phpArray = [];

    foreach ($sortedShortestPath as $location) {
        $phpArray[] = $location;
    }

    $_SESSION['siralanmis_dizi']=$phpArray;
}
?>