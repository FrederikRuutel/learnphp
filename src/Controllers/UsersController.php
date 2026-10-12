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

    public function view()
    {
        $user = $this->findUser();
        if ($user) {
            $title = 'View User';
            view('users/view', compact('title', 'user'));
        }
    }

    public function create()
    {
        $title = 'New User';
        $user = new User();
        $errors = [];
        view('users/create', compact('title', 'user', 'errors'));
    }

    public function store()
    {
        if (!$this->validToken()) {
            return;
        }

        $user = new User();
        $errors = $this->validateUser($user, true);
        if ($errors) {
            http_response_code(422);
            $title = 'New User';
            view('users/create', compact('title', 'user', 'errors'));
            return;
        }

        $user->save();
        redirect('/admin/users');
    }

    public function edit()
    {
        $user = $this->findUser();
        if ($user) {
            $title = 'Edit User';
            $errors = [];
            view('users/edit', compact('title', 'user', 'errors'));
        }
    }

    public function update()
    {
        if (!$this->validToken()) {
            return;
        }
        $user = $this->findUser();
        if (!$user) {
            return;
        }

        $errors = $this->validateUser($user);
        if ($errors) {
            http_response_code(422);
            $title = 'Edit User';
            view('users/edit', compact('title', 'user', 'errors'));
            return;
        }

        $user->save();
        redirect('/admin/users');
    }

    private function validateUser(User $user, bool $creating = false): array
    {
        $user->name = trim(is_string($_POST['name'] ?? null) ? $_POST['name'] : '');
        $user->email = trim(is_string($_POST['email'] ?? null) ? $_POST['email'] : '');
        $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';
        $confirmation = is_string($_POST['password_confirm'] ?? null) ? $_POST['password_confirm'] : '';
        $errors = [];

        if ($user->name === '' || mb_strlen($user->name) > 255) {
            $errors[] = 'Enter a name between 1 and 255 characters.';
        }
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL) || strlen($user->email) > 254) {
            $errors[] = 'Enter a valid email address.';
        } else {
            foreach (User::where('email', $user->email) as $existingUser) {
                if ((int) $existingUser->id !== (int) $user->id) {
                    $errors[] = 'This email address is already in use.';
                }
            }
        }

        if ($creating || $password !== '' || $confirmation !== '') {
            if (strlen($password) < 8 || strlen($password) > 72) {
                $errors[] = 'Use a password between 8 and 72 bytes.';
            }
            if (str_contains($password, chr(0))) {
                $errors[] = 'The password contains an invalid character.';
            }
            if ($password !== $confirmation) {
                $errors[] = 'The passwords do not match.';
            }
            if (!$errors) {
                $user->password = password_hash($password, PASSWORD_BCRYPT);
            }
        }

        return $errors;
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
