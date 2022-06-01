<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Pergunta 3</title>
</head>
<body>
    <?php
        setcookie("pergunta2", $_POST["pergunta2"]);
    ?>
    <div id="conteudo">
        <h2>Pergunta 3</h2>
        <h3>Qual destes clubes não é Inglês?</h3>
        <form action="pergunta4.php" method="post" onsubmit="return validaForm()">
            <input type="radio" name="pergunta3" value="Betis">Betis<br>
            <input type="radio" name="pergunta3" value="Manchester City">Manchester City<br>
            <input type="radio" name="pergunta3" value="Tottenham">Tottenham<br>
            <input type="radio" name="pergunta3" value="Liverpool">Liverpool<br>
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <br>
        <img src="imagens/premier.jpg" alt="Imagem da Premier League"  width="384" height="216">
    </div>
<script>
    function validaForm(){
        var radios = document.getElementsByName("pergunta3");
        var formValido = false;

        var i = 0;
        while (!formValido && i < radios.length) {
            if(radios[i].checked) formValido = true;
            i++;        
        }

        if (!formValido) alert("Por favor, escolha uma opção");
        return formValido;
    }
</script>    
</body>
</html>
