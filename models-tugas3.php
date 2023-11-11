<?php

require_once 'abstract-tugas3.php';
require_once 'config/conn.php'; // Include your database connection file

class Students extends Model {
    public static function init($connection) {
        parent::$conn = $connection;
    }

    public static function select() {
        global $conn;
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $arr = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }

    public static function selectById($id) {
        global $conn;
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }

    public static function insert($data) {
        global $conn;
        $sql = "INSERT INTO students (id, name, email, role_fk) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isss', $data['id'], $data['name'], $data['email'], $data['role_fk']);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    public static function update($id, $data) {
        global $conn;
        $sql = "UPDATE students SET name=?, email=?, role_fk=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssii', $data['name'], $data['email'], $data['role_fk'], $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    public static function delete($id) {
        global $conn;
        $sql = "DELETE FROM students WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
}

class Roles {
    static function select() {
        global $conn;
        $sql = "SELECT * FROM roles";
        $result = $conn->query($sql);
        $arr = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }

    // Other methods for the Roles class can be added here
}

?>
