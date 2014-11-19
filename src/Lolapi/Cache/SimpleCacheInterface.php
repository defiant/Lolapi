<?php
namespace Lolapi\Cache;

interface SimpleCacheInterface 
{
    public function has($key);

    public function get($key);

    public function put($key, $value, $minutes);

    public function forget($key);

    public function flush();
} 