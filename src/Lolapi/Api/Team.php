<?php
namespace Lolapi\Api;

/**
 * Class Team
 *
 * @package Lolapi\Api
 */
class Team extends AbstractApi{

    /**
     * @var string
     */
    protected $version = '2.4';
    /**
     * @var string
     */
    protected $region = 'tr';

    /**
     * Get teams mapped by summoner ID for a given list of summoner IDs. (REST)
     * @param $ids
     *
     * @return Array
     */
    public function bySummoner($ids)
    {
        return $this->call('team/by-summoner/' . $this->makeList($ids));
    }

    /**
     * Get teams mapped by team ID for a given list of team IDs. (REST)
     *
     * @param $ids
     *
     * @return Array
     */
    public function teams($ids)
    {
        return $this->call('team/' . $this->makeList($ids));
    }
} 