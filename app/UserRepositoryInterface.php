<?php

namespace App;

interface UserRepositoryInterface
{
    public function add(User $user);
    public function findBy($id): User;
}