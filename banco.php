<?php



$bdServidor = '127.0.0.1';
$bdUsuario = 'viniide';
$bdSenha = '040691vini';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_error($conexao)) {
    echo "Problemas para conectar no banco";
    die();
}

function buscar_tarefas($conexao){

    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)){
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}

function gravar_tarefa($conexao, $tarefa) {
    $sqlGravar = "INSERT INTO tarefas
                  (nome, descricao, prioridade, prazo, concluida)
                  VALUES
                  (
                    '{$tarefa['nome']}',
                    '{$tarefa['descricao']}',
                    '{$tarefa['prioridade']}',
                    '{$tarefa['prazo']}',
                    '{$tarefa['concluida']}'    
                  )
                  ";

    mysqli_query($conexao, $sqlGravar);

}

?>