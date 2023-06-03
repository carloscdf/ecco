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
            <span class="login-title">Área de Cadastro</span>

            <form enctype="multipart/form-data" class="form-01" method="POST">

                <div class="separador1">
                    <div class="perfil">

                        <?php
                        if(isset($_POST['cadastro'])) {
                            $pasta = 'img/';
                            $_SESSION['file'] = $_FILES['arq']['name'];
    
                             if (move_uploaded_file($_FILES['arq']['tmp_name'], $pasta . '/' . $_SESSION['file'])) {
    
                             } 
                            }
                            ?>


                           <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path d="M22 7v12h-20v-12h20zm2-2h-24v16h24v-16zm-15 6h-5v-2h5v2zm-4-7h-3v-1h3v1zm11 7c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm0-2c-2.209 0-4 1.791-4 4s1.791 4 4 4 4-1.791 4-4-1.791-4-4-4z"/></svg>
                    </div>
                    <label class="label" for="file">Foto de Perfil
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M8 11h-6v10h20v-10h-6v-2h8v14h-24v-14h8v2zm-1-4l5-6 5 6h-4v11h-2v-11h-4z" />
                        </svg>
                    </label>
                    <input type="file" name="arq" required>
                </div>
                <div class="separador">
                    <label for="email">NOME</label>
                    <input type="text" name="nome" placeholder="Digite seu nome" required>
                </div>
                <div class="separador">
                    <label for="email">EMAIL</label>
                    <input type="text" name="email" placeholder="Digite seu e-mail" required>
                </div>
                <div class="separador">
                    <label for="senha">SENHA</label>
                    <input type="text" name="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" name="cadastro">CADASTRAR</button>

                <?php
                if (isset($_POST['cadastro'])) {
                    $_SESSION['nome'] = $_POST['nome'];
                    $_SESSION['email'] = $_POST['email'];
                    $senha = $_POST['senha'];
                    $_SESSION['senhaCriptografada'] = md5($senha);
                    header('Location: index.php');
                    exit;
                }

                ?>

            </form>
        </div>
    </div>

</body>

</html>