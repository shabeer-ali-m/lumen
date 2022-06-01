<?php

namespace App\Services;

use SuperCache\SuperCache as sCache;

class ApiAuthCacheServices
{

    public function __construct()
    {
        sCache::setPath(base_path() . '/storage/framework/cache/');
    }

    public function createToken()
    {
        $key = sha1(time());
        sCache::cache($key)->set([
            'key' => $key,
            'time' => time()
        ]);
        return $key;
    }

    /**
     * Validate API Key
     *
     * @return void
     */
    public function validate($request)
    {
        //$apiKey =  $request->header('Authorization');
        $apiKey =  $request->get('Authorization');
        return $this->sCacheValidate($apiKey);
    }

    private function sCacheValidate($key) : bool
    {
        return sCache::cache($key)->get() ? true : false;
    }
}
