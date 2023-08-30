<?php

require_once 'cabecalho.php';

?>

<form action="cadastrarcliente.php" method="POST" class="normal">
	<h1>Cadastrar Cliente</h1>
	<p>Nome:<input type="text" name="nome" required></p>
	<p>Cpf:<input type="number" name="cpf"required></p>
	<p>Endereço<input type="text" name="endereco" cols="100" required></p>
	<p>Bairro:<input type="text" name="bairro" required></p>
	<p>Telefone:<input type="number" name="telefone" pattern="[0-9,.]" maxlength="14"></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>

<?php

	if (isset($_POST['botao'])) {
		require_once 'model/Cliente.php';
		require_once 'persistence/ClientePA.php';
		$cliente=new Cliente();
		$clientepa=new ClientePA();


		$cliente->setNome($_POST['nome']);
		$cliente->setCpf($_POST['cpf']);
		$cliente->setEndereco($_POST['endereco']);
		$cliente->setBairro($_POST['bairro']);
		$cliente->setTelefone($_POST['telefone']);
		$id=$clientepa->retornarUltimo();
		if ($id>=0) {
			$id++;
		}else{
			$id=1;
		}
		$cliente->setID($id);
		$resp=$clientepa->Cadastrar($cliente);
		if (!$resp) {
			echo "<h2>Erro na tentativa de Cadastrar! Tente Novamente!</h2>";

		}else{
			echo "<h2>Cliente cadastrado com succeso!</h2>";

		}


	}





?>
</body>
</html>




</form>