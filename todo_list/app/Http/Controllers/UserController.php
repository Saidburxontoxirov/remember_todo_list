<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAllUsers()
    {
        if (!Auth::user()->is_admin)
            return response()->json(['message' => 'Forbidden'], 403);

        return UserResource::collection(User::select('name', 'email', 'username', 'telegramm_id')->get());
    }
}
