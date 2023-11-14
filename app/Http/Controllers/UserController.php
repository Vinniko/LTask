<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index() // TODO казуальный метод, для демонстрации работы фронт-энда с использованием юзеров и их ролей
    {
        $users = User::all();

        return UserResource::collection($users);
    }
}
