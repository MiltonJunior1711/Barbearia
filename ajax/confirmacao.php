<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.wordmensagens.com.br/agendar-program',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "instance": "'.$instancia.'",
    "to": "'.$telefone.'",
    "message":"'.$mensagem.'",
    "msg_erro": "Desculpe, responda apenas com 1 ou 2 Muito Obrigado!!!",
    "msg_confirma": "Confirmado ✅",
    "msg_reagendar": "Cancelado, Reagende pelo Site ❌",
    "id_consulta":"'.$id_envio.'",
    "url_recebe": "'.$url_sistema.'ajax/retorno.php",
    "data": "'.$data_envio.'",
    "aviso": "'.$minutos_aviso.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

//$response = curl_exec($curl);

//curl_close($curl);
//pegando o id
//$response = json_decode($response, false);
//$id = $response->id;

$response = curl_exec($curl);

curl_close($curl);

if ($response === false) {
    // Verifique se houve algum erro na execução da requisição cURL
    $error_message = curl_error($curl);
    error_log("Erro cURL: $error_message");
} else {
    // Tentar decodificar a resposta JSON
    // Extrair o JSON válido da resposta usando uma expressão regular
    if (preg_match('/\{.*\}/', $response, $matches)) {
        $json_response = $matches[0]; // O primeiro elemento de $matches contém o JSON válido
        // Decodificar o JSON
        $response_decoded = json_decode($json_response);
        
        if ($response_decoded === null) {
            // Verifique se houve um erro ao decodificar o JSON
            error_log("Erro ao decodificar JSON: " . json_last_error_msg());
        } else {
            // Verifique se a propriedade "id" está definida na resposta
            if (property_exists($response_decoded, 'id')) {
                // Acesso seguro à propriedade "id"
                $id = $response_decoded->id;
            } else {
                // A propriedade "id" não está definida na resposta
                error_log("Propriedade 'id' não encontrada na resposta JSON");
            }
        }
    } else {
        // Caso não seja encontrado nenhum JSON válido na resposta
        error_log("Nenhum JSON válido encontrado na resposta");
    }
}
?>
