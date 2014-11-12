<?php
namespace Lolapi\Api;

/**
 * Class Summoner
 *
 * @package Lolapi\Api
 */
class Summoner extends AbstractApi{

    /**
     * Api version to query
     * @var string
     */
    protected $version = '1.4';

    /**
     * Api region to query
     * @var string
     */
    protected $region = 'tr';


    /**
     * Get summoner objects mapped by standardized summoner name for a given list of summoner names. (REST)
     *
     * @param $ids
     */
    public function byId($ids)
    {
        if (is_array($ids)) {
            $ids = implode(",", $ids);
        }

        return $this->call('summoner/'.$ids);
    }

    /**
     * Get summoner objects mapped by summoner ID for a given list of summoner IDs. (REST)
     *
     * @param $names
     *
     * @return summoner info json
     */
    public function byName($names)
    {

        if (is_array($names)) {
            $names = implode(",", $names);
        }
        return $this->call('summoner/by-name/'.$names);
    }

    /**
     * Get rune pages mapped by summoner ID for a given list of summoner IDs. (REST
     *
     * @param $ids
     *
     * @return rune pages mapped by summoner ID
     */
    public function runes($ids)
    {
        if (is_array($ids)) {
            $ids= implode(",", $ids);
        }

        return $this->call('summoner/'.$ids.'/runes');
    }

    /**
     * Get mastery pages mapped by summoner ID for a given list of summoner IDs (REST)
     *
     * @param $ids
     */
    public function masteries($ids)
    {
        if (is_array($ids)) {
            $ids= implode(",", $ids);
        }

        return $this->call('summoner/'.$ids.'/masteries');
    }

    /**
     * Get summoner names mapped by summoner ID for a given list of summoner IDs. (REST
     *
     * @param $id
     */
    public function name($id)
    {
        return $this->call('summoner/' . $id . 'name');
    }
} 