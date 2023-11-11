<?php

abstract class Model {
    protected static $conn;

    public static function init($connection) {
        self::$conn = $connection;
    }

    abstract public static function select();
    abstract public static function selectById($id);
    abstract public static function insert($data);
    abstract public static function update($id, $data);
    abstract public static function delete($id);
}
?>
