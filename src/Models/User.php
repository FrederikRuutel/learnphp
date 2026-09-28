<?php

namespace App\Models;

class User extends Model {
    protected static string $table = 'users';

    public $id;
    public $name;
    public $email;
    public $password;
}