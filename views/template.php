<html>
<head>
	<meta charset="UTF-8">
	<title>Classificados</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>
	assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>
	assets/css/bootstrap.min.css.map" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>
	assets/css/bootstrap.css.map" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>
	assets/css/style.css" />
	
</head>
<body>
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
	   		<div class="container-fluid">
	   			<div class="navbar-header">
	   				<a href="<?php echo BASE_URL; ?>" class="navbar-brand">Classificados</a>
	   			</div>
	   			<ul class="nav navbar-nav navbar-right">
	   				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): 

	   				 $id= $_SESSION['cLogin'];
                     global $db;
                     $sql="SELECT nome  FROM usuarios WHERE id ='$id'";
                     $sql= $db->query($sql);
                     $nome = $sql->fetch();
	   				?> 
		   				<li class="cor"><a>Olá  <?php echo $nome['nome']; ?></a></li>
		   				<li><a href="<?php echo BASE_URL; ?>MeusAnuncios">Meus Anúncios</a></li>
	   				    <li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
		   				
	   				<?php else: ?>
	   				    <li><a href="<?php echo BASE_URL; ?>cadastrar">Cadastre-se</a></li>
		   				<li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
	   			    <?php endif; ?>
	   			</ul>
	   		</div>
	   </nav><br/><br/><br/>
	

	<?php $this->loadViewInTemplate($viewName, $viewData); ?>

	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	
	</body>
</html>