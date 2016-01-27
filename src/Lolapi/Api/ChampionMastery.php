<?php namespace Lolapi\Api;

class ChampionMastery extends AbstractApi
{
    protected $domain = '{region}.api.pvp.net';
    protected $endpoint = '/championmastery/location/';


    // Get a champion mastery by summoner ID and champion ID, returns null if given player has no mastery for given champion
    // Get all champion mastery entries sorted by number of champion points descending
    public function get($summonerId, $championId = null)
    {
        $url = $this->endpoint;
        if ($championId) {
            $url .= '{platformId}/player/{summonerId}/champion/{championId}';
            $url = str_replace(['{platformId}', '{summonerId}', '{championId}'], [$this->getPlatform($this->region), $summonerId, $championId], $url);
        } else {
            $url .= '{platformId}/player/{summonerId}/champions';
            $url = str_replace(['{platformId}', '{summonerId}'], [$this->getPlatform($this->region), $summonerId], $url);
        }

        return $this->call($url);
    }

    public function score($summonerId)
    {
        $url = $this->endpoint . '{platformId}/player/{summonerId}/score';
        $url = str_replace(['{platformId}', '{summonerId}'], [$this->getPlatform($this->region), $summonerId], $url);

        return $this->call($url);
    }

    public function top($summonerId, $count = 3)
    {
        $url = $this->endpoint . '{platformId}/player/{summonerId}/topchampions';
        $url = str_replace(['{platformId}', '{summonerId}'], [$this->getPlatform($this->region), $summonerId], $url);

        $params['count'] = $count;

        return $this->call($url, $params);
    }

    protected function getPlatform($region)
    {
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