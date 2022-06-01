<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Pergunta 4</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION["pergunta3"] = $_POST["pergunta3"];
    ?>
    <div id="conteudo">
        <h2>Pergunta 4</h2>
        <h3>Quais times se enfrentaram na última Champions League?</h3>
        <form action="respostas.php" method="post" onsubmit="return validaForm()">
            <input type="radio" name="pergunta4" value="PSG x Chelsea">PSG x Chelsea<br>
            <input type="radio" name="pergunta4" value="Liverpool x Chelsea">Liverpool x Chelsea<br>
            <input type="radio" name="pergunta4" value="Bayern x PSG">Bayern x PSG<br>
            <input type="radio" name="pergunta4" value="Chelsea x Manchester City">Chelsea x Manchester City<br>
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <br>
        <img src="imagens/champions.jpg" alt="Trofeu da Champions"  width="384" height="216">
    </div>
<script>
    function validaForm(){
        var radios = document.getElementsByName("pergunta4");
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
