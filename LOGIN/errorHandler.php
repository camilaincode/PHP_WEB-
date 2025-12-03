<?php 
class ErrorHandler {

    private static $errors = [
        'email_invalido' => 'por favor, insira um email valido!',
        'senha_curta' => 'por favor, insira uma senha com mais de 6 caracteres',
        'email_existente' => 'Este email já está cadastrado!',
        'campos_vazios' => 'Preencha todos os campos obrigatórios!',
        'senha_fraca' => 'A senha deve conter letras e números!',
        'nome_curto' => 'O nome deve ter no mínimo 3 caracteres!',
        'credenciais_invalidas' => 'Credenciais inválidas. Tente novamente.',
    ];

    public static function redirecionarError($error, $page) {
            header("Location: $page?error=$error");
            exit();
    }

    public static function getMensagemError($error) {
        return self::$errors[$error] ?? 'Erro desconhecido!';
    }

    public static function mostrarPopUp(){
        if (isset($_GET['error'])) {
            $menssagem = self::getMensagemError($_GET['error']);
            echo "
                document.addEventListener('DOMContentLoaded', function() {
                    mostrarAlerta('{$menssagem}');
                });
            ";
        }
    }
}

?>