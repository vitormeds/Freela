<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/Usuario.class.php");

class UsuarioDAO{
    //ira receber uma conexao
    public $con = null;
    
    //construtor
    public function UsuarioDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
	public function alterarsenha($novasenha,$id)
	{
		try{
            $stmt = $this->con->prepare("UPDATE Usuario SET senha=:senha WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":senha", md5($novasenha));
            $stmt->bindValue(":id", $id);
            
            $stmt->execute();
            
            $this->con->commit();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
	}
    public function inserir($usuario){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO Usuario (id, nomedeusuario, senha, email) VALUES (:id, :nomedeusuario, :senha, :email)");
            
            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":id", $usuario->getId());
            $stmt->bindValue(":nomedeusuario", $usuario->getNome());
			$stmt->bindValue(":senha", $usuario->getSenha());
			$stmt->bindValue(":email", $usuario->getEmail());
            //executo a query preparada
            
            $stmt->execute();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
            
            
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //realiza um update
    public function alterar($usuario){
        try{
            $stmt = $this->con->prepare("UPDATE Usuario SET nomedeusuario=:nomedeusuario, senha=:senha WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":nomedeusuario", $usuario->getNome());
            $stmt->bindValue(":senha", $usuario->getSenha());
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
    //remove um registro
    public function excluir ($id){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM Usuario WHERE id=".$id);
            
            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //jquery recebe num significa que não quero filtrar a resposta
    //se fosse passar sql - executo a sql
    //query é uma consulta/retorno de um result set
    public function listar($query=null){
        try{
            if($query == null){
                $stmt = $this->con->query("SELECT * FROM Usuario");
            }else{
                $stmt = $this->con->con->query($query);
            }
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Usuario();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nomedeusuario"]);
                $cont->setSenha($reg["senha"]);
				$cont->setEmail($reg["email"]);
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
    public function exibir($nome){
        try{
                $stmt = $this->con->query("SELECT * FROM Usuario WHERE nomedeusuario='".$nome."'");

            foreach ($stmt as $reg){
                $cont = new Usuario();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nomedeusuario"]);
                $cont->setSenha($reg["senha"]);
				$cont->setEmail($reg["email"]);
                $exibe[] = $cont;
            }
            
            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function exibirporNome($nomedeusuario){
        try{
                $stmt = $this->con->query("SELECT * FROM Usuario WHERE nomedeusuario='".$nomedeusuario."'");

            foreach ($stmt as $reg){
                $cont = new Usuario();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nomedeusuario"]);
                $cont->setSenha($reg["senha"]);
				$cont->setEmail($reg["email"]);
                $exibe[] = $cont;
            }
            
            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
}