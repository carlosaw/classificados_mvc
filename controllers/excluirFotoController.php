<?php 

class excluirFotoController extends controller {
	public function index() {
	}
	public function excluirFoto() {
		$dados = array();
		$a = new Anuncios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id_anuncio = $a->excluirFoto($_GET['id']);
}

if(isset($id_anuncio)) {
	header("Location: editar.php?id=".$id_anuncio);
}else {
    header("Location: MeusAnuncios.php");
}
	
	$this->loadTemplate('excluirFoto', $dados);
	
	}
}