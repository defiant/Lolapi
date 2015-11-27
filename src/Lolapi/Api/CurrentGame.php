<?php namespace Lolapi\Api;

class CurrentGame extends AbstractApi
{
    protected $domain = '{region}.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/';

    public function get($region, $summonerId){
        return $this->call($this->getPlatform($region) . '/'. $summonerId);
    }

    public function setUrl($domain, $endpoint, $region, $version, $params = []){
        $params['api_key'] = $this->key;
        $url = 'https://' . str_replace(['{region}', '{version}'], [$region, $version], $domain);
        $url .= $endpoint . '?' . urldecode(http_build_query($params));
        return $url;
    }

    protected function getPlatform($region){
        $platforms = [
            'na' => 'NA1',
            'br' => 'BR1',
            'lan' => 'LA1',
            'las' => 'LA2',
            'oc' => 'OC1',
            'eune' => 'EUN1',
            'tr' => 'TR1',
            'ru' => 'RU',
            'euw' => 'EUW1',
            'kr' => 'KR'
        ];

        return $platforms[$region];
    }
}