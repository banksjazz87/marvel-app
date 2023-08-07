<?php
class MarvelApi
{
    public $id;
    public $timestamp;
    public $md5;
    public $pubKey;
    public $privKey;

    function __construct($id)
    {
        //This include is just for development.
        //include 'private.php';

        $date = new DateTime();
        $time = $date->getTimestamp();
        $priv = getenv('privateKey');
        $pub = getenv('publicKey');

        //Following two lines are for developement
        // $priv = $privateKey;
        // $pub = $publicKey;

        $keys = $priv . $pub;
        $string = $time . $keys;
        $hash = hash('md5', $string);

        $this->id = $id;
        $this->timestamp = $time;
        $this->md5 = $hash;
        $this->pubKey = getenv('publicKey');
        $this->privKey = getenv('privateKey');
        
        // Following two lines are for developement
        // $this->pubKey = $publicKey;
        // $this->privKey = $privateKey;

    }


    /**
     * @param takes a url that is a tring.
     * @return a response from the api.
     */
    function getResponse($url)
    {
        // include 'private.php';

        $curl = curl_init();

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

        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters?ts=$this->timestamp&offset=$offsetNum&limit=100&apikey=$this->pubKey&hash=$this->md5");

        return $responseData;
    }


    /**
     * @return api data relating to the id that is passed in, in the constructor function.
     */
    function getOneCharacter()
    {
    
        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters/$this->id?ts=$this->timestamp&limit=75&apikey=$this->pubKey&hash=$this->md5");

        return $responseData;
    }


    /**
     * @return comics pertaining to the character's id that is passed in in the constructor function.
     */
    function getCharacterComics()
    {
        $responseData = $this->getResponse("https://gateway.marvel.com:443/v1/public/characters/$this->id/comics?ts=$this->timestamp&limit=75&apikey=$this->pubKey&hash=$this->md5");

        return $responseData;
    }
}
