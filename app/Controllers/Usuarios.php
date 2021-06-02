<?php

class Usuarios extends Controller
{
    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)):

            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
            ];      
            
            # se houver algum campo vazio no formulário
            if (in_array("", $formulario)):
                # validações para campos vazios
                if (empty($formulario['nome'])):
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;
                if (empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo email';                
                endif;
                if (empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;
                if (empty($formulario['confirma_senha'])):
                    $dados['confirma_senha_erro'] = 'Preencha o campo confirma_senha';
                endif;            
            # se os campos estiverem todos preenchidos, seguem para outras validações
            else:
                # se o nome não possuir caracteres não alfanumericos
                if (Checa::checarNome($formulario['nome'])):
                    $dados['nome_erro'] = 'O nome informado é inválido';
                # se o email for válido
                elseif (Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O email informado é inválido';
                # se a senha tiver menos de 6 caracteres
                elseif (strlen($formulario['senha']) < 6):
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres';
                # se os campos senha e confirma senha forem diferentes
                elseif ($formulario['senha'] != $formulario['confirma_senha']):
                        $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                # se tudo estiver correto o formulário foi validado com sucesso
                else:
                    echo 'Pode cadastrar os dados<hr>';
                endif;
            endif;

            var_dump($formulario);

        else:
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
            ];      
        endif;

        $this->view('usuarios/cadastrar', $dados);
    }
}