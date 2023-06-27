<?php 
    $curl = curl_init();
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $privateKey = 'e2bdca14005954439c74cae9a0d7dfe458edbc8c';
    $publicKey = '063212b67e5d2b6fa5f3e36c1e5d7915'; 
    $keys = $privateKey . $publicKey;

    $string = $timestamp . $keys;
    $md5 = hash('md5', $string);

    curl_setopt($curl, CURLOPT_URL, "https://gateway.marvel.com:443/v1/public/characters?ts=$timestamp&limit=25&apikey=$publicKey&hash=$md5");
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept:application/json , content-type:application/json'));

    $result = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($result, true);
   

    foreach ( $result["data"]["results"] as $key => $hero) {
        foreach ( $hero as $key => $hero ) {
            if ( $key == 'name') {
                echo "<p> $hero </p>";
            } elseif ( $key == 'thumbnail') {
                $img_src = ($hero["path"]);
                $img_extension = ($hero["extension"]);
                
                echo "<p> $img_src.$img_extension </p>";
                echo "<img src='".$img_src.".".$img_extension."'  >";
            }
        }
    }

?>