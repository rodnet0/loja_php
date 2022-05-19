<?php
	require_once('header.php');
    $pdo = Conect::getInstance();
	$id = $_GET["id"];
?>
<body>
	<div>
		<center>
			<?php
				try{
					$sql = ("DELETE FROM discos WHERE id = :id");
					$statement = $pdo->prepare($sql);
					$statement->bindParam(':id',$id,PDO::PARAM_INT);
					$statement->execute();
					//echo "<img src='img/delete.png'><br>";
					echo "<h5 class='alert alert-success mt-3'>Item deletado com sucesso</h5>";
					echo "<a href='home.php' class='btn btn-primary'>Voltar</a>";
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			?>
		</center>
	</div>
</body>
