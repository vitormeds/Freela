<?php
	include_once "modelo/AnuncioDAO.class.php";
	
	class AlterarAuncio{
		
		function AlterarAuncio(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new AnuncioDAO();
				
				$anuncio = new Anuncio();
				$anuncio->setId($_POST["id"]);
				$anuncio->setTitulo($_POST["titulo"]);
				$anuncio->setConteudo($_POST["conteudo"]);
				$anuncio->setValormedio($_POST["valormedio"]);
				$anuncio->setContratante($_POST["contratante"]);
				$anuncio->setResumo($_POST["resumo"]);
				$dao->alterar($anuncio);
				
				$lista = $dao->listar();
				include_once "visao/formListaVagas.php";
				
				
			}else{
				$id = $_GET["idanuncio"];
				$dao = new AnuncioDAO();
				$anuncio = $dao->exibir($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarAnuncio.class.php";
			}
		}
	}
?>