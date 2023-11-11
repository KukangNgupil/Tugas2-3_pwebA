<?php

// Import library
require_once __DIR__ . '/functions.php';

// Routing
$routes = [
    '/' => 'Home::index',
    '/item' => 'Item::index',
    '/item/(:num)' => 'Item::show',
    '/cart' => 'Cart::index',
    '/order' => 'Order::index',
    '/order/(:num)' => 'Order::show',
    '/contact' => 'Contact::index',
    '/login' => 'User::login_form',
    '/login?status=true' => 'User::login_save',
    '/register' => 'User::register_form',
    '/register?action=save' => 'User::register_save',
    '/profile' => 'User::profile',
    '/profile?action=edited' => 'User::profile_edited',
    '/admin' => 'Admin::login_form',
    '/admin?loggedIn=true' => 'Admin::dashboard',
];

// Get request uri
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route request
switch ($uri) {
    case '/':
        call_user_func('Home::index');
        break;
    case '/item':
        call_user_func('Item::index');
        break;
    case '/item/(:num)':
        call_user_func('Item::show');
        break;
    case '/cart':
        call_user_func('Cart::index');
        break;
    case '/order':
        call_user_func('Order::index');
        break;
    case '/order/(:num)':
        call_user_func('Order::show');
        break;
    case '/contact':
        call_user_func('Contact::index');
        break;
    case '/login':
        call_user_func('User::login_form');
        break;
    case '/login?status=true':
        call_user_func('User::login_save');
        break;
    case '/register':
        call_user_func('User::register_form');
        break;
    case '/register?action=save':
        call_user_func('User::register_save');
        break;
    case '/profile':
        call_user_func('User::profile');
        break;
    case '/profile?action=edited':
        call_user_func('User::profile_edited');
        break;
    case '/admin':
        call_user_func('Admin::login_form');
        break;
    case '/admin?loggedIn=true':
        call_user_func('Admin::dashboard');
        break;
    default:
        header('Location: /404');
}
