<?php
require_once 'cabecalho.php';

if (isset($_POST['id'])&& isset($_POST['botao'])) {
	require_once 'model/Produto.php';
	require_once 'persistence/ProdutoPA.php';
	$produto=new Produto();
	$produtopa=new ProdutoPA();
	$consulta=$produtopa->buscarPorId($_POST['id']);
	if (!$consulta) {
		echo "<h2>Produto não encontrado</h2>";
	}else{
		while ($linha=$consulta->fetch_assoc()) {
			$produto->setId($linha['id']);
			$produto->setNome($linha['nome']);
			$produto->setDescricao($linha['descricao']);
			$produto->setValor($linha['valor']);
			$produto->setImagem($linha['imagem']);
		}
?>
	<section class="detalhes">
		<div id="img_produto">
			<img src="data:img/jpg;base64,<?= base64_encode($produto->getImagem()) ?>">
		</div>
		<div id="campos">
			<h1><?= $produto->getNome() ?></h1>
			<p>R$<?= $produto->getValor() ?></p>
			<div id="comprar">
				<?php
				if (isset($_COOKIE['cliente'])) {
				 	echo "<form action='carrinho.php' method='POST'>";
				 	echo "<input type='hidden' name='id' value='".$produto->getId()."'>";
				 	echo "<p><input type='submit' name='botao' value='Adicionar' class='cart'>&#128722;</p>";
				 	echo "</form>";
				 }else{
				 	echo "<p>Favor logar para comprar!</p>";
				 } 
				?>
			</div>
		</div>
	</section>
	<section class="descricao">
		<p><?= $produto->getDescricao()?></p>
	</section>

<?php
	}

}else{
	echo "<h2>Voce deve escolher um produto primeiro</h2>";

}

?>
</body>
</html>