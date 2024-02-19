<?php 
@session_start();
require_once("conexao.php");


$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

if (is_numeric($email) && strlen($email) === 11) {
    $email = substr($email, 0, 3) . '.' . substr($email, 3, 3) . '.' . substr($email, 6, 3) . '-' . substr($email, 9, 2);
}

$query = $pdo->prepare("SELECT * from usuarios where (email = :email or cpf = :email) and senha_crip = :senha");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total_reg = @count($res);
if($total_reg > 0){
	$ativo = $res[0]['ativo'];


	if($ativo == 'Sim'){

		$_SESSION['id'] = $res[0]['id'];
		$_SESSION['nivel'] = $res[0]['nivel'];
		$_SESSION['nome'] = $res[0]['nome'];
	
		//ir para o painel
		echo "<script>window.location='painel'</script>";
	}else{
		echo "<script>window.alert('Seu usuário foi desativado, contate o administrador!')</script>";
	echo "<script>window.location='index.php'</script>";
	}
	
}else{
	echo "<script>window.alert('Usuário ou Senha Incorretos!')</script>";
	echo "<script>window.location='index.php'</script>";
}

 ?>