<?php

class Sessao
{
    //===============================================================
    public static function alerta($nome, $mensagem = null, $classe = null)
    {
        # se o parametro nome não for vazio
        if (!empty($nome)) :
            # se a mensagem não for vazia e não existir sessão
            if (!empty($mensagem) && empty($_SESSION[$nome])) :

                # apagar a mensagem de exibição
                if (!empty($_SESSION[$nome])) :
                    # apagar da sessão
                    unset($_SESSION[$nome]);
                endif;

                # criar na sessão a mensagem e a classe
                $_SESSION[$nome] = $mensagem;
                $_SESSION[$nome . 'classe'] = $classe;
            # se a mensagem for vazia e existir sessão
            elseif (empty($mensagem) && !empty($_SESSION[$nome])) :
                # definir a classe
                $classe = !empty($_SESSION[$nome . 'classe']) ? $_SESSION[$nome . 'classe'] : 'alert alert-success';
                # montar o html da mensagem
                echo '<div class="' . $classe . '">' . $_SESSION[$nome] . '</div>';
                # apagar da sessão
                unset($_SESSION[$nome]);
                unset($_SESSION[$nome . 'classe']);
            endif;
        endif;
    }

    //===============================================================
    public static function estaLogado()
    {
        if (isset($_SESSION['usuario_id'])):
           return true;
        else:
            return false;
        endif;
    }
}
