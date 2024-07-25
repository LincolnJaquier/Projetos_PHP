<?php
	
	echo "<html>
        <head>
        <style type='text/css'>
            * { margin: 0; padding: 0; font-family:Arial; font-size:15pt;}
            #divCenter { 
                    background-color: #0000; 
                    width: 260px; 
                    height: 150px; 
                    left: 50%; 
                    margin: -130px 0 0 -210px; 
                    padding:10px;
                    position: absolute; 
                    top: 50%; }
        </style>
        <div id='divCenter'>
        <form method='post' action='cep.php'>
        <big><header><strong>Busca CEP</strong></header></big>
        <br>
        <br>
        <strong>Digite o CEP: </strong><br>
        <br>
        <input type='text' name='cep'></input>
        <br><br>
        <input type='submit' value='Buscar'>
        </form>
        </div>
        </head>
        </html>
        ";
    if($_POST){
        $cep = $_POST['cep'];
    	$url = 'https://viacep.com.br/ws/' . $cep . '/json/';
    	$ch = curl_init($url);



    curl_setopt_array($ch, [

        // Equivalente ao -X:
        CURLOPT_CUSTOMREQUEST => 'GET',

        // Equivalente ao -H:
        CURLOPT_HTTPHEADER => [
            'JsonOdds-API-Key: yourapikey'
        ],

        // Permite obter o resultado
        CURLOPT_RETURNTRANSFER => 1,
    ]);

    $resposta = json_decode(curl_exec($ch), true);
    if ($resposta){
        $logradouro = $resposta["logradouro"];
        $bairro = $resposta["bairro"];
        $localidade = $resposta["localidade"];
        $uf = $resposta["uf"];
 
        curl_close($ch);
        echo "<pre>";
        echo "      
              CEP: <strong>$cep</strong> <br>
              Logradouro: <strong>$logradouro</strong> <br>
              Bairro: <strong>$bairro</strong> <br>
              Localidade: <strong>$localidade</strong> <br>
              UF: <strong>$uf</strong> <br>
              ";

    }
    else{
        print_r("Cep inválido");
    }
}
//var_dump($resposta);