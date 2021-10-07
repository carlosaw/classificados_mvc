<div class="container">
	<h1>Meus Anúncios</h1>

	<a href="add-anuncio.php" class="btn btn-default">Adicionar Anúncio</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Titulo</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<?php
		require 'classes/anuncios.class.php';
		$a = new Anuncios();
		$anuncios = $a->getMeusAnuncios();

		foreach($anuncios as $anuncio):
		?>
		<tr>
			<td>
				<?php if(!empty($anuncio['url'])): ?>
				<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" />
				
				<?php else: ?>
				<img src="<?php echo BASE_URL; ?>assets/images/default.png/" height="50" border="0" />	
				
				<?php endif; ?>
			</td>
			<td><?php echo $anuncio['titulo']; ?></td>
			<td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
			<td>
				<a href="<?php echo BASE_URL; ?>editar?id=<?php echo $anuncio['id']; ?>" class="btn btn-default">Editar</a>
					
				<a href="<?php echo BASE_URL; ?>excluir-anuncio<?php echo $anuncio['id']; ?>" class="btn btn-danger" onclick="if(confirm('Confirma?')) window.location.href='<?php echo BASE_URL; ?>excluir-anuncio=<?php echo $anuncio['id']; ?>'">Excluir</a>
					
			</td>
		</tr>
	    <?php endforeach; ?>
	</table>
</div>