<?php 

include('../../conexao.php');

$dataInicial = $_POST['dataInicial'];
$dataFinal = $_POST['dataFinal'];

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = file_get_contents($url_sistema."sistema/painel/rel/rel_lucro.php?dataInicial=$dataInicial&dataFinal=$dataFinal");

if($tipo_rel != 'PDF'){
	echo $html;
	exit();
}

//CARREGAR DOMPDF
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;


//INICIALIZAR A CLASSE DO DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);



//CARREGAR O CONTEÚDO HTML
$pdf->loadHtml($html);

//Definir o tamanho do papel e orientação da página
$pdf->setPaper('A4', 'portrait');

//RENDERIZAR O PDF
$pdf->render();

// Obter o conteúdo do PDF
$pdf_content = $pdf->output();

// Limpar qualquer saída que possa ter sido feita anteriormente
ob_clean();

// Configurar os cabeçalhos para forçar o download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Demonstrativo de Lucro.pdf"');

// Enviar o conteúdo do PDF para o navegador
echo $pdf_content;
exit();
?>