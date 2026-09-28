<?php

namespace App\Models;

use App\DB;

abstract class Model {
    public $id;
    protected static string $table;

    public static function all() {
        $db = new DB();
        return $db->all(static::$table, static::class);
    }
}