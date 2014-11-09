<?php
namespace Lolapi\Api;

class Status extends AbstractApi
{
    protected $region = 'tr';
    protected $version = '';

    public function shards($region = null)
    {
        if($region){
            //Get shard status. Returns the data available on the status.leagueoflegends.com website for the given region. (REST
        }else{
            // Get shard list. (REST
        }
    }
}