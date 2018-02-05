<?php
	header('Content-type: text/html; charset=utf-8');
	$id = $_POST['id'];
    	
    $arquivo = file_get_contents('../data.json');
    $json = json_decode($arquivo);
    $newJson = array();

    foreach ($json as $dado) {
    	if ($dado->id != $id) {
    		array_push($newJson, $dado);
    	}
    }

    $json = json_encode($newJson);

    file_put_contents('../data.json', $json);
    echo "Dados excluido!";
?>