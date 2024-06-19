<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middleware\Middleware;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        Middleware::forGuest();
        $this->view('auth/signin');
    }

    public function auth($data)
    {
        Middleware::forGuest();
        session_start();
        $user = (new User())->auth($data);
        if (!$user) {
            $_SESSION['error'] = [
                'title' => "Invalid credential.",
                'message' => "The credential that you have provided didn't match any data in our system."
            ];
            return header('Location: /auth/signin');
        }
        $_SESSION['id']         = $user->id;
        $_SESSION['username']   = $user->username;

        return header('Location: /');
    }

    public function register()
    {
        Middleware::forGuest();
        $this->view('auth/signup');
    }

    public function signup($data)
    {
        $result = (new User)->store($data);
        if ($result) $this->auth($data);
        else {
            $_SESSION['error'] = [
                'title' => "Something went wrong.",
                'message' => "Please check all the required field or username has already been taken."
            ];
            return header('Location: /auth/signup');
        }
    }

    public function logout()
    {
        Middleware::forAuth();
        session_start();
        session_destroy();
        header('Location: /auth/signin');
    }
}
