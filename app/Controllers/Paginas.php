<?php

class Paginas extends Controller
{
    public function index()
    {
        if (Sessao::estaLogado()):
            Url::redirecionar('posts');
        endif;

        $dados = [
            'tituloPagina' => 'Página Inicial'
        ];
        
        $this->view('paginas/home', $dados);
    }

    public function sobre()
    {
        $dados = [
            'tituloPagina' => 'Página Sobre Nós'
        ];
        $this->view('paginas/sobre', $dados);
    }
}
