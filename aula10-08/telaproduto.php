<?php
require_once 'cabecalho.php';
?>

<form action="telaproduto.php" method="POST">
	<h1>Cadastro de produto</h1>
	<p>Digite um produto</p>
	<p><input type="text" name="produto" size="30" maxlength="30" required></p>
	<p>Digite a quantidade</p>
	<p><input type="number" name="quantidade" min="1" max="99" required></p>
	<p>Digite o valor unitario:</p>
	<p><input type="text" name="valor" pattern="[0-9.]{4,10}" title="Apenas ponto e não vírgula exemplo 99.99" placeholder="99.99" required></p>
	<p>Escolha o tipo de pagamento</p>
	<p><select name="opcao">
		<option value="avista">À vista</option>
		<option value="aprazo">A prazo</option>
	</select></p>
	<p><input type="submit" name="botao" value="Comprar"></p>
</form>
<?php
if (isset($_POST['botao'])) {
	require_once 'Produto.php';
	$produto= new Produtos();
	$produto->setNome($_POST['produto']);
	$produto->setQuantidade($_POST['quantidade']);
	$produto->setValoru($_POST['valor']);
	$produto->setPagamento($_POST['opcao']);
	echo "<div>";
	echo "<p>Nome:".$produto->getNome()."</p>";
	echo "<p>Total R$".$produto->calcularTotal()."</p>";
	echo "<p>Com a opção de pagamento escolhida fica R$ ".$produto->verificarPagamento($produto->calcularTotal(),$produto->getPagamento())."</p>";
	echo "</div>";


}
?>
</body>
</html>