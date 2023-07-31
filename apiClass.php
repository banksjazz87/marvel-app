<?php
class MarvelApi
{
    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }


    /**
     * @param takes a url that is a tring.
     * @return a response from the api.
     */
    function getResponse($url)
    {
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


    /**
     * @param int of the current offset number needed, in order to update which characters are being displayed.
     * @return api response of the next 100 characters starting from the offset number that is passed in as the parameter.
     */
    function getAllCharacters($offsetNum)
    {
        include 'private.php';

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters?ts=$timestamp&offset=$offsetNum&limit=100&apikey=$publicKey&hash=$md5");

        return $responseData;
    }


    /**
     * @return api data relating to the id that is passed in, in the constructor function.
     */
    function getOneCharacter()
    {
        include 'private.php';

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters/$this->id?ts=$timestamp&limit=75&apikey=$publicKey&hash=$md5");

        return $responseData;
    }


    /**
     * @return comics pertaining to the character's id that is passed in in the constructor function.
     */
    function getCharacterComics()
    {
        include 'private.php';

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters/$this->id/comics?ts=$timestamp&limit=75&apikey=$publicKey&hash=$md5");

        return $responseData;
    }
}
