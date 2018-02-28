<?php
	include_once "modelo/AnuncioDAO.class.php";

	class AdicionarAnuncio{

		function AdicionarAnuncio(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new AnuncioDAO();

				$anuncio = new Anuncio();
				$anuncio->setTitulo($_POST["titulo"]);
				$anuncio->setConteudo($_POST["conteudo"]);
				$anuncio->setContratante($_POST["contratante"]);
				$anuncio->setResumo($_POST["resumo"]);
				$dao->inserir($anuncio);


				$lista = $dao->listar();
				include_once "visao/formListaMeusAnuncios.php";


			}else{
				include_once "visao/formAdicionaAnuncio.php";
			}
		}
	}
?>
