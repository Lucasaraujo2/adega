<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDrink - MinhaConta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>

<body>
    <nav class="top-login">
        <a href="index.html" class="logo">
            <i class="bi bi-arrow-left"></i>
            <p> INICIO </p>
        </a>






    </nav>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça login<br>E desfrute das melhores bebidas.</h1>
            <img src="img/adegaa.png" class="left-login-image" alt="Adega Cozinheiro">

        </div>
        <div class="right-login">
        <form action="#" method="POST" class="right-login">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <button class="btn-login">Acessar</button>
                <div class="text-btn">
                    <p>Não tem uma conta? <a href="registrar.html">Registrar</a></p>

                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST)) {
        var_dump($_POST);
        $USER = $_POST['usuario'];

        $password = $_POST['senha'];

        $conn = new PDO("mysql:host=localhost;dbname=bbb", "root", "");

        $script = "SELECT * FROM tb_usuario WHERE usuario = '{$USER}' AND senha = '{$password}'";

        $resultado = $conn->query($script)->fetch();

        if (!empty($resultado)) {
            echo 'Usuario Validado com sucesso!!!';

            header(('location:valido.php'));
        } else {
            echo 'Usuario não encontrado.';
        }
    }
    ?>


</body>

</html>