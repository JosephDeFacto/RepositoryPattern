<?php

namespace App;

error_reporting(E_ALL);
ini_set("display_errors", true);

class UserController
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function addUser()
    {
        $user = new User();
        $this->userRepository->add($user);
    }

    public function getUser($id)
    {
        return $this->userRepository->findBy($id);
    }
}


