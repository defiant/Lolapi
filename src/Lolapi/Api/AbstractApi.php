<?php
namespace Lolapi\Api;

use Lolapi\Cache\SimpleCacheInterface;
use Lolapi\ClientInterface;
use Lolapi\Exceptions\ParameterNotFoundException;

class AbstractApi {
    protected $key;
    protected $client;
    protected $cache;
    protected $caching = false;
    protected $region;
    protected $version;
    protected $domain = '{region}.api.pvp.net/api/lol/{region}/v{version}/';


    public function __construct(ClientInterface $client, SimpleCacheInterface $cache, $key, $region)
    {
        $this->client = $client;
        $this->cache = $cache;
        $this->key = $key;
        $this->region = $region;
    }

    public function setCaching($cache)
    {
        $this->caching = $cache;
        return $this->caching;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return $this
     * @chainable
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    public function call($endpoint, $params = []){
        $minutes = 10;

        $params['api_key'] = $this->key;

        $url = $this->setUrl($this->domain, $endpoint, $this->region, $this->version, $params);

        if ($this->caching) {
            if (!$this->cache instanceof SimpleCacheInterface) {
                throw new \Exception($this->cache . 'does not implement SimpleCacheInterface');
            }
            // try to get cache
            if ($this->cache->has($url)) {
                return $this->cache->get($url);
            }else{
                $data = $this->client->request($url);
                $this->cache->put($url, $data, $minutes);
                return $data;
            }
        }

        return $this->client->request($url);
    }

    public function makeList($entry)
    {
        if (is_array($entry)) {
            // do we need a MAX check here?
            return implode(",", $entry);
        }

        return $entry;
    }

    public function prepareTagString($string, $whitelist)
    {
        $champDataValues = explode(',', $string);

        $retval = [];

        foreach($champDataValues as $val){
            $val = trim($val);
            if (in_array($val, $whitelist)) {
                $retval[] = $val;
            }
        }

        return implode(',', $retval);
    }

    public function validParam($param, $whitelist)
    {
        if (!in_array(trim($param), $whitelist)) {
            throw new ParameterNotFoundException($param . ' not found in accepted parameters.');
        }
    }

    public function setUrl($domain, $endpoint, $region, $version, $params = []){
        $url = 'https://' . str_replace(['{region}', '{version}'], [$region, $version], $domain);
        $url .= $endpoint . '?' . urldecode(http_build_query($params));
        return $url;
    }
} 