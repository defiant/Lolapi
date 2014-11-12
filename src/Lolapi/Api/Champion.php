<?php namespace Lolapi\Api;

class Champion extends AbstractApi{

    protected $free = false;

    protected $version = '1.2';
    protected $region = 'tr';


    public function all($filterFree = false)
    {
        // get all the champions
        $params['filterFree'] = $filterFree;

        return $this->call('champion', $params);
    }

    public function byId($id)
    {
        // get a champion by id

        return $this->call('champion/', $id);
    }
}