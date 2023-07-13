<?php
include '../apiClass.php';

$currentId = $_GET['id'];

$api = new MarvelApi($currentId);
$characterData = $api->getOneCharacter();
$characterArray = $characterData['data']['results'][0];
$name = $characterArray['name'];
$image = $characterArray['thumbnail']['path'] . "." . $characterArray['thumbnail']['extension'];


echo "<h1>New Page $currentId</h1> ";

var_dump($characterData['data']['results']);

echo "<h2>Hero name is $name<h2>";
echo "image is $image";

?>