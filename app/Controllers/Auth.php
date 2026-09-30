<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel
            ->where('username', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'isLoggedIn' => true
            ]);

            return redirect()->to(site_url('tasks'));
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}