<?php

	echo "<html>
		<head>
			<style type='text/css'>
	        * { margin: 0; padding: 0; font-family:Arial; font-size:15pt;}
	        #divCenter { 
	                background-color: #e1e1e1; 
	                width: 260px; 
	                height: 150px; 
	                left: 50%; 
	                margin: -130px 0 0 -210px; 
	                padding:10px;
	                position: absolute; 
	                top: 50%; }
	        </style>
	    	<div id='divCenter'>
				<strong>Peso: </strong><br>
				<form method='post' action='imc.php'>
				<input type='text' name='peso'></input>
				<br>
				<br>
				<br>
				<strong>Altura: </strong><br>
				<input type='text' name='altura'></input>
				<br>
				<br>
				<input type='submit' value='Calcular'>
				</form>
			</div>
		</head>
		</html>
		";
		if($_POST){
		$peso = $_POST['peso'];
		$altura = $_POST['altura'] /100;
		$resultado = $peso/($altura * $altura);

	if($resultado < 16){
		echo "<html>
		<body>
			Seu IMC está considerado como magreza grave sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else if($resultado>=16 && $resultado<=16.9){
		echo "<html>
		<body>
			Seu IMC está considerado como magreza moderada sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else if($resultado>=17 && $resultado<=18.5){
		echo "<html>
		<body>
			Seu IMC está considerado como magreza leve sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else if($resultado>=18.6 && $resultado<=24.9){
		echo "<html>
		<body>
			Seu IMC está considerado como peso ideal sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else if($resultado>=25 && $resultado<=29.9){
		echo "<html>
		<body>
			Seu IMC está considerado como sobrepeso sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else if($resultado>=30 && $resultado<=34.9){
		echo "<html>
		<body>
			Seu IMC está considerado como obesidade sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else if($resultado>=35 && $resultado<=39.9){
		echo "<html>
		<body>
			Seu IMC está considerado como obesidade severa sendo ele de: <strong>$resultado</strong>
		</body>
		</html>";
	}
	else{
		echo "<html>
		<body>
		Seu IMC está considerado como obesidade morbida sendo ele de: <strong>$resultado</strong>
		</body>
		<script>
		document.body.style.backgroundColor = 'red'
		</script>
		</html>";

	}
	//var_dump($resultado);
}
	//$json = json_encode($_POST);
	//print_r($resultado);

    //     #divTitle { 
    //             font-size: 25
    //             background-color: #0000; 
    //             width: 260px; 
    //             height: 150px; 
    //             left: 50%; 
    //             margin: -100px 0 0 -110px; 
    //             padding:10px;
    //             position: top; 
    //             top: 50%; }        
    // </style>
    // <div id='divTitle'
    // 	Calculadora IMC
    // </div>