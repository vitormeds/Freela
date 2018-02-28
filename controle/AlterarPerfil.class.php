<?php
	include_once "modelo/PerfilDAO.class.php";

	class AlterarPerfil{

		function AlterarPerfil(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio

				$dao = new PerfilDAO();
				$perfil = new Perfil();
				$perfil->setId($_POST["id"]);
				$perfil->setNome($_POST["nome"]);
				$perfil->setEmail($_POST["email"]);
				$perfil->setTelefone($_POST["telefone"]);
				$perfil->setSite($_POST["site"]);

				$dao->alterar($perfil);
				include_once "visao/formListaPerfilEmpregado.php";


			}else{
				$id = $_GET["id"];
				$dao = new PerfilDAO();
				$perfil = $dao->exibir($id);
				//echo $_GET["id"];

				//echo $usuario->getNome();
				include_once "visao/formAlterarPerfil.php";
			}
		}
	}
?>
