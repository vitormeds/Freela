<?php
class Perfil{
    private $id;
    private $nome;
    private $email;
	private $telefone;
	private $site;
	private $idportifolio;
	private $nomeusuario;
	private $idcomentario;
	
	
    //construtor
    public function Perfil(){
    }
	
	//setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
	
	public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
	
	public function setNomeusuario($nomeusuario){
        $this->nomeusuario = $nomeusuario;
    }
    public function getNomeusuario(){
        return $this->nomeusuario;
    }
	
	public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
	
	public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getTelefone(){
        return $this->telefone;
    }
	public function setSite($site){
        $this->site = $site;
    }
    public function getSite(){
        return $this->site;
    }
	
	public function setIdportifolio($idportifolio){
        $this->idportifolio = $idportifolio;
    }
    public function getIdportifolio(){
        return $this->idportifolio;
    }
	
	public function setIdcomentario($idcomentario){
        $this->idcomentario = $idcomentario;
    }
    public function getIdcomentario(){
        return $this->idcomentario;
    }
}
?>