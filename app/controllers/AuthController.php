<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
    }

    public function register()
    {
        $data = ['error' => null];

        if ($this->io->method() === 'post') {
            $username = trim((string) $this->io->post('username'));
            $password = (string) $this->io->post('password');

            if (!preg_match('/^[A-Za-z0-9_]{3,100}$/', $username) || strlen($password) < 8) {
                $data['error'] = 'Use a username with 3–100 letters, numbers, or underscores and a password with at least 8 characters.';
            } elseif ($this->UserModel->username_exists($username)) {
                $data['error'] = 'That username is already in use.';
            } else {
                $this->UserModel->create_user([
                    'username' => $username,
                    'email' => strtolower($username) . '@local.test',
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role' => 'user',
                ]);

                $this->redirect_to('/login');
                return;
            }
        }

        $this->call->view('auth/register', $data);
    }

    public function login()
    {
        $data = ['error' => null];
        $this->ensure_default_accounts();

        if ($this->io->method() === 'post') {
            $username = trim((string) $this->io->post('username'));
            $password = (string) $this->io->post('password');
            $user = $this->UserModel->get_by_username($username);

            if (!$user || !$user->is_active || !password_verify($password, $user->password)) {
                $data['error'] = 'Invalid username or password.';
            } else {
                $this->session->regenerate_on_login();
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                ]);

                $this->redirect_to('/products');
                return;
            }
        }

        $this->call->view('auth/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->redirect_to('/login');
    }

    private function ensure_default_accounts()
    {
        $accounts = [
            ['username' => 'admin', 'password' => 'Admin@123', 'role' => 'admin'],
            ['username' => 'user', 'password' => 'User@12345', 'role' => 'user'],
        ];

        foreach ($accounts as $account) {
            if (!$this->UserModel->username_exists($account['username'])) {
                $this->UserModel->create_user([
                    'username' => $account['username'],
                    'email' => $account['username'] . '@local.test',
                    'password' => password_hash($account['password'], PASSWORD_DEFAULT),
                    'role' => $account['role'],
                ]);
            }
        }
    }

    private function redirect_to($path)
    {
        header('Location: ' . $path, true, 302);
        exit;
    }
}
