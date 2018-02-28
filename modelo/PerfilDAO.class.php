<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/Perfil.class.php");
include_once("modelo/UsuarioDAO.class.php");
include_once("modelo/Usuario.class.php");

class PerfilDAO{
    //ira receber uma conexao
    public $con = null;

    //construtor
    public function PerfilDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
    public function inserir($perfil){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO perfil (`id`, `nomeusuario`, `email`, `telefone`, `site`, `idportifolio`, `nome`, `idcomentario`) VALUES (:id,:nomeusuario,:email,:telefone,:site,:idportifolio,:nome, :idcomentario)");

            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":id", $perfil->getId());
            $stmt->bindValue(":nomeusuario", $perfil->getNomeusuario());
      			$stmt->bindValue(":email", $perfil->getEmail());
      			$stmt->bindValue(":telefone", $perfil->getTelefone());
      			$stmt->bindValue(":site", $perfil->getSite());
      			$stmt->bindValue(":idportifolio", $perfil->getIdportifolio());
      			$stmt->bindValue(":nome", $perfil->getNome());
      			$stmt->bindValue(":idcomentario", $perfil->getIdcomentario());
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
            $stmt = $this->con->prepare("UPDATE Perfil SET nome=:nome,email=:email,site=:site,telefone=:telefone WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();

            $stmt->bindValue(":nome", $usuario->getNome());
			      $stmt->bindValue(":email", $usuario->getEmail());
			      $stmt->bindValue(":site", $usuario->getSite());
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
    //remove um registro
    public function excluir ($id){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM Perfil WHERE id=".$id);

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
	 public function verificaperfil($parametro)
	 {
		 $exibe=null;
        try{
                $stmt = $this->con->query("SELECT * FROM Perfil WHERE nomeusuario='".$parametro."'");

            foreach ($stmt as $reg){
                $cont = new Perfil();
                $cont->setId($reg["id"]);
        				$cont->setNome($reg["nome"]);
        				$cont->setNomeusuario($reg["nomeusuario"]);
        				$cont->setEmail($reg["email"]);
        				$cont->setSite($reg["site"]);
        				$cont->setTelefone($reg["telefone"]);
        				$cont->setIdcomentario($reg["idcomentario"]);
                $exibe[] = $cont;
            }
			if($exibe==null)
			{
				$daoUsuario = new UsuarioDAO();
				$pid=$daoUsuario->exibir($_SESSION["login"]);
				$p= new Perfil();
				$p->setNomeusuario($parametro);
				$p->setNome($parametro);
				$p->setEmail("Insira seu email");
				$p->setSite("Insira seu site");
				$p->setTelefone("Insira seu Telefone");
				$p->setIdcomentario(0);
				foreach ($pid as $regp)
				{
					$p->setIdportifolio($regp->getId());
				}
				$this->inserir($p);
				$this->verificaperfil($parametro);
			}
			else
			{
				return true;
			}
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	 public function selecionaId($nomeusuario){
        try{
                $stmt = $this->con->query("SELECT * FROM Perfil WHERE nomeusuario='".$nomeusuario."'");

            foreach ($stmt as $reg){
                $cont = new Perfil();
                $cont->setIdportifolio($reg["id"]);
                $exibe[] = $cont;
            }

            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
    public function exibir($nomeusuario){
        try{
                $stmt = $this->con->query("SELECT * FROM Perfil WHERE nomeusuario='".$nomeusuario."'");

            foreach ($stmt as $reg){
                $cont = new Perfil();
                $cont->setId($reg["id"]);
        				$cont->setNome($reg["nome"]);
        				$cont->setNomeusuario($reg["nomeusuario"]);
        				$cont->setEmail($reg["email"]);
        				$cont->setSite($reg["site"]);
        				$cont->setTelefone($reg["telefone"]);

                $exibe[] = $cont;
            }

            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
}
