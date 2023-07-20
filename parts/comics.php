<!-- <?php
    $comics = $api->getCharacterComics();
    //$image = $characterArray['thumbnail']['path'] . "." . $characterArray['thumbnail']['extension'];
  
?> -->


<?php 
    $comics = $api->getCharacterComics();   
    foreach ( $comics['data']['results'] as $value ): 
?> 
    <?php
        $thumb = $value['thumbnail'];
        $thumbnail = $value['thumbnail']['path'] . "." . $value['thumbnail']['extension'];
        $title = $value['title'];
        $description = $value['description'];
      
     ?>
    
     <div class="card col-xl-2 col-lg-3 col-md-4 col-sm-4">
        <div class="card-body">
        <img class="card-img" src="<?php echo $thumbnail?>" alt="<?php echo $title . " image."?>" >
        <p class="card-title mute"> <?php echo $title ?> </p>
    </div>

        <div class="card-footer text-center">
            <a class="muted">Read More</a>
        </div>
  
    </div>
    

<?php endforeach ?>


    
