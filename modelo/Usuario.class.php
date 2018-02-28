<?php
class Usuario{
    private $id;
    private $nomedeusuario;
    private $senha;
	private $email;
    //construtor
    public function Usuario(){
    }
	
	//setters e getters
    public function setId($id)
	{
        $this->id = $id;
    }
    public function getId()
	{
        return $this->id;
    }
	
	public function setNome($nomedeusuario)
	{
		$this->nomedeusuario=$nomedeusuario;
	}
	
	public function getNome()
	{
		return $this->nomedeusuario;
	}
	
	public function setSenha($senha)
	{
		$this->senha=$senha;
	}
	
	public function getSenha()
	{
		return $this->senha;
	}
	
	public function setEmail($email)
	{
		$this->email=$email;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
}
?>