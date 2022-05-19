<?php
	require_once('header.php');
    $pdo = Conect::getInstance();
?>
<body>
	<div class="container mt-3">
		<h1>Loja de Discos</h1>
		<div class="col-sm-12">
			<table class="table mt-4">
				<tr>
					<th>ID</th>
					<th>NOME</th>
					<th>ARTISTA</th>
					<th>GRAVADORA</th>
					<th>EDITAR</th>
				</tr>
				<?php
					$sql = ('SELECT id, nome, autor, gravadora FROM discos');
					$statement = $pdo->prepare($sql);
				    $statement->execute();
					$produtos = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach ($produtos as $produto) {
					    echo "<tr>";
					    echo "<td>".$produto['id']."</td>";
					    echo "<td>".$produto['nome']."</td>";
					    echo "<td>".$produto['autor']."</td>";
						echo "<td>".$produto['gravadora']."</td>";
						echo "<td><a href='edit.php?id={$produto['id']}' class='btn btn-primary'>Editar</a></td>";
					    echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
