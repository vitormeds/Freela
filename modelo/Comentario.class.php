<?php
class Comentario{
    private $id;
    private $idanuncio;
    private $usuario;
	private $comentario;
	
    //construtor
    public function Comentario(){
    }
	
	//setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
	
	public function setIdanuncio($idanuncio)
	{
		$this->idanuncio=$idanuncio;
	}
	
	public function getIdanuncio()
	{
		return $this->idanuncio;
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
}
?>