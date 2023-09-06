<?php
require_once 'cabecalho.php';

?>
<section class="topo">
	<div id="logo">
		<a href="index.php">
			<img src="img/logo.png">
		</a>
	</div>
	<div id="nome">
		<h1><span>B</span>urger <span>M</span>aster&reg;</h1>
	</div>
	<div id="busca">
		<form class="busca" action="busca.php" method="GET" target="quadro">
			<input type="search" name="busca">
			<input type="submit" name="botao" value="&#128269;">
		</form>
	</div>
	<div id="links">
		<ul class="nave">
<?php
	if (isset($_COOKIE['cliente'])) {
		echo "<li>Cpf: ".$_COOKIE['cliente']."</li>";
		echo "<li><a href='sair.php'>Sair</a></li>";
	}else{	
?>
			<li><a href="login.php">Login</a></li>
			<li><a href="cadastrarcliente.php" target="quadro">Cadastrar-Se</a></li>
<?php  
}
?>
			<li><a href="administracao.php">Admin</a></li>
			<li><a href="carrinho.php" target="quadro">&#128722;</a></li>
		</ul>
	</div>
</section>
<section class="conteudo">
	<iframe src="home.php" id="quadro" name="quadro"></iframe>
</section>
<section class="rodape">
	<div id="sobre">
		<p>Burguer Master&reg;</p>
		<p>Rua X de Y, 99</p>
		<p>Ponta Grossa-P<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">R</a></p>
		<p>&#128222; (42) 3232-7777</p>
	</div>
	<div id="desenvolvida">
		<p>desenvolvida no SENAC-PG&trade;</p>
	</div>
</section>
</body>
</html>