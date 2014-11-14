<?php
namespace Lolapi\Api;

/**
 * Class Game
 *
 * @package Lolapi\Api
 */
class Game extends AbstractApi{

    /**
     * @var string
     */
    protected $version = '1.3';
    /**
     * @var string
     */
    protected $region = 'tr';

    /**
     * Get recent games (max 10) by player id
     * @param int $id
     *
     * @return Array
     */
    public function recentGames($id)
    {
        $endpoint = 'game/by-summoner/' . $id . '/recent';

        return $this->call($endpoint);
    }
} 