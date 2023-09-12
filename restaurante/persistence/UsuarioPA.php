<?php
require_once 'Banco.php';

class UsuarioPA{

	private $conexao;

	function __construct()
	{
		$this->conexao=new Banco();
	}

	public function logar($usuario,$senha)
	{
		$sql="select usuario,senha from administrador";
		$teste=false;
		$consulta=$this->conexao->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				if($linha['usuario']==$usuario){
					if($linha['senha']==$senha){
						$teste=true;
						return true;
					}else{
						$teste=false;
					}
				}else{
					$teste=false;
				}
			}
			if($teste==false){
				return false;
			}
		}
	}

	public function cadastrar($usuario)
	{
		$sql="insert into administrador values(".
			$usuario->getId().",'".
			$usuario->getUsuario()."','".
			$usuario->getSenha()."')";
		return $this->conexao->executar($sql);
	}

	public function retornarUltimo(){
		$sql="select max(id) from administrador";
		$consulta=$this->conexao->consultar($sql);
		if (!$consulta){
			return false;
		} else{
			$linha=$consulta->fetch_assoc();
			$id=0;
			if($linha['max(id)']!=null){
				$id=$linha['max(id)'];
			}
			return $id;
		}
	}

	public function alterar($usuario,$tipo)
	{
		if ($tipo=="usuario") {
			$sql="update administrador set usuario='".
			$usuario->getUsuario()."' where id=".
			$usuario->getId();
		}else{
			$sql="update administrador set senha='".
			$usuario->getSenha()."' where id=".
			$usuario->getId();
		}
		return $this->conexao->executar($sql);
	}

	public function excluir($id)
	{
		if($id!=1){
			$sql="delete from administrador where id=$id";
			return $this->conexao->executar($sql);
		}else{
			return false;
		}
	}

	public function listar()
	{
		$sql="select * from administrador";
		return $this->conexao->consultar($sql);
	}
}

?>
