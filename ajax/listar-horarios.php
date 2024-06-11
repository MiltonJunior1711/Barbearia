<?php 
require_once("../sistema/conexao.php");
@session_start();
$usuario = @$_SESSION['id'];

$funcionario = @$_POST['funcionario'];
$data = @$_POST['data'];
$hora_rec = @$_POST['hora'];

$hoje = date('Y-m-d');
$hora_atual = date('H:i:s');

if(strtotime($data) < strtotime($hoje)){
	echo '000';
	exit();
}

if($funcionario == ""){
	exit();
}

$diasemana = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sabado");
$diasemana_numero = date('w', strtotime($data));
$dia_procurado = $diasemana[$diasemana_numero];

//percorrer os dias da semana que ele trabalha
$query = $pdo->query("SELECT * FROM dias where funcionario = '$funcionario' and dia = '$dia_procurado'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) == 0){
		echo 'Este Funcionário não trabalha neste Dia!';
		echo '<script type="text/javascript">
            shakeForm();
          </script>';
	exit();
}else{

	$age = $pdo->query("SELECT * FROM agendamentos as ag INNER JOIN servicos as serv ON serv.id = ag.servico where ag.data = '$data' and ag.funcionario = '$funcionario' and serv.nome = 'folga'");
	$res_age = $age->fetchAll(PDO::FETCH_ASSOC);

	if(@count($res_age) > 0){
		echo 'Este Funcionário não trabalha neste Dia!';
	exit();
	}
	else
	{
		$inicio = $res[0]['inicio'];
		$final = $res[0]['final'];
		$inicio_almoco = $res[0]['inicio_almoco'];
		$final_almoco = $res[0]['final_almoco'];
	}

}

$query = $pdo->query("SELECT * FROM usuarios where id = '$funcionario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$intervalo = $res[0]['intervalo'];


?>
<div class="row">

	<?php 
	$i = 0;
	while (strtotime($inicio) <= strtotime($final)){
	
	if(strtotime($inicio) >= strtotime($inicio_almoco) and strtotime($inicio) < strtotime($final_almoco)){
		$hora_minutos = strtotime("+$intervalo minutes", strtotime($inicio));			
		$inicio = date('H:i:s', $hora_minutos);
	}else{
			
				$hora = $inicio;
				$horaF = date("H:i", strtotime($hora));
				$dataH = '';

				//validar horario
$query2 = $pdo->query("SELECT * FROM agendamentos where data = '$data' and hora = '$hora' and funcionario = '$funcionario'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

$total_reg2 = @count($res2);
if($total_reg2 == 0 || strtotime($hora_rec) == strtotime($hora)){
	$hora_agendada = '';
	$texto_hora = '';

	if(strtotime($hora_rec) == strtotime($hora)){
		$checado = 'checked';
	}else{
		$checado = '';
	}

	if(strtotime($hora) < strtotime($hora_atual) and strtotime($data) == strtotime($hoje)){
		$esconder = 'none';
	}else{
		$esconder = '';
				
		//VERIFICAR NA TABELA HORARIOS AGD SE TEM O HORARIO NESSA DATA
		$query_agd = $pdo->query("SELECT * FROM horarios_agd where data = '$data' and funcionario = '$funcionario' and horario = '$hora'");
		$res_agd = $query_agd->fetchAll(PDO::FETCH_ASSOC);
		if(@count($res_agd) > 0){
			$esconder = 'none';			
		}else{
			$esconder = '';
			$i += 1;
		}

	}



	if(strtotime($dataH) != strtotime($data) and $dataH != "" and $dataH != "null"){
		continue;
	}	
				?>

					<div class="col-3" style='display: <?php echo $esconder ?>'>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="hora" value="<?php echo $hora ?>" <?php echo $hora_agendada ?> style="width:17px; height: 17px; " required <?php echo $checado ?>>
					  <label class="form-check-label <?php echo $texto_hora ?>" for="flexRadioDefault1">
					    <?php echo $horaF ?>
					  </label>
					</div>
				</div> 

				<?php 
				
		}

		$hora_minutos = strtotime("+$intervalo minutes", strtotime($inicio));			
$inicio = date('H:i:s', $hora_minutos);

	}
}
	
	if($i == 0){
		echo '<div align="center"> <small>Não temos mais horários disponíveis com este funcionário para essa data!</small></div>';
		echo '<script type="text/javascript">
            shakeForm();
          </script>';
	}
	?>


</div>


<script type="text/javascript">

function shakeForm() {
	var form = document.getElementById('form-agenda');
  // Adiciona a classe de tremor ao formulário
  	form.classList.add('shake');
  
  // Remove a classe após a animação
	form.addEventListener('animationend', function() {
    form.classList.remove('shake');
  }, { once: true });
}
</script>