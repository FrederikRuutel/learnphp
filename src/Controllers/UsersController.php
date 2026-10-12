<?php

namespace App\Controllers;

use App\Models\User;

class UsersController
{
    public function __construct()
    {
        if (!auth()) {
            redirect('/login');
            exit;
        }

        $_SESSION['users_csrf_token'] ??= bin2hex(random_bytes(32));
    }

    public function index()
    {
        $users = User::all();
        $title = 'Users';
        view('users/index', compact('title', 'users'));
    }

    private function findUser()
    {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        $user = $id === false ? false : User::find($id);

        if (!$user) {
            http_response_code(404);
            echo '404 User not found';
        }

        return $user;
    }

    private function validToken(): bool
    {
        $token = $_POST['csrf_token'] ?? '';
        if (!is_string($token) || !hash_equals($_SESSION['users_csrf_token'], $token)) {
            http_response_code(403);
            echo 'Invalid form token. Reload the form and try again.';
            return false;
        }

        return true;
    }
}
