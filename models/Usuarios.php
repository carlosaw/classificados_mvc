<?php
class Usuarios extends model {

  public function getTotalUsuarios() {
    

    $sql = $this->db->query("SELECT COUNT(*) as c FROM usuarios");
    $row = $sql->fetch();//Pra pegar o item do resultado.

    return $row['c'];//Retorna q qtde de usuarios do BD.
  }

	public function cadastrar ($nome, $email, $senha, $telefone) {
		
		$sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {//Se já tiver este email

			$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome,
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
  	
  	$sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
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
  	
  	$sql = $this->db->prepare("SELECT nome FROM usuarios WHERE id = :id");
  	$sql->bindValue(":id", $id);
  	$sql->execute();

  	if($sql->rowCount() > 0) {
  		$dado - $sql->fetch();
  		$_SESSION['cLogin'] = $dado['nome'];
  	}
  }*/

}
?>