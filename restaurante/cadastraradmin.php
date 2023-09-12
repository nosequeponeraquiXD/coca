<?php  
require_once 'cabecalho.php';
if (isset($_COOKIE['admin'])) {

?>
<form action="cadastraradmin.php" method="POST" class="normal">
	<h1>Cadastrar Usuário</h1>
	<p>Usuário: <input type="text" name="usuario" size="20" maxlength="20" required></p>
	<p>Senha: <input type="password" name="senha" size="10" maxlength="10" required></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>
<?php
if (isset($_POST['botao'])) {
	require_once 'model/Usuario.php';
	require_once 'persistence/UsuarioPA.php';
	$usuario=new Usuario();
	$usuariopa=new UsuarioPA();

	$usuario->setUsuario($_POST['usuario']);
	$usuario->setSenha($_POST['senha']);
	$id=$usuariopa->retornarUltimo();
	if ($id>0) {
		$id++;
	}else{
		$id=1;
	}
	$usuario->setId($id);
	$resp=$usuariopa->cadastrar($usuario);
	if (!$resp) {
		echo "<h2>Erro na tentativa de cadastrar usuario!</h2>";
	}else{
		echo "<h2>Você agora é admin!</h2>";
	}
}
}else{
	echo "<h2>voce não está logado! Favor logar!</h2>";
	header('location: index.php');
}
?>
</body>
</html>