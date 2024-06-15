<?php 
require_once("../../../conexao.php");
$tabela = 'dias';

$id = $_POST['id'];
$id_dias = $_POST['id_d'];
$dias = $_POST['dias'];
$inicio = $_POST['inicio'];
$final = $_POST['final'];
$inicio_almoco = $_POST['inicio_almoco'];
$final_almoco = $_POST['final_almoco'];

// Se está sendo feita uma edição, precisamos verificar se os novos dados já existem em outro registro, excluindo o próprio registro atual
if ($id_dias != '') {
    $query = $pdo->prepare("SELECT COUNT(*) FROM $tabela WHERE dia = :dia AND funcionario = :funcionario AND id != :id_dias");
    $query->bindParam(':id_dias', $id_dias);
} else {
    // Se é uma inserção, a verificação de duplicidade é feita normalmente
    $query = $pdo->prepare("SELECT COUNT(*) FROM $tabela WHERE dia = :dia AND funcionario = :funcionario");
}
$query->bindParam(':dia', $dias);
$query->bindParam(':funcionario', $id);
$query->execute();

$count = $query->fetchColumn();

if ($count > 0) {
    echo 'Erro: Já existe um registro para este dia da semana. Tente editar ou apagar o registro existente.';
} else {
    if ($id_dias == '') {
        $stmt = $pdo->prepare("INSERT INTO $tabela (dia, inicio, final, funcionario, inicio_almoco, final_almoco) VALUES (:dia, :inicio, :final, :funcionario, :inicio_almoco, :final_almoco)");
    } else {
        $stmt = $pdo->prepare("UPDATE $tabela SET dia = :dia, inicio = :inicio, final = :final, funcionario = :funcionario, inicio_almoco = :inicio_almoco, final_almoco = :final_almoco WHERE id = :id_dias");
        $stmt->bindParam(':id_dias', $id_dias);
    }

    $stmt->bindParam(':dia', $dias);
    $stmt->bindParam(':inicio', $inicio);
    $stmt->bindParam(':final', $final);
    $stmt->bindParam(':funcionario', $id);
    $stmt->bindParam(':inicio_almoco', $inicio_almoco);
    $stmt->bindParam(':final_almoco', $final_almoco);

    $stmt->execute();
    
    echo 'Salvo com Sucesso';
}
?>