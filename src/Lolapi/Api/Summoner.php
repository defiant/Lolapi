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
     * @throws \MaxException
     * @return Array json
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
     * @param $names
     * @throws \MaxException
     * @return summoner info json
     */
    public function byName($names)
    {

        if (is_array($names)) {
            if (count($names) > self::MAXIMUM) {
                throw new \MaxException('You can query only ' . self::MAXIMUM . ' ids per request');
            }
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