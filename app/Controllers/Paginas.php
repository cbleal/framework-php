<?php

class Paginas extends Controller
{
    public function index()
    {
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
