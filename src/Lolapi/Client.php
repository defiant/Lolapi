<?php
/**
 * Created by Sinan Taga.
 * Date: 03/11/14 - 21:53
 */
namespace Lolapi;

use GuzzleHttp\Client as Guzzle;

class Client implements ClientInterface{

    protected $domain = '{locale}.api.pvp.net/api/lol/tr/v{version}/';
    protected $domainStatic = 'global.api.pvp.net/api/lol/static-data/{locale}/v{version}/';
    protected $url;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($region, $version, $static = false)
    {
        $url = $static ? $this->$domainStatic : $this->domain;

        $this->url = str_replace(['{locale}', '{version}'], [$region, $version], $url);

        return $this->url;
    }

    public function request()
    {
        $guzzle = new Guzzle();
        $response = $guzzle->get($this->getUrl(), ['connect_timeout' => 600]);

        return  $response->json();
    }
}