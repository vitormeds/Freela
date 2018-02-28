<?php
	include_once "modelo/ComentarioDAO.class.php";
	
	class AlterarComentario{
		
		function AlterarComentario(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new ComentarioDAO();
				
				$comentario = new Comentario();
				$comentario->setId($_POST["id"]);
				$comentario->setConteudo($_POST["conteudo"]);
				$comentario->setIdusuario($_POST["idusuario"]);
				$comentario->setIdpublicacao($_POST["idpublicacao"]);
				$dao->alterar($comentario);
				
				$lista = $dao->listar();
				include_once "visao/listaComentario.php";
				
				
			}else{
				$id = $_GET["id"];
				$dao = new ComentarioDAO();
				$comentario = $dao->exibir($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarComentario.php";
			}
		}
	}
?>