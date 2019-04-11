<?php
	include_once('../includes/headerLogin.php');
	include_once('../scripts/controllers/UsuarioDAO.php');
	$logado=$_SESSION['logado'];
?>
<html>
	<head>
		<Title> Login </title>
		<link href="css\estilo.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="shortcut icon" href="..\imagens\favicon.ico" type="image/x-icon" />
		<meta charset="UTF-8">
		<style>
			.container {

				width: 100vw;
				height: 50vh;
				display: flex;
				flex-direction: row;
				justify-content: center;
				align-items: center
			}

			.box {

				width: 300px;
				height: 200px;
				background: #87CEEB;
			}

			body {
				margin: 0px;
			}

			input {
				margin: 5px 0;
				width: 100%;
			}

			.box a {
				text-decoration: underline;
				color: purple;
			}

			h3 {
				text-align: center;
				color: red;
			}
		</style>
	</head>
	<body>
		<header>
			<center><img src="..\imagens\icon.png" class="imagem-logo"></center>
			<h1 class="nome">Mini Mercado Quase Tudo</h1>
			<table>
				<tr>
					<th class="menu"> <A href="index.html">Inicio</A> </th>
					<th class="menu"> <A href="produtos.php">Produtos</A> </th>
					<th class="menu"> <A href="carrinho.php">🛒 Carrinho</A></th>
					<th class="menu"> <A href="login.php">Login</A> </th>
				</tr>
			</table>
		</header>
		<main>
			<h2>Login</h2>
	<?php
		if ($logado == false) {	
			//verifica se não existe uma variavel post para logar
			if (isset($_POST['logar'])) {
				//crio um objeto da classe controller UsuarioDAO
				$dao = new UsuarioDAO;
				//faço a chamada da função login da controller 
				$result = $dao->login($_POST);
			}
	?>		
			<div class="container">
				<div class="box">
					<form action="login.php" method="post">
						<br>
						Email:<input type="email" name="email">
						Senha:<input type="password" name="senha"><br>
						<a href="#">Esqueci Minha Senha<a><br><br><br>
						<input type="submit" name="logar" value="Entrar">
					</form>
				</div>
			</div>
	<?php
		}else{
	?>
			<h1>Logado!<h1>
			<form  action="login.php" method="post">
				<input style="width:100px ;" type="submit" name="sair" value="Sair">
			</form>

	<?php
		} 
	?>
		</main>
	</body>
</html>