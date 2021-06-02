<?php

class Usuario
{
    private $db;

    //===============================================================
    public function __construct()
    {
        # carrega a classe Database com as instruções de banco de dados
        $this->db = new Database();
    }

    //===============================================================
    public function checarEmailExiste($email)
    {
        $this->db->query("SELECT * FROM usuarios WHERE email = :email");
        $this->db->bind("email", $email);
        if ($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    //===============================================================
    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);

        if ($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }


}