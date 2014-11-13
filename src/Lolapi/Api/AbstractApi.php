<?php
namespace Lolapi\Api;

use Lolapi\ClientInterface;

class AbstractApi {
    protected $key;
    protected $client;
    protected $version;
    protected $region = 'tr';

    public function __construct(ClientInterface $client, $key)
    {
        $this->client = $client;
        $this->key = $key;
    }

    /**
     * @return null
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param null $region
     * @return $this
     * @chainable
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }



    public function call($endpoint, $params = [], $static = false){
        $params['api_key'] = $this->key;

        $url = $this->client->setUrl($this->region, $this->version, $static) . $endpoint . '?' . http_build_query($params);

        return $this->client->request($url);
    }
} 