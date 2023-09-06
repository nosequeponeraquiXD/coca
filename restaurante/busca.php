<?php
require_once 'cabecalho.php';

if (isset($_GET['botao'])&&isset($_GET['busca'])) {
	require_once 'persistence/ProdutoPA.php';
	$produtopa=new ProdutoPA();
	$consulta=$produtopa->buscar($_GET['busca']);
	if(!$consulta){
		echo "<h2>Nenhum Produto correspondente!</h2>";
	}else{
		echo "<section>";
		while($linha=$consulta->fetch_assoc()){
			echo "<div id='produto'>";
			echo "<h2>".$linha['nome']."</h2>";
			echo "<img src='data:image/jpg;base64,".
			base64_encode($linha['imagem'])."'>";
			echo "<p>R$ ".$linha['valor']."</p>";
			echo "<form action='detalhe.php' method='POST'>";
			echo "<input type='hidden' value='".$linha['id']."'
			name='id'>";
			echo "<input type='submit' name='botao' value='Ver'
			class='ver'>";
			echo "</form>";
			echo "</div>";
		}
		echo "</section>";
	}
}else{
	echo "<h2>Digite alguma busca &uarr;</h2>";
}
?>
</body>
</html>