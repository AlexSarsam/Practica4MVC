<?php
//Este es el front controller
session_start();


require_once __DIR__ . '/config/Database.php'; 
require_once __DIR__ . '/controllers/PostController.php';
require_once __DIR__ . '/controllers/UserController.php';

$action = $_GET['action'] ?? 'posts';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'posts': // cargar lista de posts
        (new PostController())->index();
        break;
    case 'show_post':
        break;
    case 'register':
        (new UserController())->register();
        break;
    case 'login':
        (new UserController())->login();
        break;
    case 'logout':
        session_destroy();
        header("Location: index.php?action=login");
        break;
    default:
        (new PostController())->index();
        break;
}