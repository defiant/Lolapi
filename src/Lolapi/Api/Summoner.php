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
    public function getById($ids)
    {

    }

    /**
     * Get summoner objects mapped by summoner ID for a given list of summoner IDs. (REST)
     *
     * @param $names
     */
    public function getByName($names)
    {

    }

    /**
     * Get rune pages mapped by summoner ID for a given list of summoner IDs. (REST
     *
     * @param $id
     */
    public function runes($id)
    {

    }

    /**
     * Get mastery pages mapped by summoner ID for a given list of summoner IDs (REST)
     *
     * @param $id
     */
    public function masteries($id)
    {

    }

    /**
     * Get summoner names mapped by summoner ID for a given list of summoner IDs. (REST
     *
     * @param $id
     */
    public function name($id)
    {

    }
} 