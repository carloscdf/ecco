<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecco - quiz</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php
    session_start();
    echo $_SESSION['header'];

    ?>
    <div class="content">
        <div class="login">
            <span class="login-title">Sua Pontuação</span>
            <?php

            if (isset($_POST['enviar'])) {
                $respostas = $_POST['alternativa'];

                /* 
                print_r($respostas);
                print_r($_SESSION['lCorreta']);
*/

                $_SESSION['corretas'] = 0;
                
                for($i = 0; $i < count($_SESSION['lCorreta']); $i++) {
                        if ($respostas[$i] == $_SESSION['lCorreta'][$i]) {
                            $_SESSION['corretas']++;
                    }
                }

                echo "<div class='cpont'><span class='pontuacao'>" . $_SESSION['corretas'] . "/" . $_SESSION['total'] . "<span></div>";
            }

            $porcento = ($_SESSION['corretas'] / $_SESSION['total']) * 100;
            $porcento2 = number_format($porcento, 1);

            $mensagens = array(
                "Acredite em si mesmo e tudo será possível.",
                "O sucesso é a soma de pequenos esforços repetidos dia após dia.",
                "Seja a mudança que você deseja ver no mundo.",
                "O único lugar onde o sucesso vem antes do trabalho é no dicionário.",
                "Nunca é tarde demais para ser aquilo que você poderia ter sido.",
                "A persistência é o caminho do êxito.",
                "Não espere por oportunidades, crie-as.",
                "O maior erro que você pode cometer é o de ficar o tempo todo com medo de cometer algum.",
                "Acredite que você pode e já estará no meio do caminho.",
                "Seja a melhor versão de si mesmo todos os dias."
            );

            $aleatorio = array_rand($mensagens);


            if ($porcento2 >= 50) {

            ?>

                <div class="separador">
                    <span class="span-info">Parabéns! você acertou <?php echo $porcento2 . "%"; ?> do quiz. </span>
                </div>
                <div class="separador">
                    <span class="icon-celebration">&#x1F389;</span>
                </div>
                <div class="separador">
                    <span class="span-info info2"><?php echo $mensagens[$aleatorio];   ?></span>
                </div>
            <?php } else { ?>
                <div class="separador">
                    <span class="span-info info2">Que pena! você acertou <?php echo $porcento2 . "%"; ?> do quiz. Você precisa acertar pelo menos 50%.</span>
                </div>
                <div class="separador">
                    <span class="icon-celebration">&#x1F61E;</span>
                </div>
                <div class="separador">
                <span class="span-info info2"><?php echo '" '. $mensagens[$aleatorio] .' "'  ?></span>
                </div>
            <?php } ?>
            <form method="POST" class="form-01 form-02">
                <button type="submit" name="play">JOGAR NOVAMENTE</button>
                <button type="submit" name="home">PÁGINA INICIAL</button>
            </form>
<?php
if(isset($_POST['play'])) {
    header("Location: quiz.php");
    exit;
}

else if(isset($_POST['home'])) {
    header("Location: inicio.php");
    exit;
}

?>
        </div>
    </div>
</body>

</html>