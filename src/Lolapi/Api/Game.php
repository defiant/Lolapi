<?php
namespace Lolapi\Api;

class Game extends AbstractApi{

    protected $version = '1.3';
    protected $region = 'tr';

    public function recentGames($id)
    {
        $endpoint = 'game/by-summoner/' . $id . '/recent';

        return $this->call($endpoint);
    }
} 