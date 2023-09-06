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
	<div id="links">
		<ul class="nave">
			<li><a href="cadastrarproduto.php" target="quadro">Cadastrar</a></li>
			<li><a href="listarproduto.php" target="quadro">Listar</a></li>
			<li><a href="alterarproduto.php" target="quadro">Alterar</a></li>
			<li><a href="listarpedido.php" target="quadro">Pedido</a></li>
			<li><a href="gerenciarusuario.php" target="quadro">Gerenciar Usuário</a></li>
			<li><a href="sairadm.php">Sair</a></li>
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
		<p>Ponta Grossa-PR</p>
		<p>&#128222; (42) 3232-7777</p>
	</div>
	<div id="desenvolvida">
		<p>desenvolvida no SENAC-PG&trade;</p>
	</div>
</section>
</body>
</html>