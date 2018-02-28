<?php
	include_once "modelo/PortifolioDAO.class.php";
	include_once "modelo/Portifolio.class.php";

	class AlterarVideo{

		function AlterarVideo(){
			if(isset($_POST["enviar"]))
			{//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new PortifolioDAO();
				$dao->AlterarVideo($_POST["idlink"],$_POST["link"],$_POST['linkantigo']);

				include_once "visao/formPortifolio.php";


			}else{

				include_once "visao/formPortifolio.php";
			}
		}
	}
?>
