<?php

require_once __DIR__ . '/../config/Database.php';

class Post {
    private $db;

    public function __construct() {

        $this->db = (new Database())->getConnection(); // Conexión a la base de datos
    }

    public function all() {
        $database = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC"); //ejecuta la consulta
        return $database->fetchAll(PDO::FETCH_ASSOC); // array asociativo
    }

    public function find($id) {
        $database = $this->db->prepare("SELECT * FROM posts WHERE id = ?"); // prepara la consulta
        $database->execute([$id]);
        return $database->fetch(PDO::FETCH_ASSOC);
    }

    public function store($title, $content, $userId) { // recibe los datos para crear un post
        $database = $this->db->prepare("INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)");
        $database->execute([$title, $content, $userId]); // ejecuta la consulta con los datos
    }
}
?>