<?php
use Lolapi\Lolapi;

class LolapiTest extends PHPUnit_Framework_TestCase{

    public function testChampion()
    {
        $api = new Lolapi('key');
        $champion = $api->Champion();
        $this->assertTrue($champion instanceof \Lolapi\Api\Champion);
    }

    public function testGame()
    {
        $api = new Lolapi('key');
        $game = $api->Game();
        $this->assertTrue($game instanceof \Lolapi\Api\Game);
    }

    public function testHistory()
    {
        $api = new Lolapi('key');
        $history = $api->History();
        $this->assertTrue($history instanceof \Lolapi\Api\History);
    }

    public function testLeague()
    {
        $api = new Lolapi('key');
        $league = $api->League();
        $this->assertTrue($league instanceof \Lolapi\Api\League);
    }

    public function testMatch()
    {
        $api = new Lolapi('key');
        $match = $api->Match();
        $this->assertTrue($match instanceof \Lolapi\Api\Match);
    }

    public function testStaticData()
    {
        $api = new Lolapi('key');
        $static = $api->StaticData();
        $this->assertTrue($static instanceof \Lolapi\Api\StaticData);
    }

    public function testStats()
    {
        $api = new Lolapi('key');
        $stats = $api->Stats();
        $this->assertTrue($stats instanceof \Lolapi\Api\Stats);
    }

    public function testStatus()
    {
        $api = new Lolapi('key');
        $status= $api->Status();
        $this->assertTrue($status instanceof \Lolapi\Api\Status);
    }

    public function testSummoner()
    {
        $api      = new Lolapi('key');
        $summoner = $api->Summoner();
        $this->assertTrue($summoner instanceof \Lolapi\Api\Summoner);
    }

    public function testTeam()
    {
        $api = new Lolapi('key');
        $team = $api->Team();
        $this->assertTrue($team instanceof \Lolapi\Api\Team);
    }

    /**
     * @expectedException Lolapi\Exceptions\ClassNotFoundException
     */
    public function testApiClassNotFoundException()
    {
        $api  = new Lolapi('key');
        $whaaat = $api->foo();
    }
} 