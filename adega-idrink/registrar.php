<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>


</head>

<?php
include 'include/header.php';

 ?>

<?php
include "./classe/Usuario.php";

if (isset($_POST) && !empty($_POST)) {

	$user = $_POST['usuario'];
	$password = $_POST['senha'];

	$Usuario = new Usuario();
	$Usuario->ValidarUsuario($user, $password);
}
?>


<body>
    <nav class="top-registrar">
        <a href="index.php" class="logo">
            <i class="bi bi-arrow-left"></i>
            <p> INICIO </p>
        </a>






    </nav>
    <div class="main-registrar">
        <div class="left-registrar">
            <h1>Cadastre-se já<br>E ganhe descontos na hora.</h1>
            <img src="img/adegaa.png" class="left-registrar-image" alt="Adega Cozinheiro">
            
        </div>
        <div class="right-registrar">
            <div class="card-registrar">
                <h1>REGISTRE-SE</h1>
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="text" name="Email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <div class="textfield">
                    <label for="senha2">Confirmar a senha</label>
                    <input type="text" name="senha" placeholder="Digite sua senha novamente">
                </div>
                <button class="btn-registrar">Cadastrar</button>
                <div class="text-btn">
                    <p>Já tem uma conta? <a href="minhaconta.php">Entrar</a></p> 

                </div>
            </div>
        </div>
    </div>
</body>
</html>