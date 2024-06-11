<?php 
session_start();
require_once("cabecalho.php");
$data_atual = date('Y-m-d');

$telefone = isset($_SESSION['telefone']) ? $_SESSION['telefone'] : '';

$query = $pdo->query("SELECT * FROM clientes where telefone = '$telefone' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_cliente = $res[0]['id'];

if(!isset($id_cliente) || $id_cliente === null || $id_cliente === 0){
	echo "<script>window.alert('Não existe agendamentos para este número! ')</script>";
	echo "<script>window.location='agendamentos.php'</script>";
}

?>
<style type="text/css">
.sub_page .hero_area {
    min-height: auto;
}
</style>

<div class="footer_section" style="background: #4444459A; ">
    <div class="container">
        <div class="footer_content ">

            <?php
			$query = $pdo->query("SELECT * FROM agendamentos where cliente = '$id_cliente' and status = 'Agendado' ORDER BY data asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
$id = $res[$i]['id'];
$funcionario = $res[$i]['funcionario'];
$cliente = $res[$i]['cliente'];
$hora = $res[$i]['hora'];
$data = $res[$i]['data'];
$usuario = $res[$i]['usuario'];
$data_lanc = $res[$i]['data_lanc'];
$obs = $res[$i]['obs'];
$status = $res[$i]['status'];
$servico = $res[$i]['servico'];

$dataF = implode('/', array_reverse(explode('-', $data)));
$horaF = date("H:i", strtotime($hora));


if($status == 'Concluído'){		
	$classe_linha = '';
}else{		
	$classe_linha = 'text-muted';
}



if($status == 'Agendado'){
	$imagem = 'icone-relogio.png';
	$classe_status = '';	
}else{
	$imagem = 'icone-relogio-verde.png';
	$classe_status = 'ocultar';
}

$query2 = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
	$nome_usu = $res2[0]['nome'];
}else{
	$nome_usu = 'Sem Usuário';
}

$query2 = $pdo->query("SELECT * FROM usuarios where id = '$funcionario'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
	$nome_func = $res2[0]['nome'];
}else{
	$nome_func = 'Sem Usuário';
}


$query2 = $pdo->query("SELECT * FROM servicos where id = '$servico'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
	$nome_serv = $res2[0]['nome'];
	$valor_serv = $res2[0]['valor'];
}else{
	$nome_serv = 'Não Lançado';
	$valor_serv = '';
}


$query2 = $pdo->query("SELECT * FROM clientes where id = '$cliente'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
	$nome_cliente = $res2[0]['nome'];
	$total_cartoes = $res2[0]['cartoes'];
}else{
	$nome_cliente = 'Sem Cliente';
	$total_cartoes = 0;
}

if($total_cartoes >= $quantidade_cartoes and $status == 'Agendado'){
	$ocultar_cartoes = '';
}else{
	$ocultar_cartoes = 'ocultar';
}

//retirar aspas do texto do obs
$obs = str_replace('"', "**", $obs);

?>

            <div class="list-group">

                <div class="list-group-item list-group-item-action flex-column align-items-start "
                    style="margin-bottom: 10px">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><small> <i class="fa fa-calendar" aria-hidden="true"></i> Data:
                                <?php echo $dataF ?> <i class="fa fa-clock-o text-success" aria-hidden="true"
                                    style="margin-left: 10px"></i> Hora: <?php echo $horaF ?></small></h5>
                        <small><a href="#"
                                onclick="buscarNome();excluir('<?php echo $id ?>', '<?php echo $nome_cliente ?>', '<?php echo $dataF ?>', '<?php echo $horaF ?>', '<?php echo $nome_serv ?>', '<?php echo $nome_func ?>')"><i
                                    class="fa fa-trash-o text-danger" aria-hidden="true"></i> </a>
                            <a href="#" onclick="showOverlay()">
                                <i class="fa fa-calendar text-danger" aria-hidden="true"></i>
                            </a>
                        </small>

                    </div>
                    <p class="mb-1"><small>Funcionário: <?php echo $nome_func ?></small></p>
                    <small><b>Serviço:</b> <?php echo $nome_serv ?> <b>Valor:</b> R$ <?php echo $valor_serv ?></small>
                </div>
            </div>



            <?php
}

}else{
	echo '<span style="color: white;">Nenhum horário agendado!</span>';
}

?>
            <br>
            <br>
            <br>
            <div id=" listar-cartoes" align="center">
                <div id="listar-cartoes" align="center">
                    <div id="listar-cartoes" align="center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>




</div>





</div>

<?php require_once("rodape.php") ?>


<!-- Modal Excluir -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><small>Excluir Agendamento</small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px"
                    id="btn-fechar-excluir">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form-excluir">
                <div class="modal-body">

                    <span id="msg-excluir"></span>

                    <input type="hidden" name="id" id="nome_excluir">
                    <input type="hidden" name="id" id="data_excluir">
                    <input type="hidden" name="id" id="hora_excluir">
                    <input type="hidden" name="id" id="servico_excluir">
                    <input type="hidden" name="id" id="func_excluir">
                    <input type="hidden" name="id" id="id_excluir">

                    <br>
                    <small>
                        <div id="mensagem-excluir" align="center"></div>
                    </small>

                    <div align="right"><button type="submit" class="btn btn-danger">Excluir</button></div>
                </div>


            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja alterar o horário Agendado ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <br>
                <div class="footer_content ">
                    <form id="form-agenda" method="post" style="margin-top: -25px !important">
                        <div class="footer_form footer-col">
                            <div class="form-group">

                                <div class="form-group" style="display: none;">
                                    <input onchange="buscarNome()" class="form-control" type="text" name="telefone"
                                        id="telefone" placeholder="Seu Telefone DDD + número"
                                        value="<?php echo htmlspecialchars($telefone); ?>" />
                                </div>

                                <div class="form-group" style="display: none;">
                                    <input onclick="buscarNome()" class="form-control" type="text" name="nome" id="nome"
                                        placeholder="Seu Nome" value="<?php echo htmlspecialchars($nome); ?>" />
                                </div>

                                <div class="form-group">
                                    <input onchange="mudarFuncionario()" class="form-control" type="date" name="data"
                                        id="data" value="<?php echo $data_atual ?>" required />
                                </div>


                                <!-- <input onchange="mudarFuncionario()" class="form-control" type="date" name="data"
                                    id="data"
                                    value="<?php echo date('Y-m-d', strtotime(str_replace('/', '-', $dataF))); ?>"
                                    required /> -->


                                <!-- antes usava data_atual   -->
                            </div>
                            <div class="form-group">
                                <select onchange="mudarServico()" class="form-control sel2" id="servico" name="servico"
                                    style="width:100%;" required>
                                    <option value="">Selecione um Serviço</option>

                                    <?php 
						$query = $pdo->query("SELECT * FROM servicos WHERE nome != 'folga' ORDER BY nome asc");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						$total_reg = @count($res);									
						if($total_reg > 0){
							for($i=0; $i < $total_reg; $i++){
								foreach ($res[$i] as $key => $value){}
									$valor = $res[$i]['valor'];
								$valorF = number_format($valor, 2, ',', '.');

								echo '<option value="'.$res[$i]['id'].'">'.$res[$i]['nome'].' - R$ '.$valorF.'</option>';
                                
							}
						}
						?>


                                </select>
                            </div>


                            <div class="form-group">
                                <select class="form-control sel2" id="funcionario" name="funcionario"
                                    style="width:100%;" onchange="mudarFuncionario()" required>
                                    echo '<option value=""><?php echo $texto_agendamento ?>
                                    </option>';

                                </select>
                            </div>
                            <div class="form-group">
                                <div id="listar-horarios">
                                </div>
                            </div>
                            <div class="form-group">
                                <input maxlength="100" type="text" class="form-control" name="obs" id="obs"
                                    placeholder="Observações caso exista alguma.">
                            </div>
                            <br>

                            <small>
                                <div id="mensagem-alterar" align="center"></div>
                            </small>

                            <br>

                            <input type="text" id="data_oculta" style="display: none">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="hora_rec" nome="hora_rec">
                            <input type="hidden" id="nome_func" nome="nome_func">
                            <input type="hidden" id="data_rec" nome="data_rec">
                            <input type="hidden" id="nome_serv" nome="nome_serv">
                        </div>
                        <div id="listar-cartoes" style="margin-top: -30px"></div>

                        <br>
                        

                        <button class="btn btn-success" type="submit">Alterar
                            Agendamento</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
var header = $('#main-header');
header.css('background-color', '#0e3746', 'important');
</script>

<script type="text/javascript">
function showOverlay() {
    $('#overlay').modal('show');
    buscarNome();
}
</script>

<script type="text/javascript">
function mudarServico() {
    listarFuncionarios()
    var serv = $("#servico").val();

    $.ajax({
        url: "ajax/listar-servico.php",
        method: 'POST',
        data: {
            serv
        },
        dataType: "text",

        success: function(result) {
            $("#nome_serv").val(result);
        }
    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    var tel = "<?=$telefone?>";
    listarCartoes(tel)
});
</script>

<script type="text/javascript">
function mudarFuncionario() {
    var funcionario = $('#funcionario').val();
    var data = $('#data').val();
    var hora = $('#hora_rec').val();

    listarHorarios(funcionario, data, hora);
    listarFuncionario();

}
</script>

<script type="text/javascript">
function listarFuncionarios() {
    var serv = $("#servico").val();

    $.ajax({
        url: "ajax/listar-funcionarios.php",
        method: 'POST',
        data: {
            serv
        },
        dataType: "text",

        success: function(result) {
            $("#funcionario").html(result);
        }
    });
}
</script>

<script type="text/javascript">
function listarFuncionario() {
    var func = $("#funcionario").val();

    $.ajax({
        url: "ajax/listar-funcionario.php",
        method: 'POST',
        data: {
            func
        },
        dataType: "text",

        success: function(result) {
            $("#nome_func").val(result);
        }
    });
}
</script>

<script type="text/javascript">
function excluir(id, nome, data, hora, servico, func) {

    $('#id_excluir').val(id);

    $('#nome_excluir').val(nome);
    $('#data_excluir').val(data);
    $('#hora_excluir').val(hora);
    $('#servico_excluir').val(servico);
    $('#func_excluir').val(func);

    $('#modalExcluir').modal('show');

}

function excluirSemModal(id, nome, data, hora, servico, func) {

    $('#id_excluir').val(id);
    $('#nome_excluir').val(nome);
    $('#data_excluir').val(data);
    $('#hora_excluir').val(hora);
    $('#servico_excluir').val(servico);
    $('#func_excluir').val(func);

    var formData = new FormData();
    formData.append('id', $('#id_excluir').val());
    formData.append('nome', $('#nome_excluir').val());
    formData.append('data', $('#data_excluir').val());
    formData.append('hora', $('#hora_excluir').val());
    formData.append('servico', $('#servico_excluir').val());
    formData.append('func', $('#func_excluir').val());

    // Envia a requisição AJAX
    $.ajax({
        url: "ajax/excluir.php",
        type: 'POST',
        data: formData,

        success: function(mensagem) {

        },

        cache: false,
        contentType: false,
        processData: false,
    });
}
</script>

<script type="text/javascript">
$("#form-agenda").submit(function() {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: "ajax/agendar.php",
        type: 'POST',
        data: formData,

        success: function(mensagem) {

            $('#mensagem-alterar').text('');
            $('#mensagem-alterar').removeClass()

            if(mensagem.trim() == "Agendado com Sucesso"){
                
                excluirSemModal('<?php echo $id ?>', '<?php echo $nome_cliente ?>',
                '<?php echo $dataF ?>', '<?php echo $horaF ?>',
                '<?php echo $nome_serv ?>', '<?php echo $nome_func ?>');

                $('#overlay').modal('hide');
                location.reload();

            }
            else{
                $('#mensagem-alterar').text(mensagem)
            }
        },

        cache: false,
        contentType: false,
        processData: false,

    });

});
</script>

<script type="text/javascript">
function buscarNome() {
    var tel = $('#telefone').val();
    listarCartoes(tel);

    $.ajax({
        url: "ajax/listar-nome.php",
        method: 'POST',
        data: {
            tel
        },
        dataType: "text",

        success: function(result) {
            var split = result.split("*");
            console.log(split[3])

            if (split[2] == "" || split[2] == undefined) {

            } else {
                $("#funcionario").val(parseInt(split[2])).change();
            }


            if (split[5] == "" || split[5] == undefined) {
                //document.getElementById("botao_editar").style.display = "none";					
            } else {
                $("#servico").val(parseInt(split[5])).change();
                //document.getElementById("botao_editar").style.display = "block";					
                $("#botao_salvar").text('Novo Agendamento');
            }

            $("#nome").val(split[0]);

            $("#msg-excluir").text('Deseja Realmente excluir esse agendamento feito para o dia ' + split[
                7] + ' às ' + split[4] + ' ?');


            mudarFuncionario()



        }
    });




}
</script>


<script>
$("#form-excluir").submit(function() {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "ajax/excluir.php",
        type: 'POST',
        data: formData,

        success: function(mensagem) {
            $('#mensagem-excluir').text('');
            $('#mensagem-excluir').removeClass()
            if (mensagem.trim() == "Cancelado com Sucesso") {
                //$('#btn-fechar-excluir').click();
                //$('#mensagem').text(mensagem)

                var id_cliente = $('#id_excluir').val();
                var nome = $('#nome_excluir').val();
                var dataFormatada = $('#data_excluir').val();
                var horaFormatada = $('#hora_excluir').val();
                var nome_serv = $('#servico_excluir').val();
                var nome_func = $('#func_excluir').val();

                var msg_agendamento = "<?=$msg_agendamento?>";

                if (msg_agendamento == 'Sim') {

                    let a = document.createElement('a');
                    a.target = '_blank';
                    a.href =
                        'http://api.whatsapp.com/send?1=pt_BR&phone=<?=$tel_whatsapp?>&text= *Atenção:* _Agendamento Cancelado_ %0A Funcionário: *' +
                        nome_func + '* %0A Serviço: *' + nome_serv +
                        '* %0A Data: *' +
                        dataFormatada + '* %0A Hora: *' +
                        horaFormatada + '* %0A Cliente: *' +
                        nome + '*';
                    a.click();
                    return;

                }

            } else {
                //$('#mensagem').addClass('text-danger')
                //$('#mensagem-excluir').text(mensagem)
            }

            location.reload();

        },

        cache: false,
        contentType: false,
        processData: false,

    });

});
</script>

<script type="text/javascript">
function listarCartoes(tel) {

    $.ajax({
        url: "ajax/listar-cartoes.php",
        method: 'POST',
        data: {
            tel
        },
        dataType: "text",

        success: function(result) {
            $("#listar-cartoes").html(result);
        }
    });

}
</script>

<script type="text/javascript">
function listarHorarios(funcionario, data, hora) {


    $.ajax({
        url: "ajax/listar-horarios.php",
        method: 'POST',
        data: {
            funcionario,
            data,
            hora
        },
        dataType: "text",

        success: function(result) {
            if (result.trim() === '000') {
                alert('Selecione uma data igual ou maior que hoje!');
                shakeForm();

                var dt = new Date();
                var dia = String(dt.getDate()).padStart(2, '0');
                var mes = String(dt.getMonth() + 1).padStart(2, '0');
                var ano = dt.getFullYear();
                dataAtual = ano + '-' + mes + '-' + dia;
                $('#data').val(dataAtual);
                return;
            } else {
                $("#listar-horarios").html(result);
            }

        }
    });
}
</script>