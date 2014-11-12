<?php
namespace Lolapi\Api;

use Lolapi\ClientInterface;

class AbstractApi {
    protected $key;
    protected $client;
    protected $version;
    protected $region;

    public function __construct(ClientInterface $client, $key)
    {
        $this->client = $client;
        $this->key = $key;
    }

    public function call($endpoint, $params = [], $static = false){
        $params['api_key'] = $this->key;

        $url = $this->client->setUrl($this->region, $this->version, $static) . $endpoint . '?' . http_build_query($params);

        return $this->client->request($url);
    }
} 