<?php
session_start();

if(isset($_GET["func"])){
    $funcao = $_GET["func"];
	if($funcao == "novousuario")
	{
        include_once "visao/formAdicionaUsuario.php";
    }
	else if($funcao == "login")
	{
        include_once "controle/login.php";
    }
	else if($funcao == "logout")
	{
        include_once "controle/logout.php";
    }
	else if($funcao == "vagas")
	{
        include_once "visao/formListaVagas.php";
    }
	else if($funcao == "cadastrarusuario")
	{
        include_once "controle/AdicionarUsuarios.class.php";
        $controle = new AdicionarUsuarios();
    }
	else if($funcao == "alteraanuncio")
	{
        include_once "controle/AlterarAnuncio.class.php";
        $controle = new AlterarAnuncio();
    }
	else if($funcao == "listavaga")
	{
        include_once "visao/formListaVagas.php";
    }
	else if($funcao == "novoprojeto")
	{
        include_once "controle/AdicionarAnuncio.class.php";
        $controle = new AdicionarAnuncio();
    }
	else if($funcao == "perfis")
	{
        include_once "visao/formPerfis.class.php";
    }
	else if($funcao == "aplicarvaga")
	{
        include_once "controle/AplicarVaga.class.php";
        $controle = new AplicarVaga();
    }
	else if($funcao == "meusanuncios")
	{
        include_once "visao/formListaMeusAnuncios.php";
    }
	else if($funcao == "editarvaga")
	{
        include_once "controle/AlterarAnuncio.class.php";
        $controle = new AlterarAuncio();
    }
	else if($funcao == "escolherusuario")
	{
        include_once "controle/EscolherUsuario.class.php";
        $controle = new EscolherUsuario();
    }
	else if($funcao == "perfilempregado")
	{
        include_once "visao/formListaPerfilEmpregado.php";
    }
	else if($funcao == "perfilempregador")
	{
        include_once "visao/formListaPerfilEmpregador.php";
    }
	else if($funcao == "editarperfil")
	{
        include_once "controle/AlterarPerfil.class.php";
        $controle = new AlterarPerfil();
    }
	else if($funcao == "trocarsenha")
	{
        include_once "controle/AlterarSenha.class.php";
        $controle = new AlterarSenha();
    }
	else if($funcao == "inserircomentario")
	{
        include_once "controle/AdicionarComentarioPerfil.class.php";
        $controle = new AdicionarComentarioPerfil();
    }
	else if($funcao == "editarcomentarioperfil")
	{
        include_once "controle/AlterarComentarioPerfil.class.php";
        $controle = new AlterarComentarioPerfil();
    }
	else if($funcao == "excluircomentarioperfil")
	{
        include_once "controle/ExcluirComentarioPerfil.class.php";
        $controle = new ExcluirComentarioPerfil();
    }
	else if($funcao == "portifolio")
	{
        include_once "visao/formPortifolio.php";
    }
	else if($funcao=="alterargithub")
	{
		include_once "controle/Alterargithub.class.php";
        $controle = new Alterargithub();
	}
	else if($funcao=="excluirlinks")
	{
		include_once "controle/ExcluirLinks.class.php";
        $controle = new ExcluirLinks();
	}
	else if($funcao=="editarlink")
	{
		include_once "controle/AlterarLinks.class.php";
        $controle = new AlterarLinks();
	}
	else if($funcao=="adicionarlink")
	{
		include_once "controle/AdicionarLinks.class.php";
        $controle = new AdicionarLinks();
	}
  else if($funcao=="excluirvideo")
	{
		include_once "controle/ExcluirVideo.class.php";
        $controle = new ExcluirVideo();
	}
	else if($funcao=="editarvideo")
	{
		include_once "controle/AlterarVideo.class.php";
        $controle = new AlterarVideo();
	}
	else if($funcao=="adicionarvideo")
	{
		include_once "controle/AdicionarVideo.class.php";
        $controle = new AdicionarVideo();
	}
  else if($funcao=="excluirimagem")
	{
		include_once "controle/ExcluirImagem.class.php";
        $controle = new ExcluirImagem();
	}
	else if($funcao=="adicionarimagem")
	{
		include_once "controle/AdicionarImagem.class.php";
        $controle = new AdicionarImagem();
	}
}
