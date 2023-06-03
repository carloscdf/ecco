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
            <?php
                             if(isset($_POST['empty'])) {
                                echo '<div class="alert">
                                                <span><svg class="checkicon" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m21 3.998c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-16.5.5h15v15h-15zm7.491 6.432 2.717-2.718c.146-.146.338-.219.53-.219.404 0 .751.325.751.75 0 .193-.073.384-.22.531l-2.717 2.717 2.728 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-2.728-2.728-2.728 2.728c-.147.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .384.073.53.219z" fill-rule="nonzero"/></svg></span>
                                                <span class="alert-message">Cadastre primeiro as perguntas<span>
                                                </div>';
                            }
            ?>
            <span class="login-title">Bem-vindo ao Ecco Quiz!</span>
            <form class="form-01" method="POST">
            <div class="separador1">
                    <div class="perfil2">
                        <div class="img">
                        <img src="img/<?php echo $_SESSION['file']; ?>" alt="">
                        </div>
                        <span><?php  echo $_SESSION['nome'];?></span>
                    </div>
                </div>
                <div class="separador">
                    <span class="span-info info2">Olá <?php  echo $_SESSION['nome'].",";?> escolha uma das ações abaixo:</span>
                </div>
              <?php
              
              if(empty($_SESSION['questao'])) {
                echo '<button class="empty" type="submit" name="empty">JOGAR QUIZ</button>';
              } 
              else {
                echo '<button type="submit" name="play">JOGAR QUIZ</button>';
              }?>
                <button type="submit" name="cad">CADASTRAR PERGUNTAS</button>
                <div class="margin"></div>
                <div class="separador">
                    <span class="span-info info2">Observação: para poder jogar o quiz é preciso cadastrar as perguntas.</span>
                </div>

                <?php 
                if(isset($_POST['play'])) {
                    header('Location: quiz.php');
                    exit;
                }
                
                else if(isset($_POST['cad'])){
                    header('Location: quiz-cadastro.php');
                    exit;
                }
                
                ?>

            </form>
        </div>
    </div>
</body>

</html>