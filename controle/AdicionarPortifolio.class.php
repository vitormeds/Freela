<?php
	include_once "modelo/PortifolioDAO.class.php";
	
	class AdicionarPortifolio{
		
		function AdicionarPortifolio(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new PortifolioDAO();
				
				$portifolio = new Portifolio();
				$portifolio->setIdimagens($_POST["idimagens"]);
				$portifolio->setIdlinksyoutube($_POST["idlinksyoutube"]);
				$portifolio->setidlinksdrive($_POST["idlinksdrive"]);
				$dao->inserir($portifolio);
				
				
				$lista = $dao->listar();
				include_once "visao/listaPortifolio.php";
				
				
			}else{
				include_once "visao/formAdicionaPortifolio.php";
			}
		}
	}
?>