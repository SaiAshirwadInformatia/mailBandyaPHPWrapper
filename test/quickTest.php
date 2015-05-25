<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://app.mailbandya.com/api/campaigns/1');
curl_setopt($ch, CURLOPT_HTTPHEADER, 
    array(
        'user-access-token: $2y$10$ql7z.14kJXLKBtCuos4T6ep/Le1TnSAgmA80cx0foBMi9S/KzVbJe'
    ));
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_TIMEOUT, 600);

// Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_USERAGENT, 'SaiAshirwadInformatia-PHP/1.0.0');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);

echo $response;
die();