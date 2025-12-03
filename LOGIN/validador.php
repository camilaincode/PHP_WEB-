<?php 
class Validador{
    public static function validarEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('email_invalido');
        }
        return true;
    }

    public static function validarSenha($senha) {
        if (strlen($senha) < 6) {
            throw new Exception('senha_curta');
        }
        
        if (!preg_match('/[A-Za-z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
            throw new Exception('senha_fraca');
        }
        
        return true;
    }

    public static function validarCampos($campos) {
        foreach ($campos as $campo => $valor) {
            if (empty(trim($valor))) {
                throw new Exception('campos_vazios');
            }
        }
        return true;
    }

    public static function validarNome($nome){
        if(strlen($nome) < 3){
             throw new Exception('nome_curto');
        }
        return true;
    }

}
?>