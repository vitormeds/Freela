<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/ComentarioPerfil.class.php");

class ComentarioPerfilDAO{
    //ira receber uma conexao
    public $con = null;
    
    //construtor
    public function ComentarioPerfilDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
	   //remove um registro
    public function excluir ($id){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM comentarioperfil WHERE id=".$id);
            
            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
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
	
     public function inserir($comentario){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO comentarioperfil (idperfil, usuario, comentario, tipo) VALUES (:idperfil, :usuario, :comentario, :tipo)");
            
            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":idperfil", $comentario->getIdperfil());
			$stmt->bindValue(":usuario", $comentario->getUsuario());
			$stmt->bindValue(":comentario", $comentario->getComentario());
			$stmt->bindValue(":tipo", $comentario->getTipo());
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
	public function listar($id,$tipo){
        try{
            $stmt = $this->con->query("SELECT * FROM comentarioperfil WHERE idperfil='".$id."' and tipo='".$tipo."'");
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new ComentarioPerfil();
				$cont->setId($reg["id"]);
                $cont->setIdperfil($reg["idperfil"]);
				$cont->setUsuario($reg["usuario"]);
				$cont->setComentario($reg["comentario"]);
				$cont->setTipo($reg["tipo"]);
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
            $stmt = $this->con->prepare("UPDATE comentarioperfil SET comentario=:comentario WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":comentario", $perfil->getComentario());
            $stmt->bindValue(":id", $perfil->getId());
            
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