<?php
	include_once "modelo/ComentarioPerfilDAO.class.php";
	
	class AdicionarComentarioPerfil{
		
		function AdicionarComentarioPerfil(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new ComentarioPerfilDAO();
				
				$comentario = new ComentarioPerfil();
				$comentario->setComentario($_POST["comentario"]);
				$comentario->setIdperfil($_POST["idusuarioperfil"]);
				$comentario->setUsuario($_SESSION["login"]);
				$comentario->setTipo($_POST["tipo"]);
				$dao->inserir($comentario);
				
				if($_POST["tipo"]=="empregado")
				{
					include_once "visao/formListaPerfilEmpregado.php";
				}
				else
				{
					include_once "visao/formListaPerfilEmpregador.php";
				}
				
			}else{
				include_once "visao/formListaPerfilEmpregado.php";
			}
		}
	}
?>