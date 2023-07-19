<?php
    include '../apiClass.php';

    $currentId = $_GET['id'];

    $api = new MarvelApi($currentId);
    $comics = $api->getCharacterComics();
    //$image = $characterArray['thumbnail']['path'] . "." . $characterArray['thumbnail']['extension'];
    $description = $characterArray['description'];

   
    //[data][results]: [id]

    foreach ( $comics['data']['results'] as $value ) {
        $thumb = $value['thumbnail'];
        var_dump($thumb);
    }
    //var_dump($comics['data']['results'][0]['thumbnail']);

?>