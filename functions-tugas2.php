<?php

// Function untuk memanggil view
function view($view, $data = [])
{
    // Load view
    $view_file = __DIR__ . '/../view/' . $view . '.php';
    include $view_file;
}

// Function untuk memanggil view dengan controller
function view_with_controller($controller, $method, $data = [])
{
    // Load view
    $view_file = __DIR__ . '/../view/' . $controller . '/' . $method . '.php';
    include $view_file;
}
