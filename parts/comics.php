<!-- <?php
        $comics = $api->getCharacterComics();
        //$image = $characterArray['thumbnail']['path'] . "." . $characterArray['thumbnail']['extension'];

        ?> -->


<?php
$comics = $api->getCharacterComics();
foreach ($comics['data']['results'] as $value) :
?>
    <?php
    $thumb = $value['thumbnail'];
    $thumbnail = $value['thumbnail']['path'] . "." . $value['thumbnail']['extension'];
    $title = $value['title'];
    $description = $value['description'];

    ?>

    <div class="comic-card card col-xl-2 col-lg-3 col-md-4 col-sm-4">
        <div class="card-body">
            <img class="card-img" src="<?php echo $thumbnail ?>" alt="<?php echo $title . " image." ?>">
            <p class="card-title mute"> <?php echo $title ?> </p>
        </div>

        <div class="card-footer text-center">
            <a class="muted">Read More</a>
        </div>
    </div>


<?php endforeach ?>

<div id="selected-card-overlay" style="display: none;">
    <p id="overlay-toggle">X</p>
    <div id="selected-card" class="row">
        <div id="selected-card-image" class="image-container" style="background-image: url('http://i.annihil.us/u/prod/marvel/i/mg/f/b0/5ce80adec965d.jpg')">
            <div id="card-text-content">
                <h3 id="selected-card-title">Testing</h3>
                <p id="selected-card-description">Some sample text pertaining to a comic book.</p>
            </div>
        </div>
    </div>
</div>