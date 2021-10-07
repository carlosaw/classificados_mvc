<?php 
class MeusAnunciosController extends controller {
	public function index() {

        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();
        
        $dados['anuncios'] = $anuncios;
        
        $this->loadTemplate('anuncios',$dados);

    }
    public function editar() {

        $dados = array();

        $a = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	$estado = addslashes($_POST['estado']);
	
	if(isset($_FILES['fotos'])) {
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}
	$a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);
	?>
	<div class="alert alert-success">
		Produto editado com Sucesso!
	</div>
	<?php
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$info = $a->getAnuncio($_GET['id']);
} else {
	?>
	<script type="text/javascript">window.location.href="MeusAnuncios.php";</script>
	<?php
	exit;
}
     $dados['info'] = $info;
        $this->loadTemplate('editar',$dados);
    }
   
    public function excluirFoto() {
	$dados = array();

    $a = new Anuncios();

	if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id_anuncio = $a->excluirFoto($_GET['id']);
	}

	if(isset($id_anuncio)) {
	header("Location: editar?id=".$id_anuncio);
	}else {
    header("Location: MeusAnuncios");
	}
	
	$dados['id_anuncio'] = $id_anuncio;
	$this->loadTemplate('excluirFoto', $dados);
    }
}




		 
		
       

	
