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
    public function lerPosts()
    {       
        $this->db->query("SELECT p.*, u.nome, u.email FROM posts AS p INNER JOIN usuarios AS u ON u.id = p.usuario_id ORDER BY p.criado_em DESC");
        return $this->db->resultados();
    }

    //===============================================================
    public function lerPostPorId($id)
    {       
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind("id", $id);
        return $this->db->resultado();
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

    //===============================================================
    public function atualizar($dados)
    {
        $this->db->query("UPDATE posts SET titulo = :titulo, texto = :texto WHERE id = :id");

        $this->db->bind(":titulo", $dados['titulo']);
        $this->db->bind(":texto", $dados['texto']);
        $this->db->bind(":id", $dados['id']);

        if ($this->db->executa()):
            return true; 
        else:
            return false;
        endif;
    }

    //===============================================================
    public function destruir($id)
    {
        $this->db->query("DELETE FROM posts WHERE id = :id");

        $this->db->bind(":id", $id);

        if ($this->db->executa()):
            return true; 
        else:
            return false;
        endif;
    }

}