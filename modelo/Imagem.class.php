<?php
class Imagem{
    private $id;
	private $idimagem;
	private $caminho;
	
	
    //construtor
    public function Imagem(){
    }
	
	//setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
	
	public function setIdimagem($idimagem)
	{
		$this->idimagem=$idimagem;
	}
	public function getIdimagem()
	{
		return $this->idimagem;
	}
	
	public function setCaminho($caminho)
	{
		$this->caminho=$caminho;
	}
	public function getCaminho()
	{
		return $this->caminho;
	}
}
?>