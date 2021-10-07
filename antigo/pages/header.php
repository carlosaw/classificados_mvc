<?php require 'config.php'; ?>
<html>
<head>
		<meta charset="UTF-8">
    <title>Classificados</title>  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />

  <!--Pegar primeiro jquery depois bootstrap-->
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>

</head>
  <body>
   
	   <nav class="navbar navbar-inverse navbar-fixed-top">
	   		<div class="container-fluid">
	   			<div class="navbar-header">
	   				<a href="./" class="navbar-brand">Classificados</a>
	   			</div>
	   			<ul class="nav navbar-nav navbar-right">
	   				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): 

	   				 $id= $_SESSION['cLogin'];
                     global $pdo;
                     $sql="SELECT nome  FROM usuarios WHERE id ='$id'";
                     $sql= $pdo->query($sql);
                     $nome = $sql->fetch();
	   				?> 
		   				<li class="cor"><a>Olá  <?php echo $nome['nome']; ?></a></li>
		   				<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
	   				  <li><a href="sair.php">Sair</a></li>
		   				
	   				<?php else: ?>
	   				    <li><a href="cadastre-se.php">Cadastre-se</a></li>
		   					<li><a href="login.php">Login</a></li>
	   			    <?php endif; ?>
	   			</ul>
	   		</div>
	   </nav><br/><br/><br/>