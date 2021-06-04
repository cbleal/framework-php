<?php

class Posts extends Controller
{
    //===============================================================
    public function __construct()
    {
        # verificar se o usuario está logado (na sessão)
        if (!Sessao::estaLogado()):
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

    //===============================================================
    public function cadastrar()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :

            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
            ];

            # se houver algum campo vazio no formulário
            if (in_array("", $formulario)) :
                # validações para campos vazios
                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;
                if (empty($formulario['texto'])) :
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;
                
            # se os campos estiverem todos preenchidos, seguem para outras validações
            else :
               
              echo 'Pode cadastrar<hr>';
              
            endif;

            var_dump($formulario);

        else :
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        endif;

        # chama a view cadastrar passando os dados
        $this->view('posts/cadastrar', $dados);
    }
}