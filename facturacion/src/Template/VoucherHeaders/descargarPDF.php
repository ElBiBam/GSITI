<?php
$servername = "localhost";
;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$serie = $_POST['inp_ser'];
$numero = $_POST['inp_num'];
$sql = "(SELECT `chper`.`persona_cod` AS codigo, `c`.`nombre`, `c`.`direccion`, `c`.`fecha_emision` FROM `comprobante` `c` JOIN `comprobante_has_persona` `chper` ON `chper`.`comprobante_id` = `c`.`id` WHERE `c`.`serie` = '$serie' AND `c`.`numero` = '$numero')";
$sql .= " UNION ALL "; 
$sql .= "(SELECT `chprod`.`cantidad`, 'UND' AS unidad, `prod`.`nombre`, `chprod`.`precio` FROM `comprobante` `c` JOIN `comprobante_has_producto` `chprod` ON `chprod`.`comprobante_id` = `c`.`id` JOIN `producto` `prod` ON `prod`.`id` = `chprod`.`producto_id` WHERE `c`.`serie` = '$serie' AND `c`.`numero` = '$numero')";
$result = $conn->query($sql);
//echo $sql;
if ($result->num_rows > 0) {
    // output data of each row	
?>
<html><head><title>Descargar Factura</title><link rel='stylesheet' href='css/form_style.css'></head>
<body onload="myFunction()">
<a href='javascript:history.back()'>Ir a anterior</a><br>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script>
	(function(API){
		API.myText = function(txt, options, x, y) {
			options = options ||{};
			/* Use the options align property to specify desired text alignment
			 * Param x will be ignored if desired text alignment is 'center'.
			 * Usage of options can easily extend the function to apply different text 
			 * styles and sizes 
			*/
			if( options.align == "center" ){
				// Get current font size
				var fontSize = this.internal.getFontSize();

				// Get page width
				var pageWidth = this.internal.pageSize.width;

				// Get the actual text's width
				/* You multiply the unit width of your string by your font size and divide
				 * by the internal scale factor. The division is necessary
				 * for the case where you use units other than 'pt' in the constructor
				 * of jsPDF.
				*/
				txtWidth = this.getStringUnitWidth(txt)*fontSize/this.internal.scaleFactor;

				// Calculate text's x coordinate
				x = ( pageWidth - txtWidth ) / 2;
			}
			if( options.align == "right" ){
				var fontSize = this.internal.getFontSize();
				var pageWidth = this.internal.pageSize.width;
				txtWidth = this.getStringUnitWidth(txt)*fontSize/this.internal.scaleFactor;
				x = ( pageWidth - txtWidth );
			}
			if( options.align == "align_left" ){
				var fontSize = this.internal.getFontSize();
				var pageWidth = this.internal.pageSize.width;
				txtWidth = this.getStringUnitWidth(txt)*fontSize/this.internal.scaleFactor;
				x = ( pageWidth ) / 2 - 21;
			}
			if( options.align == "align_right" ){
				var fontSize = this.internal.getFontSize();
				var pageWidth = this.internal.pageSize.width;
				txtWidth = this.getStringUnitWidth(txt)*fontSize/this.internal.scaleFactor;
				x = ( pageWidth ) / 2+15;
			}

			// Draw text at x,y
			this.text(txt,x,y);
		}
	})(jsPDF.API);
	function myFunction() {
		var doc = new jsPDF();

<?php

	//printf("<tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th></tr>","SERIE","NUMERO","FECHA EMISION","TOTAL");	
	echo "doc.setFont('helvetica');";
	echo "doc.setFontType('normal');";
	echo "doc.setFontSize(9);";
	echo "doc.myText('RUC: 20498590587',{align: 'center'},0,10);";
	echo "doc.myText('R. Social: POLLERIA EL POLLO LEAL E.I.R.L.',{align: 'center'},0,15);";
	echo "doc.myText('Direccion: PZA.PLAZA UMACHIRI',{align: 'center'},0,20);";
	echo "doc.myText(' NRO. 402 (PARQUE UMACHIRI)',{align: 'center'},0,25);";
	echo "doc.myText(' AREQUIPA - AREQUIPA - MARIANO MELGAR',{align: 'center'},0,30);";
	echo "doc.myText('                                          ',{align: 'center'},0,35);";	
	
	echo "doc.setFontType('bold');";
	echo "doc.setFontSize(11);";
	
	$codigo = "";
	$nombre = "";
	$direccion = "";
	$fecha_emision = "";
	if(  $row = $result->fetch_assoc() ){
		$codigo = $row['codigo'];
		$nombre = $row['nombre'];
		$direccion = $row['direccion'];
		$fecha_emision = $row['fecha_emision'];
	}
	
	if(strlen($codigo) == 11){
		echo "doc.setFontType('bold');";
		echo "doc.setFontSize(11);";
		echo "doc.myText('FACTURA ELECTRONICA',{align: 'center'},0,40);";
		echo "doc.setFontType('normal');";
		echo "doc.setFontSize(9);";
		echo "doc.myText('S-Num: ".$serie."-".$numero."',{align: 'center'},0,45);";
		echo "doc.setFontType('normal');";
		echo "doc.setFontSize(9);";
		echo "doc.myText('RUC: ".$codigo."',{align: 'center'},0,50);";
	}
	if(strlen($codigo) == 7){
		echo "doc.setFontType('bold');";
		echo "doc.setFontSize(11);";
		echo "doc.myText('BOLETA ELECTRONICA',{align: 'center'},0,40);";
		echo "doc.setFontType('normal');";
		echo "doc.setFontSize(9);";
		echo "doc.myText('S-Num: ".$serie."-".$numero."',{align: 'center'},0,45);";
		echo "doc.setFontType('normal');";
		echo "doc.setFontSize(9);";
		echo "doc.myText('DNI: ".$codigo."',{align: 'center'},0,50);";
	}
	$pos = 55;
	$nombre = strtoupper($nombre);
	$direccion = strtoupper($direccion);
	echo "doc.myText('Nombre: ".$nombre."',{align: 'center'},0,$pos);";
	$pos = $pos+5;
	echo "doc.myText('Direccion: ".$direccion."',{align: 'center'},0,$pos);";
	$date = new DateTime($fecha_emision);
	$pos = $pos+5;
	echo "doc.myText('Fecha: ".date_format($date, 'Y-m-d')."',{align: 'center'},0,$pos);";
	$pos = $pos+5;
	echo "doc.myText('Hora: ".date_format($date, 'H:i:s')."',{align: 'center'},0,$pos);";
	$pos = $pos+5;
	echo "doc.myText('==========================================',{align: 'center'},0,$pos);";
	$pos = $pos+5;
	echo "doc.myText('Cant      Unidad  Descripcion             ',{align: 'align_left'},0,$pos);";
	$pos = $pos+5;
	echo "doc.myText('                             P.Total      ',{align: 'align_left'},0,$pos);";	
	$pos = $pos+5;
	echo "doc.myText('------------------------------------------',{align: 'center'},0,$pos);";
	
	
	$salto = 90;
	$total = 0.0;
	while(  $row = $result->fetch_assoc() ){
		
		$cantidad = $row['codigo'];
		$cantidad = number_format($cantidad, 3, '.', '');		
		$cantidad = str_pad($cantidad, 10);
		$unidad = $row['nombre'];
		$unidad = str_pad($unidad, 8);
		$nombre = substr($row['direccion'],0,24);
		if(strlen($row[3]) > 24)
			$nombre_2 = substr($row['nombre'],24);
		else
			$nombre_2 = "";
		$nombre = str_pad($nombre, 24);
		$nombre_2 = str_pad($nombre_2, 25);
		
		$precio = $row['fecha_emision'];
		$precio = number_format($precio, 2, '.', '');
		$total += $precio;
		$prod = $cantidad.$unidad.$nombre;
		$prod = strtoupper($prod);
		$prod_2 = $nombre_2."    ".$precio;
		$prod_2 = strtoupper($prod_2);
		$salto += 5;		
		echo "doc.myText('$prod',{align: 'align_left'},0,$salto);";
		$salto += 5;
		echo "doc.myText('$prod_2',{align: 'align_left'},0,$salto);";
	}
	$subtotal = $total / (1.0 + 0.18);
	$subtotal = number_format($subtotal, 2, '.', '');
	$subtotal = "subtotal: ".$subtotal;
	$igv = $total / (1.0 + 0.18) * 0.18;
	$igv = number_format($igv, 2, '.', '');
	$igv = "igv: ".$igv;
	//$subtotal = str_pad($subtotal, 42, " ", STR_PAD_LEFT);
	//$igv = str_pad($igv, 42, " ", STR_PAD_LEFT);
	$total = number_format($total, 2, '.', '');
	$total = "total: ".$total;
	$salto += 5;
	echo "doc.myText('------------------------------------------',{align: 'center'},0,$salto);";
	$salto += 5;
	echo "doc.myText('$subtotal',{align: 'align_right'},0,$salto);";
	$salto += 5;
	echo "doc.myText('$igv',{align: 'align_right'},0,$salto);";
	$salto += 5;
	echo "doc.myText('$total',{align: 'align_right'},0,$salto);";
	$salto += 5;
	
	echo "doc.save('".$serie."-".$numero."-".$codigo.".pdf');";
?>
			
	}
</script>
</body>
</html>
<?php
} else {
    echo "";
}

$conn->close();
?> 