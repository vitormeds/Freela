<?php
	include_once "modelo/PerfilDAO.class.php";
	
	class AdicionarPerfil{
		
		function AdicionarPerfil(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new PerfilDAO();
				
				$perfil = new Perfil();
				$anuncio->setNome($_POST["nome"]);
				$anuncio->setEmail($_POST["email"]);
				$anuncio->setTelefone($_POST["telefone"]);
				$anuncio->setSite($_POST["site"]);
				$anuncio->setIdportifolio($_POST["idportifolio"]);
				$dao->inserir($anuncio);
				
				
				$lista = $dao->listar();
				include_once "visao/listaPerfil.php";
				
				
			}else{
				include_once "visao/formAdicionaPerfil.php";
			}
		}
	}
?>