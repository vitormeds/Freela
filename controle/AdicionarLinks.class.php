<?php
	include_once "modelo/PortifolioDAO.class.php";

	class AdicionarLinks{

		function AdicionarLinks(){
			if(isset($_POST["enviar"]))
			{//Quando aparecer o POST significa que esta acontecendo um envio

				$dao = new PortifolioDAO();

				$dao->InserirLink($_POST['link'],$_POST['id']);


				include_once "visao/formPortifolio.php";


			}else{
				include_once "visao/formPortifolio.php";
			}
		}
	}
?>
