<?php namespace Lolapi;

use Lolapi\Api\AbstractApi;
//Exceptions
use Lolapi\Exceptions\ClassNotFoundException;

class Lolapi {
    protected $apiKey;
    protected $client;
    protected $region = 'tr';

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
        if ( ! class_exists($class)) {
            // This class does not exist
            throw new ClassNotFoundException('The api class "'.$class.'" was not found.');
        }

        $api = new $class($this->client, $this->apiKey, $this->getRegion());

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

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }


}