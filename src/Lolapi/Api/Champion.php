<?php namespace Lolapi\Api;

class Champion extends AbstractApi{

    protected $free = false;

    protected $version = '1.2';
    protected $region = 'tr';


    /**
     * Get all champions
     * @param bool $filterFree
     *
     * @return Array
     */
    public function all($filterFree = false)
    {
        // api url expects freeToPlay to be a string
        $params['freeToPlay'] = $filterFree ? 'true' : 'false';

        return $this->call('champion', $params);
    }

    /**
     * Get a champion by its given id
     * @param int $id
     *
     * @return Array
     */
    public function byId($id)
    {
        return $this->call('champion/' . $id);
    }
}