<?php
	include_once "/modelo/PortifolioDAO.class.php";
	class ExcluirVideo{


		function ExcluirVideo(){
				//$id = $_GET["id"];
				$dao = new PortifolioDAO();
				$id=$_POST["id"];
				$link=$_POST["link"];
				$dao->excluirvideo($id,$link);
				include_once "visao/formPortifolio.php";


		}
	}
?>
