<?php

namespace App\Services;

use App\Models\User;

class ApiAuthTokenServices
{
    public function validate($request)
    {
        if (User::where('api_token', $request->get('Authorization'))->first())
            return true;
        return false;
    }
}
