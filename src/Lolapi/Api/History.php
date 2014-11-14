<?php
namespace Lolapi\Api;

class History extends AbstractApi{

    /**
     * @var string
     */
    protected $version = '2.2';
    /**
     * @var string
     */
    protected $region = 'tr';

    /**
     * Retrieve match history by summoner ID. (REST)
     * @param $id Summoner Id
     * @param array $params (String championIds (Comma sep champ ids), String rankedQueues, Int beginIndex, Int endIndex)
     *
     * @return Array
     * @throws GameTypeNotFoundException
     */
    public function get($id, $params = [])
    {
        $types = ['RANKED_SOLO_5x5', 'RANKED_TEAM_3x3', 'RANKED_TEAM_5x5'];

        if (isset($params['rankedQueues']) && !in_array($params['rankedQueues'], $types)) {
            throw new GameTypeNotFoundException('Game queue Type', $params['rankedQueues'] . 'not found in accepted values.');
        }

        // maybe check other parameters
        return $this->call("matchhistory/$id", $params);
    }
} 