<?php

class Usuarios extends Controller
{
    //===============================================================
    public function __construct()
    {
        # carrega o model Usuario
        $this->usuarioModel = $this->model('Usuario');
    }

    //===============================================================
    public function cadastrar()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :

            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
            ];

            # se houver algum campo vazio no formulário
            if (in_array("", $formulario)) :
                # validações para campos vazios
                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;
                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;
                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;
                if (empty($formulario['confirma_senha'])) :
                    $dados['confirma_senha_erro'] = 'Preencha o campo confirma_senha';
                endif;
            # se os campos estiverem todos preenchidos, seguem para outras validações
            else :
                # se o nome não possuir caracteres não alfanumericos
                if (Checa::checarNome($formulario['nome'])) :
                    $dados['nome_erro'] = 'O nome informado é inválido';
                # se o email for válido
                elseif (Checa::checarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'O email informado é inválido';
                # se o email já existir no banco de dados
                elseif ($this->usuarioModel->checarEmailExiste($formulario['email'])) :
                    $dados['email_erro'] = 'O email informado já existe';
                # se a senha tiver menos de 6 caracteres
                elseif (strlen($formulario['senha']) < 6) :
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres';
                # se os campos senha e confirma senha forem diferentes
                elseif ($formulario['senha'] != $formulario['confirma_senha']) :
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                # se tudo estiver correto o formulário foi validado com sucesso
                else :
                    # cria o hash para senha
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);
                    # chama o metodo para armazenar no banco de dados
                    if ($this->usuarioModel->armazenar($dados)) :
                        echo 'Cadastrado com sucesso.<hr>';
                    else :
                        echo 'Erro ao cadastrar.<hr>';
                    endif;
                endif;
            endif;

            var_dump($formulario);

        else :
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];
        endif;

        # chama a view cadastrar passando os dados
        $this->view('usuarios/cadastrar', $dados);
    }

    //===============================================================
    public function login()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :

            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];

            # se houver algum campo vazio no formulário
            if (in_array("", $formulario)) :
                # validações para campos vazios               
                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;
                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;                
            # se os campos estiverem todos preenchidos, seguem para outras validações
            else :                
                # se o email for válido
                if (Checa::checarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'O email informado é inválido';
                else :
                    if ($this->usuarioModel->checarLogin($formulario['email'], $formulario['senha'])):
                        echo 'Login efetuado com sucesso.';
                    else:
                        echo 'E-mail e/ou senha inválidos.';
                    endif;
                endif;
            endif;

            var_dump($formulario);

        else :
            $dados = [
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => '',
            ];
        endif;

        # chama a view login passando os dados
        $this->view('usuarios/login', $dados);
    }
}
