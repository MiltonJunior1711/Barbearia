<?php 
require_once("conexao.php");

$email = $_POST['email'];

$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$senha = $res[0]['senha'];

	//envio do email
	$destinatario = $email;
    $assunto = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nome_sistema)). ' - recuperacao de senha';
    $mensagem = 'Sua senha e ' .$senha;
    $cabecalhos = "From: ".$email_sistema;
   
    if(mail($destinatario, $assunto, $mensagem, $cabecalhos)){
           echo 'Recuperado com Sucesso'; 
    }
    else{
       	echo 'Email não enviado'; 
    }

}else{
	echo 'Esse email não está Cadastrado!';
}

 ?>