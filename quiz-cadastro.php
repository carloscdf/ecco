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


    <div class="content content2">
        <div class="login">

        <?php
       if(isset($_POST['submit'])){
         echo '<div class="alert">
         <span><svg class="checkicon" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m21 4.009c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-16.5.5h15v15h-15zm2.449 7.882 3.851 3.43c.142.128.321.19.499.19.202 0 .405-.081.552-.242l5.953-6.509c.131-.143.196-.323.196-.502 0-.41-.331-.747-.748-.747-.204 0-.405.082-.554.243l-5.453 5.962-3.298-2.938c-.144-.127-.321-.19-.499-.19-.415 0-.748.335-.748.746 0 .205.084.409.249.557z" fill-rule="nonzero"/></svg></span>
         <span class="alert-message">Pergunta cadastrada com Sucesso!<span>
         </div>';
        }
         ?>

            <span class="login-title">Cadastrar perguntas</span>
            <form class="form-01" method="post">
            <div class="separador">
                <label class="label" for="p">Pergunta:</label>
                <input type="text" name="p" required placeholder="Digite uma pergunta">
            </div>
            <div class="separador">
                <label class="label" for="r1">Resposta 1:</label>
                <input type="text" name="r1" required placeholder="Digite uma resposta">
            </div>
            <div class="separador">
                <label class="label" for="r2">Resposta 2:</label>
                <input type="text" name="r2" required placeholder="Digite uma resposta">
            </div>
                <div class="separador">
                <label class="label" for="r3"> Resposta 3:</label>
                <input type="text" name="r3" required placeholder="Digite uma resposta">
                </div>
                <div class="separador">
                <label class="label" for="r3"> Resposta correta:</label>
                    <select name="lCorreta" class="lCorreta" required>
                        <option value="1">Resposta 1</option>
                        <option value="2">Resposta 2</option>
                        <option value="3">Resposta 3</option>
                    </select>
                </div>
                <div class="separador">
                    <span class="span-info">Crie e gerencie as perguntas e respostas do Ecco Quiz por meio deste formulário.</span>
                </div>
                <div class="form-01 form-02 form-03 form-05">
                <button type="submit" name="submit">SALVAR</button>
                

            </form>
            <form class="form-01 form-02 form-03 form-05" method="POST">
            <button id="cad" type="submit" name="home">PÁGINA INICIAL</button>
            </div>
            </form>
        </div>
        <div class="login2">
        <span class="login-title preview-title">Ecco Preview</span>
        <?php

if(isset($_POST['submit'])){
    $questao = $_POST['p'];
    $alternativas = array();
    $lCorreta = $_POST['lCorreta'];


    for($i = 1; $i <= 3; $i++) {
        $alternativa = $_POST['r'.$i];
        $alternativas[] = $alternativa;
    }


    if(!isset($_SESSION['questao'])) {
        $_SESSION['questao'] = array();
    }
    $_SESSION['questao'][] = $questao;

    if(!isset($_SESSION['lCorreta'])) {
        $_SESSION['lCorreta'] = array();
    }

    $_SESSION['lCorreta'][] = $lCorreta;

    if(!isset($_SESSION['alternativa'])) {
        $_SESSION['alternativa'] = array();
    }
    $_SESSION['alternativa'][] = $alternativas;

}

if(empty($_SESSION['questao'])) {
    echo  '<span class="span-info info2 info4">Um preview das perguntas e respostas cadastradas será exibido aqui.</span>
    <div class="iconbox">
        <svg width="50" height="50" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m10.5 17.25c0-.414.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75h-10c-.414 0-.75-.336-.75-.75zm-1.5-3.55c0-.53-.47-1-1-1h-5c-.53 0-1 .47-1 1v4.3c0 .53.47 1 1 1h5c.53 0 1-.47 1-1zm-5.5.5h4v3.3h-4zm7-2.2c0-.414.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75h-10c-.414 0-.75-.336-.75-.75zm-1.5-6c0-.53-.47-1-1-1h-5c-.53 0-1 .47-1 1v4.3c0 .53.47 1 1 1h5c.53 0 1-.47 1-1zm-5.5.5h4v3.3h-4zm7 .25c0-.414.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75h-10c-.414 0-.75-.336-.75-.75z" fill-rule="nonzero"/></svg>
        </div>';
}

else {
     echo '<div class="preview">';

    for ($i = 0; $i < count($_SESSION['questao']); $i++) {
        echo "<div class='separador3'> <p class='titlep'>" . $i + 1 . " - " . $_SESSION['questao'][$i] . "</p>";
        foreach ($_SESSION['alternativa'][$i] as $indice => $alt) {
            echo '<div class="alternativas"><input required class="radio" type="radio" name="alternativa[' . $i . ']" value="' . 
            ($indice + 1) . '">' . '<span class="alt">' . $alt . '</span>' . "</div>";
        }
        echo "</div><div class='line-hr'></div>";
    }

    echo '</div>';
}

if(isset($_POST['home'])) {
    header('Location: inicio.php');
    exit;
}

?>


        </div>
    </div>

 
</body>

</html>