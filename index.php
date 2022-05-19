<?php
	session_start();
    require ('Autoload.php');
    if (isset($_POST["btn-logar"])) {
        $login = filter_input(INPUT_POST,"login",FILTER_SANITIZE_MAGIC_QUOTES);
        $senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_MAGIC_QUOTES);
        $log = new Login;
        $log->setLogin($login);
        $log->setSenha($senha);
        if ($log->logar()) {
            header("location: home.php");
        }
        else {
            $erro = "<b class='alert alert-danger'>Usuário ou senha inválidos</b>";
        }
    }
    if (isset($_SESSION["logado"])) {
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Cadastro de CDs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<h3 class="p-3">Cadastro de CDs</h3><hr>
	<div class="container">
		<div id="login">
			<form action="" method="post" class="formulario">
				<div class="row">
					<label>Usuário</label>
					<input type="text" name="login" class="form-control" required>
					<label>Senha</label>
					<input type="password" name="senha" class="form-control" required>
					<input type="submit" name="btn-logar" value="Logar" class="btn btn-primary btn-block mt-3">
				</div>
			</form>
			<?php echo isset($erro) ? $erro : ''; ?>
		</div>
	</div>
</body>
</html>
