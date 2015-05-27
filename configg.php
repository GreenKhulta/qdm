<?php 
try {
	$db = new PDO('mysql:host=localhost;dbname=u923709130_qdm', 'u923709130_beh', 'al1916we');

	$losQueHayQueActualizarAFinalizado = $db->query("SELECT id_producto AS id FROM producto pr
		WHERE (SELECT count(id_producto) FROM pujas  WHERE id_producto = pr.id_producto) > num_pujas_minimas AND fecha_maxima < NOW();");

	while ($registro = $losQueHayQueActualizarAFinalizado->fetch(PDO::FETCH_ASSOC)) {
		$id = $registro["id"];
		if($db->query('UPDATE producto SET estado="Finalizado" WHERE id_producto = '. $id .' ;')) {
			echo "ok finalizado";
		} else {
			echo "error";
		}
	}


	$losQueHayQueAnadirMasTiempo = $db->query("SELECT id_producto AS id FROM producto pr
		WHERE (SELECT count(id_producto) FROM pujas  WHERE id_producto = pr.id_producto) < num_pujas_minimas AND fecha_maxima < NOW();");

	while ($registro = $losQueHayQueActualizarAFinalizado->fetch(PDO::FETCH_ASSOC)) {
		$id = $registro["id"];
		if($db->query('UPDATE producto SET fecha_maxima =  DATE_ADD(fecha_maxima, INTERVAL 1 DAY);')) {
			echo "ok 12 horas mas";
		} else {
			echo "error";
		}
	}

}
//catch exception
catch(Exception $e) {
	echo 'Mensaje de error: ' .$e->getMessage();
}
?>