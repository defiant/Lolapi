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
     * @param $ids
     *
     * @return mixed
     */
    public function bySummoner($ids)
    {
        if (is_array($ids)) {
            $ids= implode(",", $ids);
        }

        return $this->call('team/by-summoner/'.$ids);
    }

    /**
     * Get teams mapped by team ID for a given list of team IDs. (REST)
     *
     * @param $ids
     */
    public function teams($ids)
    {
        if (is_array($ids)) {
            $ids= implode(",", $ids);
        }

        return $this->call('team/'.$ids);
    }
} 