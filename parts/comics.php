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
     <div>
        <img src="<?php echo $thumbnail?>" alt="<?php echo $title . " image."?>" />
        <h3> <?php echo $title ?> </h3>
        <p> <?php echo $description ?> </p>
     </div>

<?php endforeach ?>
    
