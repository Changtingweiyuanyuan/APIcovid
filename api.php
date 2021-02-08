<?php

function load_content($url){
    $codivUrl=curl_init();
    curl_setopt($codivUrl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($codivUrl, CURLOPT_HEADER, false);
    curl_setopt($codivUrl, CURLOPT_URL, $url);
    $data=curl_exec($codivUrl);
    curl_close($codivUrl);
    return $data;
}
echo load_content('https://www.cdc.gov.tw/TravelEpidemic/ExportJSON');

?>