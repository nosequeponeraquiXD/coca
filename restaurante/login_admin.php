<?php
require_once 'cabecalho.php';

?>
<form action="login_admin.php" class="normal" method="POST">
	<h1>Login Administrador</h1>
	<p>Usuario:<input type="text" name="usuario" size="20" maxlength="20" pattern="[0-9a-zA-Z_]{1,20}" required></p>
	<p>Senha:<input type="password" name="senha" size="10" maxlength="10" pattern="[0-9a-zA-Z_\s@]{1,10}"></p>
	<p><input type="submit" name="botao" value="Logar"></p>
</form>
<?php
if (isset($_POST['botao'])) {
	require_once 'model/Usuario.php';
	require_once 'persistence/UsuarioPA.php';
	$usuario=new Usuario();
	$usuariopa=new UsuarioPA();

	$usuario->setUsuario($_POST['usuario']);
	$usuario->setSenha($_POST['senha']);
	$resp=$usuariopa->logar($usuario->getUsuario(),$usuario->getSenha());
		if ($resp) {
		echo "<h2>Bem vindo ".$usuario->getUsuario()."!</h2>";
		setcookie("admin",$usuario->getUsuario());
		echo "<a href= 'administracao.php'>Entrar</a>";
		}else{
			echo "<h2>Login Inconrreto!</h2>";
		}

}
?>
</body>
</html>