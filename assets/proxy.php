<?php

    $url = 'https://www.flyingblue.us/kamino/xp-estimation/programme';
    $origin = $_GET['origin'];
    $destination = $_GET['destination'];

    $proxyUrl = $url . '?origin=' . urlencode($origin) . '&destination=' . urlencode($destination) . (isset($_GET['via']) ? '&via=' . urlencode($_GET['via']) : '');

    $response = file_get_contents($proxyUrl);
    header('Content-Type: application/json');
    echo $response;
