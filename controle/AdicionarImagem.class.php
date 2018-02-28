<?php
	include_once "modelo/PortifolioDAO.class.php";

	class AdicionarImagem{

		function AdicionarImagem(){
			   if(isset($_FILES['arquivo']))
			   {
				  date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

				  $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
				  $new_name = date("Y-m-d-H-i-s") . $ext; //Definindo um novo nome para o arquivo
				  $dir = '/wamp64/www/Freela/fotos/'; //Diretório para uploadsC:\wamp64\www\Freela\fotos
				  move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
			   }
         if(isset($_POST["enviar"]))
   			{//Quando aparecer o POST significa que esta acontecendo um envio

   				$dao = new PortifolioDAO();

   				$dao->InserirImagem($new_name,$_POST['id']);


   				include_once "visao/formPortifolio.php";


   			}else{
   				include_once "visao/formPortifolio.php";
   			}
		}
	}
?>
