<?php
namespace Lolapi\Api;

class Match extends AbstractApi{

    protected $region = 'tr';
    protected $version = '2.2';

    public function detail($id, $timeline = false)
    {
        $params['includeTimeline'] = $timeline;
        return $this->call("match/$id", $params);
    }
} 