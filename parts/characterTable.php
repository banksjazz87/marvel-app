<?php
function returnNamesAndImages($value) {

    foreach ( $value["data"]["results"] as $hero) {
        $img_src = $hero['thumbnail']['path'];

            $data_row = "<tr class='table_row'>";

            $name = $hero['name'];
            $image_ext = $hero['thumbnail']['extension'];
            $id = $hero['id'];

            $data_row .= "<td class='table-data title_data'><p class='hero_title'> $name </p></td>";

            $data_row .= "<td class='table-data image'><img id='$id'class='hero-image' src='".$img_src.".".$image_ext."' ></td>"; 

            $data_row .= "<td class='table-data read-more text-center'><form method='get' action='/views/character.php/'><input type='hidden' id='id' name='id' value=$id /> <input type='submit' value='Read More' class='btn btn-info'></form></td>";

            echo $data_row .= "</tr>";
    }
    
}
