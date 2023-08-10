<?php

	class Estacionamiento{

	private $vaga;
	private $motorista;
	private $placa;
	private $valor;
	private $horas;

	public function setMotorista($motorista)
	{
		$this->motorista=$motorista;
	}
	public function getMotorista()
	{
		return $this->motorista;
	}
	public function setVaga($vaga)
	{
		$this->vaga=$vaga;
	}
	public function getVaga()
	{
		return $this->vaga;
	}

	public function setPlaca($placa)
	{
		$this->placa=$placa;
	}
	public function getPlaca()
	{
		return $this->placa;
	}

	public function setValor($valor)
	{
		$this->valor=$valor;
	}
	public function getValor()
	{
		return $this->valor;
	}

	public function setHoras($horas)
	{
		$this->horas=$horas;
	}
	public function getHoras()
	{
		return $this->horas;
	}

	public function calcularTotal()
	{
		return $this->horas*$this->valor;
	}



}




?>