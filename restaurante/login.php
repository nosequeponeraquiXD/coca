<?php

require_once 'cabecalho.php';

?>

<form action="login.php" method="POST" class="normal">
	<h1>Login Cliente</h1>
	<p>Digite o nome:</p>
	<p><input type="text" name="nome" size="25" maxlength="25" required></p>
	<p>Digite o cpf:</p>
	<p><input type="number" name="cpf" required></p>
	<p><input type="submit" name="botao" value="Logar"></p>
</form>


<?php

	if (isset($_POST['botao'])) {
		require 'persistence/ClientePA.php';
		$clientepa=new ClientePA;
		$resp=$clientepa->logar($_POST['nome'],$_POST['cpf']);
		if (!$resp) {
			echo "<h2>Login Inconrreto!</h2>";
		}else{
			//setcookie("cliente",$_POST['cpf'],time()+172800); para hacer que la persona no tenga que hacer login siempre mantiene la cuenta abierta
			setcookie("cliente",$_POST['cpf']);
			echo "<h2>Login com succeso!</h2>";
			echo "<section><a href='administracao.php'>Entrar</a></section>";

		}
	}
  ?>

</body>
</html>