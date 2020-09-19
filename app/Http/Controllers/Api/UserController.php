<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function me()
    {
        $user = Auth()->user();

        return new UserResource($user);
    }
}
