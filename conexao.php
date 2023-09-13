<?php
    function conexao($banco = 'to_do_list'){
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';

        try{
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
            return $conexao;
        }catch(PDOException $e){
            die('Erro: '. $e->getMessage());
        }
    }

    if(isset($_POST['tarefa'])){
        $tarefa = $_POST['tarefa'];
        $query = "INSERT INTO tarefas (descricao, concluida) VALUES (:descricao, 0)";
        $conexao = conexao();
        $stm = $conexao->prepare($query);
        $stm->bindParam('descricao', $tarefa); //
        $stm->execute();

        header('location: http://localhost/to_do_list');
    }

    if(isset($_GET['excluir'])){
        $conexao = conexao();
        $id = $_GET['excluir'];
        $query = "DELETE FROM tarefas WHERE id=:id";
        $stm = $conexao->prepare($query);
        $stm->bindParam('id', $id);
        $stm->execute();

        header('location: http://localhost/to_do_list');
    }

    if(isset($_GET['concluir'])){
        $conexao = conexao();
        $id = $_GET['concluir'];
        $query = "UPDATE tarefas SET concluida=1 WHERE id=:id";
        $stm = $conexao->prepare($query);
        $stm->bindParam('id', $id);
        $stm->execute();

        header('location: http://localhost/to_do_list');
    }

    if(isset($_GET['reabrir'])){
        $conexao = conexao();
        $id = $_GET['reabrir'];
        $query = "UPDATE tarefas SET concluida=0 WHERE id=:id";
        $stm = $conexao->prepare($query);
        $stm->bindParam('id', $id);
        $stm->execute();

        header('location: http://localhost/to_do_list');
    }


    $conexao = conexao();
    $query = "SELECT id,descricao,concluida FROM tarefas";
    $lista = $conexao->query($query)->fetchAll();
?>