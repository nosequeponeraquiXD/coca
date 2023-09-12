<?php  
require_once 'cabecalho.php';

echo "<form action='alteraradmin.php' method='POST' class='normal'>";
echo "<h1>Alterar ".$_COOKIE['admin']."</h1>";
require_once 'persistence/UsuarioPA.php';
require_once 'model/Usuario.php';
$usuario=new Usuario();
$usuariopa=new UsuarioPA();
$consulta=$usuariopa->listar();
if (!$consulta) {
	echo "<h2>Erro ao tentar recuperar dados de Usuario!</h2>";
}else{
	
	echo "<select name='usuarios'>";
	while ($linha=$consulta->fetch_assoc()) {
		$usuario->setId($linha['id']);
		$usuario->setUsuario($linha['usuario']);
		$usuario->setSenha($linha['senha']);
		echo "<option value='".$usuario->getId()."'>".$usuario->getUsuario()."</option>";
		
	}
	echo "</select>";
	echo "<p>Mudar:</p>";
	echo "<p><input type='radio' name='tipo' value='usuario'>Usuario</p>";
	echo "<p><input type='radio' name='tipo' value='senha'>Senha</p>";
	echo "<p>Para: <input type='text' name='para' size='20'></p>";
	echo "<p><input type='submit' name='botao' value='Alterar'></p>";
}
echo "</form>";

if (isset($_POST['botao'])) {
	if ($_POST['tipo']=="usuario") {
		$usuario->setUsuario($_POST['para']);
		$usuario->setId($_POST['usuarios']);
		$resp=$usuariopa->alterar($usuario,$_POST['tipo']);
	}else if($_POST['tipo']=="senha"){
		$usuario->setSenha($_POST['para']);
		$usuario->setId($_POST['usuarios']);
		$resp=$usuariopa->alterar($usuario,$_POST['tipo']);
	}
	if (!$resp) {
		echo "<h2>Erro na tentativa de alterar Usuario!</h2>";
	}else{
		echo "<h2>Usuario alterado com succeso!</h2>";
	}
}
?>
</body>
</html>