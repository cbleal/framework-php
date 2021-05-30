<?php

class Rota
{
    public function __construct() 
    {
        $this->url();

        echo '<pre>'; print_r($this->url()); exit;
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
