<?php 
require_once 'cabecalho.php';

if (isset($_POST['botao'])) {
	require_once 'persistence/ProdutoPA.php';
	require_once 'model/Produto.php';
	require_once 'persistence/ItemPA.php';
	require_once 'model/Item.php';
	require_once 'persistence/PedidoPA.php';
	require_once 'model/Pedido.php';
	require_once 'model/Cliente.php';
	require_once 'persistence/ClientePA.php';
	$produtopa=new ProdutoPA();
	$itempa=new ItemPA();
	$pedidopa=new PedidoPA();
	$clientepa=new ClientePA();
	$produtos=unserialize($_COOKIE['carrinho']);
	$limite=count($produtos);
	$cpf=$_COOKIE['cliente'];
	$consulta=$clientepa->retornarId($cpf);
	if (!$consulta) {
		echo "<h2>Erro cliente não cadastrado!</h2>";
	}else{
		$linha=$consulta->fetch_assoc();
		$cliente=new Cliente();
		$cliente->setId($linha['id']);
		$pedido=new Pedido();
		$pedido->setCliente($cliente->getId());
		$consulta=$pedidopa->retornarUltimo();
		if ($consulta!=0&&!$consulta) {
			echo "<h2>Erro de pedido!</h2>";
		}else{
			if ($consulta>0) {
				$consulta++;
			}else{
				$consulta=1;
			}
			$pedido->setId($consulta);
			$pedido->setData(date("Y-m-d"));
			$pedido->setValor(0);
			$itens=array();
			$iditem=$itempa->retornarUltimo();
			if ($iditem!=0&&!$iditem) {
				echo "<h2>Erro ao recuperar id do item!<h2>";
			}else{
				if ($iditem>0) {
					$iditem++;
				}else{
					$iditem=1;
				}
			}
			$cont=$iditem;
			for ($i=0;$i<$limite;$i++) { 
				$produto=new Produto();
				$consulta=$produtopa->buscarPorId($_POST["id$i"]);
				if (!$consulta) {
					echo "<h2>Erro para encontrar id produto!</h2>";
				}else{
					$linha=$consulta->fetch_assoc();
					$produto->setId($linha['id']);
					$produto->setValor($linha['valor']);
					$total=$_POST["quant$i"]*$produto->getValor();
					$pedido->setValor($pedido->getValor()+$total);
					$item=new Item();
					$item->setPedido($pedido->getId());
					$item->setProduto($produto->getId());
					$item->setQuantidade($_POST["quant$i"]);
					$item->setId($cont);
					$cont++;
					$itens[]=$item;
					
				}
			}
			$resp=$pedidopa->Cadastrar($pedido);
			if (!$resp) {
				echo "<h2>Erro ao tentar cadastrar pedido!</h2>";
			}else{
				foreach ($itens as $it) {
					$resp=$itempa->Cadastrar($it);
					if (!$resp) {
						echo "<h2>Erro ao cadastrar item!</h2>";
					}
				}
				if ($resp) {
					echo "<h2>Pedido realizado com sucesso!</h2>";
					setcookie("carrinho","");
					echo "<meta http-equiv='refresh' content='2;url=home.php'>";
				}
			}
		}
	}

}else{
	echo "<h2>Adicione produtos ao carrinho!</h2>";
}

?>
</body>
</html>