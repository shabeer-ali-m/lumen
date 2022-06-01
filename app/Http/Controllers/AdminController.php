<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\ApiAuthServices;

class AdminController extends BaseController
{
    public function createToken()
    {
        $auth = new ApiAuthServices;
        $token = $auth->createToken();
        return response()->json(['token' => $token]);
    }
}
