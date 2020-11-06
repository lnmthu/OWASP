<?php

namespace App\Repository\User;

use App\Repository\User\UserInterface;
use App\Repository\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserInterface
{
    public function getModel()
    {
        return User::class;
    }
    public function create(array $data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }
    public function login(array $data)
    {
        if ($data && Auth::attempt(["email" => $data["email"], "password" => $data["password"]]))
            return true;
        return false;
    }
}
