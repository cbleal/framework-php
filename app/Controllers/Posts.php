<?php

class Posts extends Controller
{
    //===============================================================
    public function __construct()
    {
        # verificar se o usuario está logado (na sessão)
        if (!isset($_SESSION['usuario_id'])):
            # manda para a view login
            Url::redirecionar('usuarios/login');
        endif;
    }

    //===============================================================
    public function index()
    {
        # mandar para a view index de posts
        $this->view('posts/index');
    }
}