<?php

require_once __DIR__ . '/../models/Post.php';

class PostController {
    
    private $postModel;

    public function __construct() {
        
        $this->postModel = new Post(); 
    }

    
    public function index() {
        
        $posts = $this->postModel->all();
        
        
        include __DIR__ . '/../views/posts/index.php';
    }

}