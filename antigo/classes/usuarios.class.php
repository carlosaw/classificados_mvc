<?php
class Usuarios {

  public function getTotalUsuarios() {
    global $pdo;

    $sql = $pdo->query("SELECT COUNT(*) as c FROM usuarios");
    $row = $sql->fetch();//Pra pegar o item do resultado.

    return $row['c'];//Retorna q qtde de usuarios do BD.
  }

	public function cadastrar ($nome, $email, $senha, $telefone) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {//Se já tiver este email

			$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome,
				email = :email, senha = :senha, telefone = :telefone ");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();
			
			return true;
	} else {// dar um if o $u em cadastre-se.php
		return false;
	}
  
  }

  public function login($email, $senha) {
  	global $pdo;

  	$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
  	$sql->bindValue(":email", $email);
  	$sql->bindValue(":senha", $senha);
  	$sql->execute();

  	if($sql->rowCount() > 0) {
  		$dado = $sql->fetch();
  		$_SESSION['cLogin'] = $dado['id'];
  		return true;
   } else{
   	    return false;
   }
  }
  /*public static function getNome($id) {
  	global $pdo;
  	$sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
  	$sql->bindValue(":id", $id);
  	$sql->execute();

  	if($sql->rowCount() > 0) {
  		$dado - $sql->fetch();
  		$_SESSION['cLogin'] = $dado['nome'];
  	}
  }*/

}
?>