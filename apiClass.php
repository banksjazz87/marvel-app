
<?php 
class MarvelApi {
    public $id;

    function __construct($id) {
        $this->id = $id;
    }

    function getResponse($url) {
        include 'private.php';

        curl_setopt($curl, CURLOPT_URL, "$url");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept:application/json , content-type:application/json'));

        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);

        return $result;
    }
    
    function getAllCharacters($offsetNum) {
        include 'private.php';

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters?ts=$timestamp&offset=$offsetNum&limit=100&apikey=$publicKey&hash=$md5");

        return $responseData;
    }

    function getOneCharacter() {
        include 'private.php';

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters/$this->id?ts=$timestamp&limit=75&apikey=$publicKey&hash=$md5");

        return $responseData;
    }

    function getCharacterComics() {
        include 'private.php';

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters/$this->id/comics?ts=$timestamp&limit=75&apikey=$publicKey&hash=$md5");
        
        return $responseData;
    }


}

?>