<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/Anuncio.class.php");

class AnuncioDAO{
    //ira receber uma conexao
    public $con = null;
    
    //construtor
    public function AnuncioDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
	public function escolherUsuario($id,$empregado)
	{
        try{
            $stmt = $this->con->prepare("UPDATE Anuncio SET empregado=:empregado WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":empregado", $empregado);
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
     public function inserir($anuncio){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO anuncio (titulo, conteudo, contratante, resumo, valormedio,empregado) VALUES (:titulo, :conteudo, :contratante, :resumo,:valormedio,:empregado)");
            
            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":titulo", $anuncio->getTitulo());
			$stmt->bindValue(":conteudo", $anuncio->getConteudo());
			$stmt->bindValue(":contratante", $anuncio->getContratante());
			$stmt->bindValue(":resumo", $anuncio->getResumo());
			$stmt->bindValue(":valormedio", "0");
			$stmt->bindValue(":empregado", "");
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
    public function alterar($anuncio){
        try{
            $stmt = $this->con->prepare("UPDATE Anuncio SET titulo=:titulo, conteudo=:conteudo, valormedio=:valormedio, contratante=:contratante, resumo=:resumo WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":titulo", $anuncio->getTitulo());
			$stmt->bindValue(":conteudo", $anuncio->getConteudo());
			$stmt->bindValue(":valormedio", $anuncio->getValormedio());
			$stmt->bindValue(":contratante", $anuncio->getContratante());
			$stmt->bindValue(":resumo", $anuncio->getResumo());
            $stmt->bindValue(":id", $anuncio->getId());
            
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
            $num = $this->con->exec("DELETE FROM Anuncio WHERE id=".$id);
            
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
    public function listar(){
        try{
            $stmt = $this->con->query("SELECT * FROM Anuncio");
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Anuncio();
                $cont->setId($reg["id"]);
				$cont->setConteudo($reg["conteudo"]);
				$cont->setTitulo($reg["titulo"]);
				$cont->setValormedio($reg["valormedio"]);
				$cont->setContratante($reg["contratante"]);
				$cont->setResumo($reg["resumo"]);
				
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function listarMeusAnuncios(){
        try{
            $stmt = $this->con->query("SELECT * FROM Anuncio WHERE contratante='".$_SESSION["login"]."'");
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Anuncio();
                $cont->setId($reg["id"]);
				$cont->setConteudo($reg["conteudo"]);
				$cont->setTitulo($reg["titulo"]);
				$cont->setValormedio($reg["valormedio"]);
				$cont->setContratante($reg["contratante"]);
				$cont->setResumo($reg["resumo"]);
				
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
    public function exibir($id){
        try{
                $stmt = $this->con->query("SELECT * FROM Anuncio WHERE id=".$id);

            foreach ($stmt as $reg){
                $cont = new Anuncio();
                $cont->setId($reg["id"]);
				$cont->setConteudo($reg["conteudo"]);
				$cont->setTitulo($reg["titulo"]);
				$cont->setValormedio($reg["valormedio"]);
				$cont->setContratante($reg["contratante"]);
				$cont->setResumo($reg["resumo"]);
				
                $exibe[] = $cont;
            }
            
            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function exibirPerfil($nomeempregado){
		$exibe[]=null;
        try{
                $stmt = $this->con->query("SELECT * FROM anuncio WHERE empregado='".$nomeempregado."'");

            foreach ($stmt as $reg){
                $cont = new Anuncio();
                $cont->setId($reg["id"]);
				$cont->setConteudo($reg["conteudo"]);
				$cont->setTitulo($reg["titulo"]);
				$cont->setValormedio($reg["valormedio"]);
				$cont->setContratante($reg["contratante"]);
				$cont->setResumo($reg["resumo"]);
				
                $exibe[] = $cont;
            }
            if($exibe==null)
			{
				return null;
			}
			else
			{
				//retorna o resultado da query
				return $exibe;
			}
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
         }
    }
}