<?php

function fetchData(){
$apiKey = 'ZDz4FZbDIoSJFaS1/Wk6GA==1umB8oDkSWFMaTXg';

$apiUrl = 'https://api.api-ninjas.com/v1/randomword';

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Api-key: ' . $apiKey]);

$responseJson = curl_exec($ch);

if(curl_errno($ch)){
    echo 'Fetch error: ' . curl_error($ch);
}

curl_close($ch);

$response = json_decode($responseJson, true);

return $response;
}

?>