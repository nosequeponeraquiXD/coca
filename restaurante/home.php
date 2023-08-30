<?php

require_once 'cabecalho.php';
require_once 'persistence/ProdutoPA.php';
	
	if (isset($_POST['inicio'])) {
		$inicio=$_POST['inicio'];
		$fim=$inicio+4;
	}else{
	$inicio=1;
	$fim=5;
    }	
	$produtopa=new ProdutoPA();
	$consulta=$produtopa->listar($inicio,$fim);

	if (!$consulta) {
		echo "<h2>Estamos preparando os pratos!</h2>";
	}else {	
		echo "<section>";
		while ($linha=$consulta->fetch_assoc()) {
			echo "<div id='produto'>";
			echo "<h2>".$linha['nome']."</h2>";
			echo "<img src='data:image/jpg;base64,".base64_encode($linha['imagem'])."'/>";
			echo "<p>".$linha['valor']."</p>";
			echo "<form action='detalhe.php' method='POST'>";
			echo "<input type='hidden' name='id' value='".$linha['id']."'>";
			echo "<input type='submit' name='botao' value='ver' class='ver'>";
			echo "</form>";
			echo "</div>";
		}
		echo "</section>";

		echo "<section>";
		$max=$produtopa->retornarUltimo();
		if ($fim<$max) {
			$inicio=$fim+1;
			echo "<form action='home.php' method='POST'>";
			echo "<input type='hidden' name='inicio' value='$inicio'>";
			echo "<input type='submit' name='botao' value='Mais...' class='mais'>";
			echo "</form>";
		}
		echo "</section>";

	}



?>

</body>
</html>