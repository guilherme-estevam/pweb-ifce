<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Respostas</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION["pergunta4"] = $_POST["pergunta4"];
        $acertos = 0;

        if($_COOKIE["pergunta1"] == "Brasil"){
            $acertos++;
            $resultado1 = "Acertou";
        } else {
            $resultado1 = "Errou";
        }
        if($_COOKIE["pergunta2"] == "7"){
            $acertos++;
            $resultado2 = "Acertou";
        } else {
            $resultado2 = "Errou";
        }
        if($_SESSION["pergunta3"] == "Betis"){
            $acertos++;
            $resultado3 = "Acertou";
        } else {
            $resultado3 = "Errou";
        }
        if($_SESSION["pergunta4"] == "Chelsea x Manchester City"){
            $acertos++;
            $resultado4 = "Acertou";
        } else {
            $resultado4 = "Errou";
        }

        if($acertos == 0){
            $finalizacao = "<h1>Não foi dessa vez... Você não acertou nada.</h1>";
        } elseif($acertos == 1){
            $finalizacao = "<h1>Tente novamente. Você acertou apenas uma pergunta</h1>";
        } elseif($acertos == 2){
            $finalizacao = "<h1>Quase lá. Você acertou duas perguntas</h1>";
        } elseif($acertos == 3){
            $finalizacao = "<h1>Por pouco. Você acertou três perguntas!</h1>";
        } else {
            $finalizacao = "<h1>Parabéns!! Você acertou todas as perguntas</h1>";
        }

        $nota = "<h2>Nota Final: ".$acertos."/4</h2>";
    ?>
    <div id="navegacao">
        <h1>Obrigado por Participar! <br>Jogue Novamente se Quiser</h1>
        <ul>
            <li><a href="index.html">Quiz de Futebol</a></li>
        </ul>
    </div>
    <div id="conteudo">
        <?php echo $finalizacao;?>
        <table>
            <tr>
                <th>Pergunta</th>
                <th>Resposta Correta</th>
                <th>Sua resposta</th>
                <th>Resultado</th>
            </tr>
            <tr>
                <td>Qual o país que possui mais Copas do Mundo?</td>
                <td>Brasil</td>
                <td><?php echo $_COOKIE["pergunta1"];?></td>
                <td><?php echo $resultado1;?></td>
            </tr>
            <tr>
                <td>Quantas Bolas de Ouro tem o Messi?</td>
                <td>7</td>
                <td><?php echo $_COOKIE["pergunta2"];?></td>
                <td><?php echo $resultado2;?></td>
            </tr>
            <tr>
                <td>Qual destes clubes não é Inglês?</td>
                <td>Betis</td>
                <td><?php echo $_SESSION["pergunta3"];?></td>
                <td><?php echo $resultado3;?></td>
            </tr>
            <tr>
                <td>Quais times se enfrentaram na última Champions League?</td>
                <td>Chelsea x Manchester City</td>
                <td><?php echo $_SESSION["pergunta4"];?></td>
                <td><?php echo $resultado4;?></td>
            </tr>
        </table>
        <br>
        <?php echo $nota;?>
        <br>
        <img src="imagens/final.jpg" alt="Brasil campeão do Mundo"  width="384" height="216">
    </div>
</body>
</html>
