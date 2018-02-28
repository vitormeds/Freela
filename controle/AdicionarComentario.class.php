<?php
	include_once "modelo/ComentarioDAO.class.php";
	
	class AicionarComentario{
		
		function AicionarComentario(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new ComentarioDAO();
				
				$comentario = new Comentario();
				$comentario->setTitulo($_POST["titulo"]);
				$comentario->setConteudo($_POST["conteudo"]);
				$comentario->setIdpublicacao($_POST["idpublicacao"]);
				$comentario->setIdUsuario($_POST["idusuario"]);
				$dao->inserir($comentario);
				
				
				$lista = $dao->listar();
				include_once "visao/listaComentario.php";
				
				
			}else{
				include_once "visao/formAdicionaComentario.php";
			}
		}
	}
?>