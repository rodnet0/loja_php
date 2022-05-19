<?php
	require_once('header.php');
    $pdo = Conect::getInstance();
?>
<body>
	<div class="container mt-3">
		<h2>Cadastro de Produtos</h2>
		<div class="col-sm-8">
			<form action="cadastro_produto.php" method="post">
				<label>Título:</label>
				<input type="text" name="nome" class="form-control" required>
				<label>Artista:</label>
				<input type="text" name="autor" class="form-control" required>
				<label>Tipo:</label>
				<select name="tipo" class="form-control">
					<option>CD</option>
					<option>DVD</option>
				</select>
				<label>Gênero:</label>
				<input type="text" name="genero" class="form-control" required>
				<label>Gravadora:</label>
				<input type="text" name="gravadora" class="form-control">
				<div><input type="submit" name="confirmar" value="Confirmar" class="btn btn-info my-2"></div>
				<small>Ao clicar em confirmar os dados serão gravados na base de dados.</small>
			</form>
		</div>
	</div>
</body>
