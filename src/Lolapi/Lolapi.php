<?php namespace Lolapi;

use Lolapi\Api\AbstractApi;
//Exceptions
use Lolapi\Cache\SimpleFileCache;
use Lolapi\Exceptions\ClassNotFoundException;

class Lolapi {
    protected $apiKey;
    protected $client;
    protected $cache;
    protected $region = 'tr';

    public function __construct($apiKey, ClientInterface $client = null, SimpleCacheInterface $cache = null)
    {
        $this->apiKey = $apiKey;

        if (!$client) {
            $this->client = new Client;
        }else{
            $this->client = $client;
        }

        if (!$cache) {
            $this->cache = new SimpleFileCache;
        }else{
            $this->cache = $cache;
        }
    }

    public function __call($name, $arguments)
    {
        $class= 'Lolapi\\Api\\'.$name;

        if ( ! class_exists($class)) {
            // This class does not exist
            throw new ClassNotFoundException('The api class "'.$class.'" was not found.');
        }

        $api = new $class($this->client, $this->cache, $this->apiKey);

        if (! $api instanceof AbstractApi) {
            // This class does not exist
            throw new ClassNotFoundException('The api class "'.$class.'" is not an instance of AbstractApi Class.');
        }

        // $api->setCaching(true);
        /*$api->setKey($this->key)
            ->setRegion($this->region)
            ->setTimeout($this->timeout)
            ->setCacheOnly($this->cacheOnly);*/

        return $api;
    }

    /**
     * @return string $region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set the region for api
     * @param string $region
     * @return this
     * @chainable
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }


}