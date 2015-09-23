<!DOCTYPE html>
<html>
	<head>
		<title>Bodega</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="css/estilos.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="css/tablesorter.css" type="text/css" media="screen"/>
		<script src="js/jquery-2.1.4.js"></script>
		<script src="js/jquery.colorbox.js"></script>
		<script src="js/jquery.colorbox-es.js"></script>
		<script src="js/jquery.tablesorter.js"></script>
	</head>
	<body>
		<script>
			$(document).ready(function(){
				$("#tbodega").tablesorter();
			})
		</script>
		<?php
				$enlace = mysql_connect('localhost', 'root', '')
				or die('conexion fallida: ' . mysql_error());
				mysql_select_db('progra4') or die('no se pudo conectar la base de datos');	
				//realizar una consulta mysql
				$consulta = "SELECT b.descripcion, p.producto, p.precio, p.stock FROM producto p INNER JOIN bodega b ON p.codBodega = b.codBodega;";
				$resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
		?>
		<div id="wrapper">
			<h1>Bodega 2</h1>
			<table border="1" id="tbodega" class="tablesorter">
				<thead>
					<tr>
						<th>Bodega</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Stock</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)){
							echo "\t<tr>\n";
							foreach ($linea as $valor_columna){
								echo "\t\t<td>$valor_columna</td>\n";
							}
							echo "\t</tr>\n";

						}
						echo "\t</tbody>\n";
						echo "</table>\n";
						mysql_free_result($resultado);
						mysql_close($enlace);
					?>
		</div>
	</body>
</html>