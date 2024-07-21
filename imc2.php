<?php
	


	$peso = $_GET['peso'];
	$altura = $_GET['altura'];

	$resultado = $peso/($altura * $altura);
	//var_dump($_POST);
	print_r($resultado);
