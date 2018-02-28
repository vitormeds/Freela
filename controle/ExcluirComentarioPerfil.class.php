<?php
	include_once "modelo/ComentarioPerfilDAO.class.php";
	class ExcluirComentarioPerfil{


		function ExcluirComentarioPerfil(){
				//$id = $_GET["id"];
				$dao = new ComentarioPerfilDAO();
				$id=$_GET["id"];
				$dao->excluir($id);
				if($_GET["t"]=="empregado")
				{
					header("Location: http://127.0.0.1/freela/site.php?func=perfilempregado");
				}
				else
				{
					header("Location: http://127.0.0.1/freela/site.php?func=perfilempregador");
				}

		}
	}
?>
