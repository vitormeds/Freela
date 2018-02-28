<?php
	include_once "modelo/VagaDAO.class.php";
	
	class AlterarVaga{
		
		function AlterarVaga(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new VagaDAO();
				
				$comentario = new Comentario();
				$comentario->setId($_POST["id"]);
				$comentario->setIdanuncio($_POST["idanuncio"]);
				$comentario->setUsuario($_POST["usuario"]);
				$comentario->setComentario($_POST["comentario"]);
				$dao->alterar($comentario);
				
				$lista = $dao->listar();
				include_once "visao/formListaVagas.php";
				
				
			}else{
				$id = $_GET["idanuncio"];
				$dao = new VagaDAO();
				$vaga = $dao->listaVaga($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarAnuncio.class.php";
			}
		}
	}
?>