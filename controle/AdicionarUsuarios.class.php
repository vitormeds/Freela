<?php
	include_once "modelo/UsuarioDAO.class.php";
	include_once "modelo/PerfilDAO.class.php";

	class AdicionarUsuarios{

		function AdicionarUsuarios(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new UsuarioDAO();

				$usuario = new Usuario();
				$senha=md5($_POST["senha"]);
				$usuario->setNome($_POST["nome"]);
				$usuario->setEmail($_POST["email"]);
				$usuario->setSenha($senha);
				$dao->inserir($usuario);
				echo"<script>alert('Cadastro Efetuado');</script>";
				include_once "index.php";


			}else{
				include_once "index.php";
			}
		}
	}
?>
