<?php
	include_once "modelo/ComentarioDAO.class.php";
	include_once "modelo/AnuncioDAO.class.php";
	class AplicarVaga{
		
		function AplicarVaga(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new ComentarioDAO();
				
				$comentario = new Comentario();
				$comentario->setIdanuncio($_POST["idanuncio"]);
				$comentario->setUsuario($_SESSION["login"]);
				$comentario->setComentario($_POST["comentario"]);
				$dao->inserir($comentario);
				
				$dao2 = new AnuncioDAO();
				$lista = $dao2->listar();
				include_once "visao/formListaVagas.php";
				
				
			}else{
				include_once "visao/formAplicaVaga.php";
			}
		}
	}
?>