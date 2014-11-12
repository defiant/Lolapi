<?php
namespace Lolapi\Api;

/**
 * Class Status
 *
 * @package Lolapi\Api
 */
class Status extends AbstractApi
{
    /**
     * @var string Region
     */
    protected $region = 'tr';
    /**
     * @var string
     */
    protected $version = '';

    /**
     * Query the status and return results
     *
     * @param null $region
     *
     * @return mixed
     */
    public function shards($region = null)
    {
        if($region){
            //Get shard status. Returns the data available on the status.leagueoflegends.com website for the given region. (REST
            return $this->call('shards/'.$region);
        }else{
            // Get shard list. (REST)
            return $this->call('shards');
        }
    }

    /**
     * Make the the call and return result
     * Override the parent function because the url is different
     * @param $endpoint
     * @param array $params
     * @param bool $static
     *
     * @return mixed
     */
    public function call($endpoint, $params = [], $static = false)
    {
        $params['api_key'] = $this->key;

        $url = 'http://status.leagueoflegends.com/' . $endpoint;

        return $this->client->request($url);
    }
}