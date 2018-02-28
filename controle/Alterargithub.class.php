<?php
	include_once "modelo/PortifolioDAO.class.php";
	include_once "modelo/Portifolio.class.php";
	
	class Alterargithub{
		
		function Alterargithub(){
			if(isset($_POST["enviar"]))
			{//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new PortifolioDAO();
				
				$p = new Portifolio();
				$p->setIdportifolio($_POST["id"]);
				$p->setLinkgithub($_POST["linkgithub"]);
				$dao->alterarGithub($p);
				
				include_once "visao/formPortifolio.php";
				
				
			}else{
				
				include_once "visao/formPortifolio.php";
			}
		}
	}
?>