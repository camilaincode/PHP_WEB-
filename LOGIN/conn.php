<?php 
     function connectar(){
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "database";
        $port = 3307;

        try {
            $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    function cadastrar_usuario($nome,$email,$senha){
        $con= connectar();
        $stmt =$con->prepare("INSERT INTO usuarios (nome,  email, senha) 
                              VALUES (:nome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();   
    }

     function get_usuario($id){
        $con= connectar();
        $stmt=$con->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);   
    }

    function finduUserByName($nome){
        $con= connectar();
        $stmt=$con->prepare("SELECT * FROM usuarios WHERE nome = :nome");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function get_usuarios(){
     $con= connectar();
     $stmt=$con->prepare("SELECT * FROM usuarios");
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function update_usuario ($id, $nome, $email, $senha){
        $con= connectar();
        $stmt=$con->prepare("UPDATE usuarios 
                              SET nome = :nome, email = :email, senha = :senha
                              WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    function delete_usuario($id){
        $con= connectar();
        $stmt =$con->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
?>