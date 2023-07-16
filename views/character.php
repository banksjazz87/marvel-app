<?php
include '../apiClass.php';

$currentId = $_GET['id'];

$api = new MarvelApi($currentId);
$characterData = $api->getOneCharacter();
$characterArray = $characterData['data']['results'][0];
$name = $characterArray['name'];
$image = $characterArray['thumbnail']['path'] . "." . $characterArray['thumbnail']['extension'];
$description = $characterArray['description'];


// echo "<h1>New Page $currentId</h1> ";

// var_dump($characterData['data']['results']);

// echo "<h2>Hero name is $name<h2>";
// echo "image is $image";

?>

<div id="character_page_wrapper">
    <div>
        <img src=<?php echo "$image"?> alt="image of <?php $name?>"/>
        <h1><?php echo $name ?></h1>

        <?php if ( strlen($description) > 0) {
            echo "<p>$description</p>";
        } else {
            echo "<p>Unfortunately $name has no available description</p>";
        }
        ?>
    </div>
</div>