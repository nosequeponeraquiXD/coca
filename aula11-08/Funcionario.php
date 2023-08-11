<?php

	class Funcionario{

		private $matricula;
		private $nome;
		private $setor;
		private $horast;
		private $valorh;
		private $inss;
		private $imposto;

		public function setMatricula($matricula)
		{
			$this->matricula=$matricula;
		}

		public function getMatricula()
		{
			return $this->matricula;
		}

		public function setNome($nome)
		{
			$this->nome=$nome;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function setSetor($setor)
		{
			$this->setor=$setor;
		}

		public function getSetor()
		{
			return $this->setor;
		}

		public function setHorast($horast)
		{
			$this->horast=$horast;
		}

		public function getHorast()
		{
			return $this->horast;
		}

		public function setValorh($valorh)
		{
			$this->valorh=$valorh;
		}

		public function getValorh()
		{
			return $this->valorh;
		}

		public function setInss($inss)
		{
			$this->inss=$inss;
		}

		public function getInss()
		{
			return $this->inss;
		}

		public function setImposto($imposto)
		{
			$this->imposto=$imposto;
		}

		public function getImposto()
		{
			return $this->imposto;
		}

		public function calcularSalarioBruto()
		{
			return $this->valorh*$this->horast;
		}

		public function calcularSalarioLiq($salariob)
		{
			return $salariob-($this->inss/100*$salariob)-($this->imposto/100*$salariob);
		}

	}
?>