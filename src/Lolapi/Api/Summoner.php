<?php
namespace Lolapi\Api;

/**
 * Class Summoner
 *
 * @package Lolapi\Api
 */
class Summoner extends AbstractApi{

    const MAXIMUM = 40;
    /**
     * Api version to query
     * @var string
     */
    protected $version = '1.4';

    /**
     * Returns an array containing all the users
     * Can query both by id and name
     * @param $summoners
     *
     * @return Array
     * @throws \MaxException
     */
    public function get($summoners)
    {
        $ids = $names = [];

        if (is_array($summoners)) {
            foreach($summoners as $summoner){
                if (is_int($summoner)) {
                    $ids[] = $summoner;
                }else{
                    $names[] = $summoner;
                }
            }
        }else{
            if (is_numeric($summoners)) {
                $ids[] = $summoners;
            }else{
                $names [] = $summoners;
            }
        }

        $summonerIds = $summonerNames = [];

        if ($ids) {
            $summonerIds = $this->byId($ids);
        }

        if ($names) {
            $summonerNames = $this->byName($names);
        }

        return array_merge($summonerIds + $summonerNames);
    }
    
    /**
     * Get summoner objects mapped by standardized summoner name for a given list of summoner names. (REST)
     *
     * @param $ids
     *
     *  @return Array json
     * @throws \MaxException
     */
    public function byId($ids)
    {
        if (is_array($ids)) {
            if (count($ids) > self::MAXIMUM) {
                throw new \MaxException('You can query only ' . self::MAXIMUM . ' ids per request');
            }
            $ids = implode(",", $ids);
        }

        return $this->call('summoner/'.$ids);
    }

    /**
     * Get summoner objects mapped by summoner ID for a given list of summoner IDs. (REST)
     *
     * @param mixed $names
     *
     * @throws \MaxException
     * @return array
     */
    public function byName($names)
    {

        if (is_array($names)) {
            if (count($names) > self::MAXIMUM) {
                throw new \MaxException('You can query only ' . self::MAXIMUM . ' ids per request');
            }
            $names = implode(",", $names);
        }

        $names = htmlspecialchars($names);

        return $this->call('summoner/by-name/'.$names);
    }

    /**
     * Get rune pages mapped by summoner ID for a given list of summoner IDs. (REST
     *
     * @param array int $ids
     *
     * @return Array
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
     * @param Array $ids
     */
    public function masteries($ids)
    {
        if (is_array($ids)) {
            $ids= implode(",", $ids);
        }

        return $this->call('summoner/'.$ids.'/masteries');
    }

    /**
     * Get summoner names mapped by summoner ID for a given list of summoner IDs. (REST)
     *
     * @param $ids
     *
     * @return Array
     */
    public function name($ids)
    {
        if (is_array($ids)) {
            $ids= implode(",", $ids);
        }

        return $this->call('summoner/' . $ids . '/name');
    }
} 