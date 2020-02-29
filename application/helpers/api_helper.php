<?php

function api_post($url, $data) {

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
    ));

    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    return $response;
}

function api_get($url) {

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
    ));

    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);

    return $response;
}

function api_get_id($url, $id) {
    $curl = curl_init($url . $id);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
    ));

    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);

    return $response;   
}

function api_put($url, $data) {
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
    ));

    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    return $response;
}

function api_delete($url, $id) {

    $curl = curl_init($url . $id);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
    ));

    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    return $response;
}


?>
