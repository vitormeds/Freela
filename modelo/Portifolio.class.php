<?php
class Portifolio{
    private $id;
	private $idimagens;
	private $idlinksyoutube;
	private $idlinks;
	private $linkgithub;
	private $nomeusuario;
	private $idportifolio;
	
	
    //construtor
    public function Portifolio(){
    }
	
	//setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
	
	public function setIdlinksyoutube($idlinksyoutube){
        $this->idlinksyoutube = $idlinksyoutube;
    }
    public function getIdlinksyoutube(){
        return $this->idlinksyoutube;
    }
	
	public function setIdlinks($idlinks){
        $this->idlinks = $idlinks;
    }
    public function getIdlinks(){
        return $this->idlinks;
    }
	
	public function setIdimagens($idimagens){
        $this->idimagens = $idimagens;
    }
    public function getIdimagens(){
        return $this->idimagens;
    }
	public function setLinkgithub($linkgithub)
	{
		$this->linkgithub=$linkgithub;
	}
	public function getLinkgithub()
	{
		return $this->linkgithub;
	}
	
	public function setNomeusuario($nomeusuario)
	{
		$this->nomeusuario=$nomeusuario;
	}
	public function getNomeusuario()
	{
		return $this->nomeusuario;
	}
	
	public function setIdportifolio($idportifolio)
	{
		$this->idportifolio=$idportifolio;
	}
	public function getIdportifolio()
	{
		return $this->idportifolio;
	}
}
?>