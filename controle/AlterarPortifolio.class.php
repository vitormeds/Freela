<?php
	include_once "modelo/PortifolioDAO.class.php";
	
	class AlterarPortifolio{
		
		function AlterarPortifolio(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new PortifolioDAO();
				
				$portifolio = new Portifolio();
				$portifolio->setId($_POST["id"]);
				$portifolio->setIdimagens($_POST["idimagens"]);
				$portifolio->setIdlinksyoutube($_POST["idlinksyoutube"]);
				$portifolio->setIdlinksdrive($_POST["idlinksdrive"]);
				$dao->alterar($portifolio);
				
				$lista = $dao->listar();
				include_once "visao/listaPortifolio.php";
				
				
			}else{
				$id = $_GET["id"];
				$dao = new PortifolioDAO();
				$portifolio = $dao->exibir($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarPortifolio.php";
			}
		}
	}
?>