<?php
	include_once "modelo/ComentarioPerfilDAO.class.php";
	
	class AlterarComentarioPerfil{
		
		function AlterarComentarioPerfil(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new ComentarioPerfilDAO();
				
				$comentario = new ComentarioPerfil();
				$comentario->setId($_POST["id"]);
				$comentario->setComentario($_POST["comentario"]);
				$dao->alterar($comentario);
				
				
				if($_POST["tipo"]=="empregado")
				{
					include_once "visao/formListaPerfilEmpregado.php";
				}
				else
				{
					include_once "visao/formListaPerfilEmpregador.php";
				}
				
				
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