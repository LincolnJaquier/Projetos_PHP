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
        echo"<html>
                <body>
                <style type='table/css'>
                #DivTable{
                    table {
                    border-collapse: collapse;
                    border: 2px solid rgb(140 140 140);
                    font-family: sans-serif;
                    font-size: 0.8rem;
                    letter-spacing: 1px;
                    }
                    thead,
                    tfoot {
                      background-color: rgb(228 240 245);
                    }

                    th,
                    td {
                      border: 1px solid rgb(160 160 160);
                      padding: 8px 10px;
                    }

                    td:last-of-type {
                      text-align: center;
                    }

                    tbody > tr:nth-of-type(even) {
                      background-color: rgb(237 238 242);
                    }

                    tfoot th {
                      text-align: right;
                    }

                    tfoot td {
                      font-weight: bold;
                    }
                }
                </style>
                <div id='divTable'>
                    <table>
                        <thead>
                            <tr>
                                <th scope='col'>CEP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='row'>$cep</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </body>
        </html>";
        // curl_close($ch);
        // echo "<pre>";
        // print_r($resposta["cep"]);
        // echo"<br>";
        // print_r($resposta["logradouro"]);
        // echo"<br>";
        // print_r($resposta["bairro"]);
        // echo"<br>";
        // print_r($resposta["localidade"]);
        // echo"<br>";
        // print_r($resposta["uf"]);
    }
    else{
        print_r("Cep inválido");
    }
}
//var_dump($resposta);