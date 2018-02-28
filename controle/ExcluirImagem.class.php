<?php
	include_once "/modelo/PortifolioDAO.class.php";
	class ExcluirImagem{


		function ExcluirImagem(){
				//$id = $_GET["id"];
				$dao = new PortifolioDAO();
				$id=$_POST["id"];
				$link=$_POST["link"];
				$dao->excluirImagem($id,$link);
				include_once "visao/formPortifolio.php";


		}
	}
?>
