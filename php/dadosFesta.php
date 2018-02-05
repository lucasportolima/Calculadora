<?php
	
	header('Content-type: text/html; charset=utf-8');
	if (isset($_POST)){
		$qtdAdulto   = $_POST['qtdAdulto'];
    	$qtdCrianca   = $_POST['qtdCrianca'];
    	$bebida = $_POST['bebida'];

    	if ($bebida == "") {
    		$bebida = "SIM";
    	}

    	$arquivo = file_get_contents('../data.json');
    	$json = json_decode($arquivo);

    	$dados = array(
                "id" => count($json) + 1,
                "qtdAdulto" => $qtdAdulto,
                "qtdCrianca" => $qtdCrianca,
                "bebida" => $bebida,                                        
                );

    	array_push($json, $dados);
        $json = json_encode($json);

        file_put_contents('../data.json', $json);
        echo "Dados enviados com sucesso!";
	}
?>