<?php namespace Lolapi\Api;

class Champion extends AbstractApi{

    protected $free = false;

    protected $version = '1.2';
    protected $region = 'tr';


    public function all($filterFree = false)
    {
        // get all the champions
    }

    public function championById($id)
    {
        // get champion by id
    }
}