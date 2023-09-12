<?php  

require_once 'cabecalho.php';
require_once 'persistence/PedidoPA.php';
$pedidopa=new PedidoPA();
$consulta=$pedidopa->retornarUltimo();
if ($consulta>0) {
	require_once 'persistence/ItemPA.php';
	require_once 'persistence/ClientePA.php';
	require_once 'persistence/ProdutoPA.php';
	require_once 'model/Item.php';
	require_once 'model/Pedido.php';

	$itempa=new ItemPA();
	$clientepa=new ClientePA();
	$produtopa=new ProdutoPA();

	$pedidos=$pedidopa->listar();
	if (!$pedidos) {
		echo "<h2>Erro ao tentar listar pedidos</h2>";
	}else{
		$pedido=new Pedido();
		while ($linha=$pedidos->fetch_assoc()) {
			$pedido->setId($linha['id']);
			$pedido->setCliente($linha['cliente']);
			$pedido->setData($linha['data']);
			$pedido->setValor($linha['valor']);

			echo "<section>";
			echo "<div>";
			echo "<p>ID: ".$pedido->getId()."</p>";
			$nome=$clientepa->converteIdParaNome($pedido->getCliente());
			$linha=$nome->fetch_assoc();
			echo "<p>Cliente: ".$linha['nome']."</p>";
			echo "<p>Data: ".$pedido->getData()."</p>";
			echo "<p>Valor R$: ".$pedido->getValor()."</p>";
			echo "</div><br/>";

			echo "<table>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>Pedido</th>";
			echo "<th>Produto</th>";
			echo "<th>Quantidade</th>";
			echo "</tr>";

			$itens=$itempa->listar($pedido->getId());
			if (!$itens) {
				echo "<h2>Erro ao tentar recuperar itens!</h2>";
			}else{
				$item=new Item();
				while ($linha=$itens->fetch_assoc()) {
					$item->setId($linha['id']);
					$item->setPedido($linha['pedido']);
					$item->setProduto($linha['produto']);
					$item->setQuantidade($linha['quantidade']);

					echo "<tr>";
					echo "<td>".$item->getId()."</td>";
					echo "<td>".$item->getPedido()."</td>";
					$nome=$produtopa->converteIdParaNome($item->getProduto());
					$linha=$nome->fetch_assoc();
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".$item->getQuantidade()."</td>";
					echo "</tr>";
				}
			}
			echo "</table>";
			echo "</section><hr/>";
		}
	}
}else{
	echo "<h2>Não há pedidos cadastrados!<h2>";
}

?>
</body>
</html>