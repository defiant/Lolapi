<?php namespace Lolapi\Api;

class Featured extends AbstractApi
{
    protected $domain = '{region}.api.pvp.net/observer-mode/rest/';

    public function get(){
        return $this->call('featured');
    }

    public function setUrl($domain, $endpoint, $region, $version, $params = []){
        $params['api_key'] = $this->key;
        $url = 'https://' . str_replace(['{region}', '{version}'], [$region, $version], $domain);
        $url .= $endpoint . '?' . urldecode(http_build_query($params));
        return $url;
    }
}