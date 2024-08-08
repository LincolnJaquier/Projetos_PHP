<?php

$array = [
    ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'],
    ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'],
    [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
    ['!', '@', '#', '%', '&', '*']
];

if(!is_null($_POST['qtde'])) {
    $qtde = $_POST['qtde'];
    $senha = '';

    for($i = 0; $i < $qtde; $i++) {
        $subarray =  $array[rand(0, count($array) - 1)];
        $valor =  $subarray[rand(0, count($subarray) - 1)];

        $senha .= $valor;
    }

    echo json_encode(['senha_gerada' => $senha]);
}