<?php
class Anuncio{
    private $id;
    private $titulo;
    private $conteudo;
	private $valormedio;
	private $contratante;
	private $resumo;
	
    //construtor
    public function Anuncio(){
    }
	
	//setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
	
	public function setTitulo($titulo)
	{
		$this->titulo=$titulo;
	}
	
	public function getTitulo()
	{
		return $this->titulo;
	}
	
	public function setConteudo($conteudo)
	{
		$this->conteudo=$conteudo;
	}
	
	public function getConteudo()
	{
		return $this->conteudo;
	}
	
	public function setValormedio($valormedio)
	{
		$this->valormedio=$valormedio;
	}
	
	public function getValormedio()
	{
		return $this->valormedio;
	}
	
	public function setContratante($contratante)
	{
		$this->contratante=$contratante;
	}
	
	public function getContratante()
	{
		return $this->contratante;
	}
	
	public function setResumo($resumo)
	{
		$this->resumo=$resumo;
	}
	
	public function getResumo()
	{
		return $this->resumo;
	}
}
?>