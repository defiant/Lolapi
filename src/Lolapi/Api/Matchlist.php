<?php namespace Lolapi\Api;

class Matchlist extends AbstractApi
{
    /**
     * @var string
     */
    protected $region = 'tr';
    /**
     * @var string
     */
    protected $version = '2.2';

    public function get($summonerId, $params = [])
    {
        // championIds: string	Comma-separated list of champion IDs to use for fetching games.
        // rankedQueues: string	Comma-separated list of ranked queue types to use for fetching games. Non-ranked queue types will be ignored.
        // seasons:     string	Comma-separated list of seasons to use for fetching games.
        // beginTime:   long	The begin time to use for fetching games specified as epoch milliseconds.
        // endTime:     long	The end time to use for fetching games specified as epoch milliseconds.
        // beginIndex   int	The begin index to use for fetching games.
        // endIndex:    int    The begin index to use for fetching games.

        return $this->call("matchlist/by-summoner/$summonerId", $params);
    }
}
/*


*/