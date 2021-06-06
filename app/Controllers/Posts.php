<?php

class Posts extends Controller
{
    //===============================================================
    public function __construct()
    {
        # verificar se o usuario está logado (na sessão)
        if (!Sessao::estaLogado()) :
            # manda para a view login
            Url::redirecionar('usuarios/login');
        endif;

        $this->postModel = $this->model('Post');
        $this->usuarioModel = $this->model('Usuario');
    }

    //===============================================================
    public function index()
    {
        # array que recebe uma lista de posts
        $dados = [
            'posts' => $this->postModel->lerPosts()
        ];

        # mandar para a view index de posts
        $this->view('posts/index', $dados);
    }

    //===============================================================
    public function cadastrar()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :

            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'usuario_id' => $_SESSION['usuario_id'],
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

                if ($this->postModel->armazenar($dados)) :
                    Sessao::alerta('post', 'Post Cadastrado com Sucesso');
                    Url::redirecionar('posts');
                else :
                    die('Erro ao escrever o Post');
                endif;

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

    //===============================================================
    public function ver($id)
    {
        $post = $this->postModel->lerPostPorId($id);

        if ($post == null):
            Url::redirecionar('paginas/error');
        endif;

        $usuario = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);
        $dados = [
            'post' => $post,
            'usuario' => $usuario,
        ];

        $this->view('posts/ver', $dados);
    }

    //===============================================================
    public function editar($id)
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :

            $dados = [
                'id' => $id,
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
      
            else :

                if ($this->postModel->atualizar($dados)) :
                    Sessao::alerta('post', 'Post Atualizado com Sucesso');
                    Url::redirecionar('posts');
                else :
                    die('Erro ao atualizar o Post');
                endif;

            endif;

        // var_dump($formulario);

        else :

            $post = $this->postModel->lerPostPorId($id);

            # se o id do usuairio do post for diferente do id do usuario da sessão
            if ($post->id != $_SESSION['usuario_id']) :
                # coloca mensagem na sessão
                Sessao::alerta('post', 'Você não tem autorização para editar este post');
                # volta para posts
                Url::redirecionar('posts');
            endif;

            $dados = [
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        endif;

        $this->view('posts/editar', $dados);
    }

    //===============================================================
    public function deletar($id)
    {
        if ($this->checarAutorizacao($id)) :

            $id = filter_var($id, FILTER_VALIDATE_INT);
            $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if (is_int($id) && $metodo == 'POST') :
                if ($this->postModel->destruir($id)) :
                    Sessao::alerta('post', 'Post apagado com sucesso');
                    Url::redirecionar('posts');
                endif;
            else :
                Sessao::alerta('post', 'Você não tem autorização para deletar este Post', 'alert alert-danger');
                Url::redirecionar('posts');
            endif;
        else :
            Sessao::alerta('post', 'Você não tem autorização para deletar este Post', 'alert alert-danger');
            Url::redirecionar('posts');
        endif;
    }

    //===============================================================
    private function checarAutorizacao($id)
    {
        // $post = $this->postModel->lerPostPorId($id);

        if ($id != $_SESSION['usuario_id']) :
            return true;
        else :
            return false;
        endif;
    }
}
