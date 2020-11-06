<?php
namespace App\Repository\User;
use App\Repository\InterfaceRepository;
interface UserInterface extends InterfaceRepository {
    public function login(array $data);
}