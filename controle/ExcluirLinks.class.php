<?php
	include_once "/modelo/PortifolioDAO.class.php";
	class ExcluirLinks{
		
	
		function ExcluirLinks(){
				//$id = $_GET["id"];
				$dao = new PortifolioDAO();
				$id=$_POST["id"];
				$link=$_POST["link"];
				$dao->excluirlink($id,$link);
				include_once "visao/formPortifolio.php";
				
				
		}
	}
?>