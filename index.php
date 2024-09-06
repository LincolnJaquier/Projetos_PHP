<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de senha</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="box">
            <label for="qtde">Digite a quantidade de caracteres</label>
            <input type="number" name="qtde" id="qtde" placeholder="Digite um numero" />
            <button type="button" id="btn-enviar">Gerar Senha</button>
            <p class="senha-gerada" id="senha-gerada"></p>
            <button type="button" id="btn-copiar" disabled>Copiar</button>
        </div>
    </div>
    <script>
        $('#btn-enviar').click(() => {
            $.ajax({
                url: './randomizador.php',
                type: 'POST',
                dataType: 'json',
                data: {qtde: $('#qtde').val()},
                success: function (data) {
                    $('#qtde').val('');
                    $('.senha-gerada').html(data.senha_gerada);
                    $('#btn-copiar').removeAttr('disabled');
                }
            });
        });

        $('#btn-copiar').click(() => {
            window.getSelection().selectAllChildren(document.getElementById('senha-gerada'));
            document.execCommand('Copy');
            alert('Senha copiada para o clipboard');
        });
    </script>
</body>
</html>