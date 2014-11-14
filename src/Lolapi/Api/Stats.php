<?php
namespace Lolapi\Api;

class Stats extends AbstractApi
{
    /**
     * @var string
     */
    protected $version = '1.3';
    /**
     * @var string
     */
    protected $region = 'tr';

    /**
     * @param int $id Summoner Id
     * @param int $season
     *
     * @return Array
     */
    public function ranked($id, $season = null)
    {
        $params = [];
        if ($season) {
            $season = (int) $season;
            // TODO: check valid seasons here
            $params['season'] = 'SEASON' . $season;
        }
        return $this->call('stats/by-summoner/' . $id . '/ranked', $params);
    }

    /**
     * @param int $id Summoner Id
     * @param int $season
     *
     * @return mixed
     */
    public function summary($id, $season = null)
    {
        $params = [];
        if ($season) {
            $season = (int) $season;
            // TODO: check valid seasons here
            $params['season'] = 'SEASON' . $season;
        }
        return $this->call('stats/by-summoner/' . $id . '/summary', $params);
    }
}