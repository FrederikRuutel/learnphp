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

    public static function find($id) {
        $db = new DB();
        return $db->find(static::$table, static::class, $id);
    }

    public static function where($fieldName, $value) {
        $db = new DB();
        return $db->where(static::$table, static::class, $fieldName, $value);
    }

    public function save() {
        $fields = get_object_vars($this);
        unset($fields['id']);
        $db = new DB();
        if($this->id) {
            $db->update(static::$table, $fields, $this->id);
        } else {
            $db->insert(static::$table, $fields);
        }
    }

    public function delete() {
        $db = new DB();
        $db->delete(static::$table, $this->id);
    }
}