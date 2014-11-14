<?php
namespace Lolapi\Api;

use Lolapi\Exceptions\GameTypeNotFoundException;

/**
 * Class League
 *
 * @package Lolapi\Api
 */
class League extends AbstractApi{

    /**
     * @var string
     */
    protected $version = '2.5';
    /**
     * @var string
     */
    protected $region = 'tr';


    /**
     * Get leagues mapped by summoner ID for a given list of summoner IDs. (REST)
     *
     * @param $ids
     *
     * @return Array
     */
    public function bySummoner($ids)
    {
        return $this->call('league/by-summoner/' . $this->makeList($ids) );
    }

    /**
     * Get league entries mapped by summoner ID for a given list of summoner IDs. (REST)
     * @param $ids
     *
     * @return Array
     */
    public function entryBySummoner($ids)
    {
        return $this->call('league/by-summoner/' . $this->makeList($ids) . '/entry');
    }

    /**
     * Get leagues mapped by team ID for a given list of team IDs. (REST)
     * @param $ids
     *
     * @return Array
     */
    public function byTeam($ids)
    {
        return $this->call('league/team/' . $this->makeList($ids));
    }

    /**
     * Get leagues mapped by team ID for a given list of team IDs. (REST)
     * @param $ids
     */
    public function entryByTeam($ids)
    {
        return $this->call('league/team/' . $this->makeList($ids) . '/entry');
    }

    /**
     * Get challenger tier leagues. (REST)
     * @param string $type
     *
     * @return Array
     * @throws GameTypeNotFoundException
     */
    public function challenger($type)
    {
        $types = ['RANKED_SOLO_5x5', 'RANKED_TEAM_3x3', 'RANKED_TEAM_5x5'];

        if (!in_array($type, $types)) {
            throw new GameTypeNotFoundException();
        }

        $params['type'] = $type;

        return $this->call('league/challenger', $params);
    }
} 