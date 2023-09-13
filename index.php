<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de tarefas</title>
        <link rel="stylesheet" href="styles.css">
        
    </head>
    <body>
        <form method="post">
            Nova tarefa: <input type="text" name="tarefa"/>
            <input type="submit" value="Incluir" />
        </form>   
        <div class="lista">
            <ul>
                <?php foreach($lista as $item): ?>
                    <li <?= $item['concluida']?'class="concluida"':''?> >  
                        <?=$item['descricao']?>
                        <?php if(!$item['concluida']): ?>
                            <a href="?concluir=<?= $item['id']?>">[Concluido]</a>
                            <?php else: ?>
                                <a href="?reabrir=<?= $item['id']?>">[Reabrir]</a>
                         <?php endif;?>
                        <a href="?excluir=<?= $item['id']?>">[Excluir]</a>
                    </li>
                    <?php endforeach; ?>   
                </ul>
            </div>
            
    </body>

</html>