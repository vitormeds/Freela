<?php
class ComentarioPerfil{
    private $id;
    private $idperfil;
    private $usuario;
	private $comentario;
	private $tipo;
	
    //construtor
    public function ComentarioPerfil(){
    }
	
	//setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
	
	public function setIdperfil($idperfil)
	{
		$this->idperfil=$idperfil;
	}
	
	public function getIdperfil()
	{
		return $this->idperfil;
	}
	
	public function setUsuario($usuario)
	{
		$this->usuario=$usuario;
	}
	
	public function getUsuario()
	{
		return $this->usuario;
	}
	
	public function setComentario($comentario)
	{
		$this->comentario=$comentario;
	}
	
	public function getComentario()
	{
		return $this->comentario;
	}
	
	public function setTipo($tipo)
	{
		$this->tipo=$tipo;
	}
	
	public function getTipo()
	{
		return $this->tipo;
	}
}
?>