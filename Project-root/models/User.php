<?php
require_once __DIR__ . '/../config/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

  // Buscar usuario por email
    public function findByEmail($email) {
        $database = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $database->execute([$email]);
        return $database->fetch(PDO::FETCH_ASSOC);
    }
 // Crear nuevo usuario
    public function create($username, $email, $passwordHash) {     
        $database = $this->db->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, 'user')");
        $database->execute([$username, $email, $passwordHash]);
    }
 // Obtener todos los usuarios
    public function all() {
        $database = $this->db->query("SELECT * FROM users ORDER BY created_at DESC");
        return $database->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>