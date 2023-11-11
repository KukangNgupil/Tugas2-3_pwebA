<?php

require_once 'models-tugas3.php';

class RoleController {
    static function index() {
        view('subview/roles', [
            'roles' => Roles::select(),
            'header' => titleheader('Read data scr AJAX dgn jQuery', 'h1', 'text-center mb-3')
        ]);
    }

    static function getRoles($id) {
        $result = Roles::selectById($id);
        
        // You can return the result as JSON
        echo json_encode($result);
    }
}
?>
