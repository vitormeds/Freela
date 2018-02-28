<?php
	include_once "modelo/AnuncioDAO.class.php";
	class ExcluirAnuncio{
		
	
		function ExcluirAnuncio(){
				//$id = $_GET["id"];
				$dao = new AnuncioDAO();
				$id=$_GET["id"];
				$dao->excluir($id);
				$lista = $dao->listar();
				
				include_once "visao/listaAnuncio.php";
			
		}
	}
?>