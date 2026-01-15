<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

 
    public function login() {
        $error = null; 


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $email = trim($_POST['email']); 
            $pass = $_POST['password'];

            $user = $this->userModel->findByEmail($email);
            
            if ($user && password_verify($pass, $user['password_hash'])) {
                // Login correcto: Guardamos datos en sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['username'] = $user['username'];
         
                
                header("Location: index.php?action=posts");
                exit(); 
            } else {
                
                $error = "Credenciales incorrectas.";
            }
        } 
        
        
        include __DIR__ . '/../views/auth/login.php';
    }

    
    public function register() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->userModel->create($username, $email, $passwordHash);
            
            header("Location: index.php?action=login");
            exit();
        } 
        
      
        include __DIR__ . '/../views/auth/register.php';
    }
}
?>