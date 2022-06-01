<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    public function hello()
    {
        return response()->json(['hello' => 'World']);
    }
}
