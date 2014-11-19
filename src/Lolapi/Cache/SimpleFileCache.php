<?php
namespace Lolapi\Cache;

/**
 * Class SimpleFileCache
 *
 * Simple file based cache system. This is used to cache the LOL Api results to prevent
 * the abuse of rate limits. It is mostly based on Laravel's file store.
 *
 * @package Lolapi\Cache
 */
class SimpleFileCache implements SimpleCacheInterface{

    /**
     * @var string
     */
    protected $path = 'cache/';
    /**
     * @var string
     */
    protected $extension = 'sc';

    /**
     * @param null $path
     */
    public function __construct($path = null)
    {
        if ($path) {
            $this->path = $path;
        }

        if (!file_exists($this->path)) {
            $this->createCacheDirectory($this->path);
        }
    }

    /**
     * @param $key
     *
     * @return array
     */
    public function has($key)
    {
        $filename = $this->getFile($key);

        if (!file_exists($filename)) {
            return [];
        }

        $fileContents = file_get_contents($filename);
        $expire = substr($fileContents, 0, 10);

        // If the file is expired delete it!
        if (time() >= $expire)
        {
            $this->forget($key);
            return [];
        }

        $data = unserialize(substr($fileContents, 10));

        // Next, we'll extract the number of minutes that are remaining for a cache
        // so that we can properly retain the time for things like the increment
        // operation that may be performed on the cache. We'll round this out.
        $time = ceil(($expire - time()) / 60);

        return ['data'=>$data, 'time' => $time];
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        if ($cache = $this->has($key)) {
            // get payload
            return $cache['data'];
        }

        return null;
    }

    /**
     * @param $key
     * @param $value
     * @param $minutes
     *
     * @return bool
     */
    public function put($key, $value, $minutes = 60)
    {
        $filename = $this->getFile($key);
        $value = $this->expiration($minutes) . serialize($value);

        return file_put_contents($filename, $value);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function forget($key)
    {
        $file = $this->getFile($key);

        if (file_exists($file)) {
            return unlink($file);
        }
        return false;
    }

    /**
     *
     */
    public function flush()
    {

    }

    /**
     * @param $path
     * @param int $mode
     * @param bool $recursive
     */
    protected function createCacheDirectory($path, $mode = 0755, $recursive = false)
    {
        try {
            mkdir($path, $mode, $recursive);

        } catch (\Exception $e) {
            //
        }
    }

    /**
     * @param $key
     * @param null $extension
     *
     * @return string
     */
    protected function getFile($key, $extension = null)
    {
        return $this->path . sha1($key) . $extension;
    }

    /**
     * Get the expiration time based on the given minutes.
     *
     * @param  int  $minutes
     * @return int
     */
    protected function expiration($minutes)
    {
        if ($minutes === 0) return 9999999999;
        return time() + ($minutes * 60);
    }

}