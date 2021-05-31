<?php

class Rota
{
    private $controlador = 'Paginas';
    private $metodo = 'index';
    private $parametros = [];

    public function __construct() 
    {
        $url = $this->url() ? $this->url() : [0];        

        # controlador
        if (isset($url)):
            if (file_exists('../app/Controllers/'.ucwords($url[0]).'.php')):
                $this->controlador = ucwords($url[0]);
                unset($url[0]);
            endif;
        endif;

        # requerer o controlador
        require_once '../app/Controllers/'.$this->controlador.'.php';
        # instanciar a classe controlador
        $this->controlador = new $this->controlador;

        # metodo       
        if (isset($url[1])):
            if (method_exists($this->controlador, $url[1])):
                $this->metodo = $url[1];
                unset($url[1]);
            endif;
        endif;

        # parametros       
        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

        // echo '<pre>'; print_r($this); exit;
    }

    private function url()
    {
        if (isset($_GET['url'])):
            # limpar a URL
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            # remover espaços e '/'
            $url = trim(rtrim($url, '/'));
            # transformar a string url em um array
            $url = explode('/', $url);
            # retorna a url
            return $url;
        endif;
    }
}
