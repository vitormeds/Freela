<?php
	include_once "modelo/ComentarioDAO.class.php";
	class ExcluirComentario{
		
	
		function ExcluirComentario(){
				//$id = $_GET["id"];
				$dao = new ComentarioDAO();
				$id=$_GET["id"];
				$dao->excluir($id);
				$lista = $dao->listar();
				
				include_once "visao/listaComentario.php";
			
		}
	}
?>