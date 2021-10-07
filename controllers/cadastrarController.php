<?php

class cadastrarController extends controller {

	public function index() {
		$dados = array();

		$u = new Usuarios();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);
		
		//Verificar se os campos foiram preenchidos
		if(!empty($nome) && !empty($email) && !empty($senha)) {
			if($u->cadastrar($nome, $email, $senha, $telefone)) {
			$dados['msg'] = '<div class="alert alert-success">
                    <strong>Parab�ns!</strong> Cadastrado com sucesso. <a href="'.BASE_URL.'login" class="alert-link">Fa�a o login agora</a>
                </div>';

            } else {

                $dados['msg'] = '<div class="alert alert-warning">
                    Este usu�rio j� existe! <a href="'.BASE_URL.'login" class="alert-link">Fa�a o login agora</a>
                </div>';
            }
        } else {
            $dados['msg'] = '<div class="alert alert-warning">
                Preencha todos os campos
            </div>';
         }

    }
	  $this->loadTemplate('cadastrar', $dados);
	}
}