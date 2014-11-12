<?php
/**
 * Created by Sinan Taga.
 * Date: 05/11/14 - 21:53
 */
namespace Lolapi;

interface ClientInterface 
{

    public function getUrl();
    public function setUrl($region, $version, $static);
    public function request($url);

} 