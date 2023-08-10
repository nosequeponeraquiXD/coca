<?php

 class Produtos{

 	private $nome;
 	private $quantidade;
 	private $valoru;
 	private $pagamento;

 	public function setNome($nome)
 	{
 		$this->nome=$nome;
 	}

 	public function getNome()
 	{
 		return $this->nome;
 	}

	public function setQuantidade($quantidade)
 	{
 		$this->quantidade=$quantidade;
 	}

 	public function getQuantidade()
 	{
 		return $this->quantidade;
 	}

 	public function setValoru($valoru)
 	{
 		$this->valoru=$valoru;
 	}

 	public function getValoru()
 	{
 		return $this->valoru;
 	}

	public function setPagamento($pagamento)
 	{
 		$this->pagamento=$pagamento;
 	}

 	public function getPagamento()
 	{
 		return $this->pagamento;
 	}

 	public function calcularTotal()
 	{
 		return $this->quantidade*$this->valoru;
 	}

 	public function verificarPagamento($total,$opcao)
 	{
 		if ($opcao=="avista") {
 			$total=$total-(0.05*$total);
 			return $total;

 		}else{
 			$total=$total+(0.07*$total);
 			return $total;



 		}
 	}

	}

?>