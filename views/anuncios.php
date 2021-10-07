<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="<?php echo BASE_URL; ?>anuncios/add/" class="btn btn-default">Adicionar Anúncio</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Foto</th>
            <th>Título</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($anuncios as $anuncio): ?>
            <tr>
                <td>
                    <?php if(!empty($anuncio['url'])): ?>
                        <img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?=$anuncio['url']?>" height="100" border="0" />
                    <?php else: ?>
                        <img src="<?php echo BASE_URL; ?>assets/images/default.png" height="100" border="0" />
                    <?php endif; ?>
                </td>
                <td><?=$anuncio['titulo']?></td>
                <td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>MeusAnuncios/editar?id=<?php echo $anuncio['id']; ?>"
                    class="btn btn-default">Editar</a>
                    <a href="anuncios/excluir/<?=$anuncio['id']?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
</div>