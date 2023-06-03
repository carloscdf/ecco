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
            <span class="login-title">ECCO QUIZ | <?php $_SESSION['total'] = 0;
                    for ($i = 0; $i <= count($_SESSION['questao']); $i++) {
                        $_SESSION['total'] =  $i;
                    }
                    if ($_SESSION['total'] == 1) {
                        echo $_SESSION['total'] . " Pergunta";
                    } else {
                        echo $_SESSION['total'] . " Perguntas";
                    }

                    ?></span>

            <?php

            ?><form class="form-01 f-02" action="resultado.php" method="POST"><?php
                   for ($i = 0; $i < count($_SESSION['questao']); $i++) {
                       echo "<div class='separador3'> <p class='titlep'>" . $i + 1 . " - " . $_SESSION['questao'][$i] . "</p>";
                       foreach ($_SESSION['alternativa'][$i] as $indice => $alt) {
                           echo '<div class="alternativas"><input required class="radio" type="radio" name="alternativa[' . $i . ']" value="' . 
                           ($indice + 1) . '">' . '<span class="alt">' . $alt . '</span>' . "</div>";
                       }
                       echo "</div><div class='line-hr'></div>";
                   }
                   ?>
                <button type="submit" name="enviar">CONFIRMAR</button>
            </form>



        </div>
    </div>

</body>

</html>