<?php
	require_once('header.php');
    $pdo = Conect::getInstance();
	
	$nome = $_POST["nome"];
	$autor = $_POST["autor"];
	$genero = $_POST["genero"];
	$gravadora = $_POST["gravadora"];
	$data = date('Y-m-d');//recebendo a data atual
	    
	if (isset($_POST["tipo"]) == 'CD') {
	    $tipo = 1;
	}else{
		$tipo = 2;
	}
//	var_dump($nome);
//	var_dump($autor);
//	var_dump($genero);
//	var_dump($gravadora);
//	var_dump($data);
//	var_dump($tipo);
?>
<body>
	<div class="container">
		<center>
			<?php
				try{
					$sql = ("INSERT INTO discos(nome,autor,tipo,genero,data,gravadora) VALUES (:nome, :autor, :tipo, :genero, :data, :gravadora)");
					$statement = $pdo->prepare($sql);
					$statement->bindParam(':nome',$nome,PDO::PARAM_STR);
					$statement->bindParam(':autor',$autor,PDO::PARAM_STR);
					$statement->bindParam(':tipo',$tipo,PDO::PARAM_STR);
					$statement->bindParam(':genero',$genero,PDO::PARAM_STR);
					$statement->bindParam(':data',$data,PDO::PARAM_STR);
					$statement->bindParam(':gravadora',$gravadora,PDO::PARAM_STR);
					$statement->execute();
					echo "<h5 class='alert alert-success mt-3'>Item cadastrado com sucesso</h5>";
				}catch(PDOException $e){
					echo $e->getMessage();
				}							
			?>
			<a href="cadastrar.php" class="btn btn-primary">Voltar</a>
		</center>
	</div>
</body>
