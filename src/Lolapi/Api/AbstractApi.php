<?php
namespace Lolapi\Api;

use Lolapi\ClientInterface;
use Lolapi\Exceptions\ParameterNotFoundException;

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

        $url = $this->client->setUrl($this->region, $this->version, $static) . $endpoint . '?' . urldecode(http_build_query($params));

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
} 