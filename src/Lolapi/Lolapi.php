<?php namespace Lolapi;
require '../../vendor/autoload.php';

use Lolapi\Api\AbstractApi;
use Lolapi\Api\Champion;

//Exceptions
use Lolapi\Exceptions\ClassNotFoundException;

class Lolapi {
    protected $apiKey;
    protected $client;

    public function __construct($apiKey, ClientInterface $client = null)
    {
        $this->apiKey = $apiKey;

        if (!$client) {
            $this->client = new Client;
        }else{
            $this->client = $client;
        }
    }

    public function __call($name, $arguments)
    {
        $class= 'Lolapi\\Api\\'.$name;
        if ( ! class_exists($class))
        {
            // This class does not exist
            throw new ClassNotFoundException('The api class "'.$class.'" was not found.');
        }

        $api = new $class($this->client, $this->apiKey);

        if (! $api instanceof AbstractApi) {
            // This class does not exist
            throw new ClassNotFoundException('The api class "'.$class.'" is not an instance of AbstractApi Class.');
        }

        /*$api->setKey($this->key)
            ->setRegion($this->region)
            ->setTimeout($this->timeout)
            ->setCacheOnly($this->cacheOnly);*/

        return $api;
    }

    public function champ()
    {
        $champ = new Champion(new Client, $this->apiKey);
        return $champ->test();
    }


}

$api = new Lolapi('d9887817-03ce-40df-bfa0-535738e0561b');

//$api->champ();
$api->Champion()->test();