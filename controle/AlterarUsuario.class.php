<?php
	include_once "modelo/UsuarioDAO.class.php";
	
	class AlterarUsuario{
		
		function AlterarUsuario(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new UsuarioDAO();
				
				$usuario = new Usuario();
				$usuario->setId($_POST["id"]);
				$usuario->setNome($_POST["nome"]);
				$usuario->setEmail($_POST["email"]);
				$usuario->setSenha($_POST["senha"]);
				$dao->alterar($usuario);
				
				$lista = $dao->listar();
				include_once "visao/listaUsuario.php";
				
				
			}else{
				$id = $_GET["id"];
				$dao = new UsuarioDAO();
				$usuario = $dao->exibir($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarUsuario.php";
			}
		}
	}
?>