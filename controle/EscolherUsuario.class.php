<?php
	include_once "modelo/AnuncioDAO.class.php";
	
	class EscolherUsuario{
		
		function EscolherUsuario()
		{
			$id = $_GET["idanuncio"];
			$empregado = $_GET["usuario"];
			$dao = new AnuncioDAO();
			$anuncio = $dao->escolherUsuario($id,$empregado);
			$dao->listar();
			include_once "visao/formListaVagas.php";
		}
	}
?>