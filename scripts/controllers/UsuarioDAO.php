<?php 


/**
 * 
 */
class UsuarioDAO {
	/**
	 * [login description]
	 * @param  [type] $email [description]
	 * @param  [type] $senha [description]
	 * @return [type]        [description]
	 */
	public function login($dados){
		//recupero as credencias enviadas por post
			$email = $dados['email'];
			$senha = $dados['senha'];
		if (!empty($email) && !empty($senha)) {
			if (strcmp($senha, "123456") == 0 && strcmp($email, "pablo@gmail.com") == 0) {
				$logado=true;
				$_SESSION['logado']=$logado;
				header('Location:produtos.php');
			} else {
				echo "<h3>Credenciais Incorretas</h3>";
			}
		}
	}
	
}