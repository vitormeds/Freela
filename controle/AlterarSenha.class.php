<?php
	include_once "modelo/UsuarioDAO.class.php";
	
	class AlterarSenha{
		
		function AlterarSenha(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new UsuarioDAO();
				$dao->alterarsenha($_POST["senhanova"],$_POST["id"]);
				
				include_once "visao/formListaPerfilEmpregado.php";
				
				
			}else{
				include_once "visao/formListaPerfilEmpregado.php";
			}
		}
	}
?>