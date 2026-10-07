<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    private const DEMO_ADMIN_USERNAME = 'admin';
    private const DEMO_ADMIN_PASSWORD_HASH = '$2y$10$xemGYtbO9SAZ/.1aWyDBleC2sB9U2h1ph.tVXByTaz52xMjKjTVmS';

    public function login(): string|RedirectResponse
    {
        if (session()->get('isLogged') === true) {
            return redirect()->to('/dashboard');
        }

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'username' => 'required|max_length[100]',
                'password' => 'required|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Enter both your username and password.');
            }

            $username = (string) $this->request->getPost('username');
            $password = (string) $this->request->getPost('password');
            $userModel = new User();
            $user = $userModel->findByEmail($username);
            $isDatabaseUser = $user && $userModel->verifyPassword($password, $user['password']);
            $isDemoAdmin = hash_equals(self::DEMO_ADMIN_USERNAME, $username)
                && password_verify($password, self::DEMO_ADMIN_PASSWORD_HASH);

            if (! $isDatabaseUser && ! $isDemoAdmin) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid username or password.');
            }

            if ($isDemoAdmin) {
                $user = [
                    'id' => 0,
                    'email' => self::DEMO_ADMIN_USERNAME,
                ];
            }

            session()->regenerate();
            session()->set([
                'isLogged' => true,
                'user_id' => $user['id'],
                'username' => $user['email'],
            ]);

            return redirect()->to('/dashboard');
        }

        return view('auth/login', [
            'title' => 'Login - Puihaha Electric',
            'page' => 'login',
        ]);
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
