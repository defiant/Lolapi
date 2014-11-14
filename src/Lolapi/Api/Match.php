<?php
namespace Lolapi\Api;

/**
 * Class Match
 *
 * @package Lolapi\Api
 */
class Match extends AbstractApi{

    /**
     * @var string
     */
    protected $region = 'tr';
    /**
     * @var string
     */
    protected $version = '2.2';

    /**
     * @param int $id
     * @param bool $timeline
     *
     * @return Array
     */
    public function detail($id, $timeline = false)
    {
        $timeline = $timeline ? 'true' : 'false';

        $params['includeTimeline'] = $timeline;

        return $this->call("match/$id", $params);
    }
} 