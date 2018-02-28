<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/PortifolioDAO.class.php");
include_once ("modelo/Perfil.class.php");
include_once ("modelo/PerfilDAO.class.php");

class PortifolioDAO{
    //ira receber uma conexao
    public $con = null;

    //construtor
    public function PortifolioDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
    public function inserir($perfil){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO portifolio (`id`, `idportifolio`, `idimagens`, `idlinksyoutube`, `idlinks`, `linkgithub`, `nomeusuario`) VALUES (:id, :idportifolio, :idimagens, :idlinksyoutube, :idlinks, :linkgithub, :nomeusuario)");

            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
			$daoPerfil = new PerfilDAO();
			$idp=$daoPerfil->selecionaId($perfil->getNomeusuario());
            $stmt->bindValue(":id", $perfil->getId());
			foreach ($idp as $regp)
			{
				$stmt->bindValue(":idportifolio", $regp->getIdportifolio());
				$stmt->bindValue(":idimagens", $regp->getIdportifolio());
				$stmt->bindValue(":idlinksyoutube", $regp->getIdportifolio());
				$stmt->bindValue(":idlinks", $regp->getIdportifolio());
			}
			$stmt->bindValue(":linkgithub", $perfil->getLinkgithub());
			$stmt->bindValue(":nomeusuario", $perfil->getNomeusuario());
            //executo a query preparada

            $stmt->execute();
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;


        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
	public function inserirLink($link,$id){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO links (`idlinks`, `link`) VALUES (:idlinks, :link)");
			$stmt->bindValue(":idlinks", $id);
			$stmt->bindValue(":link", $link);
            //executo a query preparada

            $stmt->execute();
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;


        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    public function InserirImagem($link,$id){
          try{
              //evitando SQL INJECTION
              //dois pontos significa rotulo, armazena o local onde vai inserir as informações
              $stmt = $this->con->prepare("INSERT INTO imagens (`idimagem`, `caminho`) VALUES (:idlinks, :link)");
  			$stmt->bindValue(":idlinks", $id);
  			$stmt->bindValue(":link", $link);
              //executo a query preparada

              $stmt->execute();
              //fecho a conexao
              //$this->con = null;
              //caso ocorra um erro, retorna o erro;


          }catch(PDOException $ex){
              echo "Erro:".$ex->getMessage();
          }
      }
    public function inserirVideo($link,$id){
          try{
              //evitando SQL INJECTION
              //dois pontos significa rotulo, armazena o local onde vai inserir as informações
              $stmt = $this->con->prepare("INSERT INTO linksyoutube (`linksyoutube`, `link`) VALUES (:idlinks, :link)");
  			      $stmt->bindValue(":idlinks", $id);
  			      $stmt->bindValue(":link", $link);
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
            $stmt = $this->con->prepare("UPDATE Perfil SET nomeusuario=:nome,email=:email,site=:site,telefone=:telefone WHERE id=:id");
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
	 public function alterarGithub($portifolio)
	 {
        try{
            $stmt = $this->con->prepare("UPDATE portifolio SET linkgithub=:linkgithub WHERE idportifolio=:idlinkgithub");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();

            $stmt->bindValue(":linkgithub", $portifolio->getLinkgithub());
			$stmt->bindValue(":idlinkgithub", $portifolio->getIdportifolio());

            $stmt->execute();

            $this->con->commit();

            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
	 public function AlterarLinks($idlink,$link,$linkantigo)
	 {
        try{
            $stmt = $this->con->prepare("UPDATE links SET link=:link WHERE idlinks=".$idlink." and link='".$linkantigo."'");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            $stmt->bindValue(":link", $link);

            $stmt->execute();

            $this->con->commit();

            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    public function AlterarVideo($idlink,$link,$linkantigo)
    {
         try{
             $stmt = $this->con->prepare("UPDATE linksyoutube SET link=:link WHERE linksyoutube=".$idlink." and link='".$linkantigo."'");
             //beginTransation - transação para que toda a ação seja completada
             $this->con->beginTransaction();
             $stmt->bindValue(":link", $link);

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
    public function excluirlink($id,$link){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM links WHERE idlinks=".$id." and link='".$link."'");

            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //remove um registro
    public function excluirvideo($id,$link){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM linksyoutube WHERE linksyoutube=".$id." and link='".$link."'");

            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //remove um registro
    public function excluirImagem($id,$link){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM imagens WHERE idimagem=".$id." and caminho='".$link."'");

            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
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
	 public function verificaportifolio($parametro)
	 {
		 $exibe=null;
        try{
                $stmt = $this->con->query("SELECT * FROM Portifolio WHERE nomeusuario='".$parametro."'");

            foreach ($stmt as $reg){
                $cont = new Portifolio();
                $cont->setId($reg["id"]);
				        $cont->setIdimagens($reg["idimagens"]);
				        $cont->setIdlinksyoutube($reg["idlinksyoutube"]);
		         		$cont->setIdlinks($reg["idlinks"]);
				        $cont->setLinkgithub($reg["linkgithub"]);
				        $cont->setNomeusuario($reg["nomeusuario"]);
				        $cont->setIdportifolio($reg["idportifolio"]);
                $exibe[] = $cont;
            }
			if($exibe==null)
			{
				$daoPortifolio = new PortifolioDAO();
				$pid=$daoPortifolio->exibir($_SESSION["login"]);
				$p= new Portifolio();
				$p->setIdimagens(0);
				$p->setIdlinksyoutube(0);
				$p->setIdlinks(0);
				$p->setLinkgithub("Insira seu Git Hub Aqui");
				$p->setNomeusuario($_SESSION["login"]);
				$p->setIdportifolio(0);
				$this->inserir($p);
				$this->verificaportifolio($parametro);
			}
			else
			{
				return true;
			}
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function listaImagens($idportifolio)
	{
		$exibe=null;
        try{
                $stmt = $this->con->query("SELECT * FROM imagens WHERE idimagem='".$idportifolio."'");

            foreach ($stmt as $reg){
				$exibe[]=$reg["caminho"];
            }

            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function listaVideos($idportifolio)
	{
		$exibe=null;
        try{
                $stmt = $this->con->query("SELECT * FROM linksyoutube WHERE linksyoutube='".$idportifolio."'");

            foreach ($stmt as $reg){
				$exibe[]=$reg["link"];
            }

            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function listalinks($idportifolio)
	{
		$exibe=null;
        try{
                $stmt = $this->con->query("SELECT * FROM links WHERE idlinks='".$idportifolio."'");

            foreach ($stmt as $reg){
				$exibe[]=$reg["link"];
            }

            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
    public function exibir($nomeusuario)
	{
		$exibe=null;
        try{
                $stmt = $this->con->query("SELECT * FROM Portifolio WHERE nomeusuario='".$nomeusuario."'");

            foreach ($stmt as $reg){
                $cont = new Portifolio();
                $cont->setId($reg["id"]);
				$cont->setIdimagens($reg["idimagens"]);
				$cont->setIdlinksyoutube($reg["idlinksyoutube"]);
				$cont->setIdlinks($reg["idlinks"]);
				$cont->setLinkgithub($reg["linkgithub"]);
				$cont->setNomeusuario($reg["nomeusuario"]);
				$cont->setIdportifolio($reg["idportifolio"]);

                $exibe[] = $cont;
            }

            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
}
