<?php
	require_once('header.php');
    $pdo = Conect::getInstance();
	$id = $_GET["id"];
?>
<body>
	<div class="container mt-3">
		<h2>Informações do Album</h2>
		<form method="post" action="#!">
			<?php
				$sql = ("SELECT id,nome,autor,tipo,genero,data,gravadora FROM discos WHERE id = :id");
			    $statement = $pdo->prepare($sql);
			    $statement->bindParam(':id',$id,PDO::PARAM_STR);
			    $statement->execute();
			    $produtos = $statement->fetchAll(PDO::FETCH_ASSOC);
			    foreach ($produtos as $key => $value) {
			        $id_album = $value['id'];
			        echo "<label>Título:</label><input type='text' name='nome' class='form-control' value='{$value['nome']}' required>";
					echo "<label>Artista:</label><input type='text' name='autor' class='form-control' value='{$value['autor']}' required>";
					$value['tipo'] = $value['tipo'] == 1 ? 'CD' : 'DVD';
					echo "<label>Tipo:</label><input type='text' name='tipo' class='form-control' value='{$value['tipo']}' disabled>";
					echo "<label>Gênero:</label><input type='text' name='genero' class='form-control' value='{$value['genero']}' required>";
					echo "<label>Data:</label><input type='text' name='data' class='form-control' value='{$value['data']}' disabled>";
					echo "<label>Gravadora:</label><input type='text' name='gravadora' class='form-control' value='{$value['gravadora']}' required>";
					echo "<input type='submit' name='botao' value='Alterar' class='btn btn-primary m-3'>";
					echo "<a href='exclui.php?id=$id' class='btn btn-danger'>Excluir</a>";
			    }
			?>
		</form>
		<?php
			if(isset($_POST["botao"])){
				$nome = $_POST["nome"];
				$autor = $_POST["autor"];
				$genero = $_POST["genero"];
				$gravadora = $_POST["gravadora"];
				try{
					$sql = ("UPDATE discos SET nome = :nome, autor = :autor, genero = :genero, gravadora = :gravadora WHERE id = :id");
					$statement = $pdo->prepare($sql);
					$statement->bindParam(':nome',$nome,PDO::PARAM_STR);
					$statement->bindParam(':autor',$autor,PDO::PARAM_STR);
					$statement->bindParam(':genero',$genero,PDO::PARAM_STR);
					$statement->bindParam(':gravadora',$gravadora,PDO::PARAM_STR);
					$statement->bindParam(':id',$id,PDO::PARAM_INT);
					$statement->execute();
					echo "<h5 class='alert alert-success mt-3'>Item atualizado com sucesso</h5>";
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		?>
	</div>
</body>
