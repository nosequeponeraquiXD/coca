<?php
require_once 'cabecalho.php';
?>

<form action="tarea2.php" method="POST">
	<h1>Cadastro</h1>
	<p>Digite o Nome:</p>
	<p><input type="text" name="nome" required></p>
	<p>Digite a matricula:</p>
	<p><input type="number" name="matricula"></p>
	<p>Digite o setor:</p>
	<p><input type="text" name="setor"></p>
	<p>Digite o valor:</p>
	<p><input type="number" name="valorh" required></p>
	<p>Digite o N&ordm; de horas:</p>
	<p><input type="number" name="horast" required></p>
	<p>Digite o imposto (em porcentaje): </p>
	<p><input type="number" name="imposto"></p>
	<p>Digite o inss (em porcentaje):</p>
	<p><input type="number" name="inss"></p>
	<p><input type="submit" name="botao" value="Calcular"></p>

</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'Funcionario.php';
		$numero= new Funcionario();
		$numero->setMatricula($_POST['matricula']);
		$numero->setNome($_POST['nome']);
		$numero->setSetor($_POST['setor']);
		$numero->setHorast($_POST['horast']);
		$numero->setValorh($_POST['valorh']);
		$numero->setImposto($_POST['imposto']);
		$numero->setInss($_POST['inss']);
		echo "<div>";
		echo "<p>Nome: ".$numero->getNome()."</p>";
		echo "<p>Numero de matricula: ".$numero->getMatricula()."</p>";
		echo "<p>Salario bruto: ".$numero->calcularSalarioBruto()."</p>";
		echo "<p>Salario liquido: ".$numero->calcularSalarioLiq($numero->calcularSalarioBruto())."</p>";
		echo "</div>";




	}
?>
</body>
</html>