<?php

class Post
{
    private $db;

    //===============================================================
    public function __construct()
    {
        # injeta a classe Database
        $this->db = new Database();
    }

    //===============================================================
    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO posts SET usuario_id = :usuario_id, titulo = :titulo, texto = :texto");

        $this->db->bind(":usuario_id", $dados['usuario_id']);
        $this->db->bind(":titulo", $dados['titulo']);
        $this->db->bind(":texto", $dados['texto']);

        if ($this->db->executa()):
            return true; 
        else:
            return false;
        endif;
    }

}