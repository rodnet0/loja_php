<?php 
	require('Autoload.php');
	session_start();
	if (isset($_GET["logout"])) {
	    if ($_GET["logout"] == 'confirmar') {
	        Login::deslogar();
	    }
	}
	if (isset($_SESSION["logado"])) {
	    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Loja de Discos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<nav class="border-bottom border-secondary py-3">
	<ul class="nav nav-pills justify-content-center">
		<li class="nav-item">
			<a class="nav-link" href="home.php"><b>LOJA DE DISCOS</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="home.php">HOME</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="cadastrar.php">CADASTRAR</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"><?php echo $_SESSION["usuarios"]; ?></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="home.php?logout=confirmar">SAIR</a>
		</li>
	</ul>
</nav>
<?php 
	} 
	else{
		echo "<center><h3>ACESSO NEGADO!!!</h3></center>"; 
		exit();
	}
?>	
