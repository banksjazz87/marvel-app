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

    <div class="comic-card card col-xl-2 col-lg-3 col-md-4 col-sm-4 bg-white">
        <div class="card-body">
            <img class="card-img" src="<?php echo $thumbnail ?>" alt="<?php echo $title . " image." ?>">
            <p class="card-title mute pt-3 pb-2"> <?php echo $title ?> </p>
            <p class="hidden hidden-card-description"><?php echo $description ?></p>
        </div>
    </div>


<?php endforeach ?>

<div id="selected-card-overlay" style="display: none;" class="container-fluid">
    <button id="overlay-toggle" type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div id="selected-card" class="row">
        <div id="card-text-wrapper">
            <img id="selected-card-image" src="http://i.annihil.us/u/prod/marvel/i/mg/f/b0/5ce80adec965d.jpg" alt="image of a hero" />
            <div id="card-text-content" style="display: none" class="text-white">
                <div id="card-content-toggle" aria-label="Close Content" class="pt-2 pb-3 icon-container">
                    <span aria-hidden="true">
                        <i class="fa-solid fa-chevron-down icon text-white"></i>
                </div>
                </button>
                <h3 id="selected-card-title">Testing</h3>
                <p id="selected-card-description">Some sample text pertaining to a comic book.</p>
            </div>
            <div id="show-more-card-text-content" class="text-white pt-3 pb-3" style="display: none">
                <button id="comic-description-btn" type="button">
                    <i class="fa-solid fa-chevron-up icon text-white"></i>
                </button>
            </div>
        </div>
    </div>
</div>
</div>