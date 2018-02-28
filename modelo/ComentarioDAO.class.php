<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/Comentario.class.php");

class ComentarioDAO{
    //ira receber uma conexao
    public $con = null;
    
    //construtor
    public function ComentarioDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
	
	public function escolherUsuario($anuncio)
	{
        try{
            $stmt = $this->con->prepare("UPDATE comentario SET idempregado=:idempregado WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":idempregado", $usuario->getNome());
            $stmt->bindValue(":id", $usuario->getId());
            
            $stmt->execute();
            
            $this->con->commit();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
	
     public function inserir($anuncio){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO comentario (idanuncio, usuario, comentario) VALUES (:idanuncio, :usuario, :comentario)");
            
            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":idanuncio", $anuncio->getIdanuncio());
			$stmt->bindValue(":usuario", $anuncio->getUsuario());
			$stmt->bindValue(":comentario", $anuncio->getComentario());
            //executo a query preparada
            
            $stmt->execute();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
	public function listaVaga($id){
        try{
            $stmt = $this->con->query("SELECT * FROM comentario WHERE idanuncio=".$id);
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Comentario();
                $cont->setIdanuncio($reg["idanuncio"]);
				$cont->setUsuario($reg["usuario"]);
				$cont->setComentario($reg["comentario"]);
				
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function listar(){
        try{
            $stmt = $this->con->query("SELECT * FROM comentario");
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Vaga();
				$cont->setId($reg["id"]);
                $cont->setIdanuncio($reg["idanuncio"]);
				$cont->setUsuario($reg["usuario"]);
				$cont->setComentario($reg["comentario"]);
				
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function alterar($perfil){
        try{
            $stmt = $this->con->prepare("UPDATE Perfil SET nomedeusuario=:nomedeusuario,email=:email,telefone=:telefone WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":nomedeusuario", $usuario->getNome());
			$stmt->bindValue(":email", $usuario->getEmail());
			$stmt->bindValue(":telefone", $usuario->getTelefone());
            $stmt->bindValue(":id", $usuario->getId());
            
            $stmt->execute();
            
            $this->con->commit();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
}