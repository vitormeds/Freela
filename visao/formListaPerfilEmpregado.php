<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/freela.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Custom CSS -->
    <link href="css/freela.css" rel="stylesheet">
    <title>Freela - Perfil do Contratado</title>

  </head>
  <body>
    <div class="w3-top">
      <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="#" class="w3-bar-item w3-button"><b>Free</b>la</a>
      <!-- Float links to the right. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
        <a href="site.php?func=perfilempregado" class="w3-bar-item w3-button">Perfil Contratado</a>
        <a href="site.php?func=perfilempregador" class="w3-bar-item w3-button">Perfil Anunciante</a>
        <a href="site.php?func=meusanuncios" class="w3-bar-item w3-button">Meus anuncios</a>
        <a href="#Notificações" class="w3-bar-item w3-button">Notificações</a>
        <a href="site.php?func=vagas" class="w3-bar-item w3-button">Vagas</a>
        <a href="site.php?func=portifolio" class="w3-bar-item w3-button">Portfolio</a>
        <a href="site.php?func=logout" class="btn btn-dark btn-lg js-scroll-trigger">Logout</a>
      </div>
      </div>
    </div>

    <div class="row listVagas">

      <div class=" perfilInf col-md-8 centralizar">
          <div class="card">
            <div class="card-titulo">
                <div>
                      <h1>Dados do Contratante</h1>
                </div>
                <?php
          			include_once "modelo/PerfilDAO.class.php";
          			include_once "modelo/AnuncioDAO.class.php";
          			include_once "modelo/UsuarioDAO.class.php";
          			include_once "modelo/ComentarioPerfilDAO.class.php";
          			$daoPerfil = new PerfilDAO();
          			$daoAnuncio = new AnuncioDAO();
          			$daoUsuario = new UsuarioDAO();
          			$daoComentarioPerfil = new ComentarioPerfilDAO();
          			if(isset($_GET["trocarsenha"]))
          			{
          				//listar
          					$perfil=$daoPerfil->exibir($_SESSION["login"]);
          					$anuncio=$daoAnuncio->exibirPerfil($_SESSION["login"]);
          					$user=$daoUsuario->exibir($_SESSION["login"]);
          					foreach ($user as $regu)
          					{


                      echo"<div class='row formulario'>
                  			<div class='col-md-8'>
                          <p><h1>Alterar senha</h1></p>
                          <form action='site.php?func=trocarsenha' method='POST' enctype='multipart/form-data'>
                          <input type='hidden' id='id' name='id' value='".$regu->getId()."'>
              						<input type='hidden' id='email' name='email' value='".$regu->getEmail()."'>
                              <b>Nova senha:</b>
                              <input type='password' class='form-control' name='senhanova' required minlength='2' maxlength='62'>
                              <br/>
                              <b>Confirme nova senha:</b>
                              <input type='password' class='form-control' name='senhaconf' required minlength='2' maxlength='62'>
                              <br/>
                              <button type='submit' name='enviar' value='Editar' class='btn btn-primary' >Editar</button>
                              <br>
                              <br>
                          </form>
                  			</div>
                  		</div>";
          					}
          			}
          			else if(isset($_GET["id"]))
          			{
          				//listar
          					$perfil=$daoPerfil->exibir($_SESSION["login"]);
          					$anuncio=$daoAnuncio->exibirPerfil($_SESSION["login"]);
          					foreach ($perfil as $regp)
          					{

                      echo"<div class='row formulario'>
                  			<div class='col-md-8'>
                  				<form action='site.php?func=editarperfil' method='POST' enctype='multipart/form-data'>
                              <input type='hidden' id='id' name='id' value='".$regp->getId()."'>
                  						<h1>Editar Informaçoes</h1>
                  						<b>Nome: </b>
                  						<input type='text' value='".$regp->getNome()."' class='form-control' name='nome' id='nome' required minlength='2' maxlength='62'>
                  						<b>Telefone</b>
                  						<input type='text' value='".$regp->getTelefone()."' class='form-control' name='telefone' id='telefone' required='required' />
                              <b>E-mail:</b>
                  						<input type='text' value='".$regp->getEmail()."' class='form-control' name='email' id='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='xyz@something.com' required>
                  						<b>Site: </b>
                  						<input type='text' value='".$regp->getSite()."' class='form-control' name='site' id='site'  required>
                  						<br/>
                  						<button type='submit' name='enviar' value='Editar' class='btn btn-primary' >Editar</button>
                  						<br>
                  						<br>
                  				</form>
                  			</div>
                  		</div>";
          					}
          			}
          			else
          			{

                  if(isset($_GET["user"]))
                  {
                    //$daoPerfil->verificaperfil($_SESSION["user"]);
                    //listar
                    $perfil=$daoPerfil->exibir($_GET["user"]);
                    $anuncio=$daoAnuncio->exibirPerfil($_GET["user"]);
                  }
                  else {
                    $daoPerfil->verificaperfil($_SESSION["login"]);
          					//listar
          					$perfil=$daoPerfil->exibir($_SESSION["login"]);
          					$anuncio=$daoAnuncio->exibirPerfil($_SESSION["login"]);
                  }

          					foreach ($perfil as $regp)
          					{
          						if($regp!=null)
          						{
                    echo"<h3>Nome: ".$regp->getNome()."</h3>
                    <h3>Email: ".$regp->getEmail()."</h3>
                    <h3>Telefone: ".$regp->getTelefone()."</h3>
                    <h3>Site: ".$regp->getSite()."</h3>
                    <h3>Portfolio <a href='site.php?func=portifolio&user=".$regp->getNome()."' class='btn btn-primary'>Link</a></h3>";
                    }
                    if(!isset($_GET["user"]))
                    {
                    foreach ($perfil as $regp)
          					{
                      echo"  <center>
                          <a href='http://127.0.0.1/freela/site.php?func=perfilempregado&id=".$regp->getId()."' class='btn btn-primary'>Editar informações</a>
                          <a href='http://127.0.0.1/freela/site.php?func=perfilempregado&trocarsenha=true&id=".$regp->getId()."' class='btn btn-primary'>Alterar senha</a>
                        </center>";
          					}}?>
            </div>
          </div>
      </div>
    </div>

    <div class="row listVagas">

      <div class=" perfilInf col-md-8 centralizar">
          <div class="card">
            <div class="card-titulo">
                <div>
                      <h1>Serviços prestados</h1>
                      <?php
                      foreach ($anuncio as $rega)
          						{
          							if($rega!=null)
          							{
                          echo"<div class='card'>
                            <div class='card-content card-titulo'>
                                <div class='card-top'>
                                      <h2>".$rega->getTitulo()."</h2>
                                </div>
                                    <p>
                                        ".$rega->getResumo()."

                                    </p>
                                    <a href='http://127.0.0.1/freela/site.php?func=listavaga&id=".$rega->getId()."'><button type='button' class='btn btn-primary btn-vg' data-toggle='modal' data-target=''#my' data-dismiss='modal'>Saiba mais</button></a>
                            </div>
                          </div>";
          							}
          						}
                      ?>


                    </div>
            </div>
          </div>
      </div>
    </div>


    <div class="row listVagas">

      <div class=" perfilInf col-md-8 centralizar">
          <div class="card">
            <div class="card-titulo">
                <div>
                      <h1>Comentarios</h1>
                </div>

                <form action='site.php?func=inserircomentario' method='POST' enctype='multipart/form-data'>
                <div class="card">
                  <div class="card-content card-titulo">
                    <div>
                      <input type="hidden" id="tipo" name="tipo" value="empregado">
                      <?php
                        foreach ($perfil as $regp)
                        {
                          echo"<input type='hidden' id='idusuarioperfil' name='idusuarioperfil' value='".$regp->getId()."'>";
                        }
                      ?>
                        <center><textarea name="comentario" rows="8" cols="100"></textarea></center>
                    </div>
                    <button type='submit' name='enviar' value='enviar' class="btn btn-primary btn-vg">Comentar</button>
                  </div>
                </div>
                </form>
            </div>
            <?php
            $comentarios=$daoComentarioPerfil->listar($regp->getId(),"empregado");
            foreach ($comentarios as $r)
            {

              if($r->getUsuario()==$_SESSION["login"])
              {


                  echo"<form action='site.php?func=editarcomentarioperfil' method='POST' enctype='multipart/form-data'><div class='card-content card-titulo'>
                      <div class='card-top'>
                            <h2>Usuario: ".$r->getUsuario()."</h2>
                      </div>
                      <div class=''>
                      <input type='hidden' name='id' value='".$r->getId()."'>
                      <input type='hidden' name='tipo' value='empregado'>
                        <textarea name='comentario' rows='8' cols='100'>".$r->getComentario()."</textarea>
                      </div>
                      <button type='submit' name='enviar' value='enviar' class='btn btn-primary btn-vg'>Editar</button>
                      <a href='http://127.0.0.1/freela/site.php?func=excluircomentarioperfil&t=empregado&id=".$r->getId()."' class='btn btn-primary btn-vg'>Excluir</a>
                  </div></form>";
              }
              else
              {
                echo"<div class='card-content card-titulo'>
                    <div class='card-top'>
                          <h2>Usuario: ".$r->getUsuario()."</h2>
                    </div>
                        <p>".$r->getComentario()."

                        </p>
                </div>";
              }
            }
        }}
        ?>




          </div>
      </div>
    </div>
  </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h4>
              <strong>Freela</strong>
            </h4>
            <ul class="list-unstyled">
              <li>
                <i class="fa fa-envelope-o fa-fw"></i>
                <a href="freela@example.com">freela.com</a>
              </li>
            </ul>
            <br>
            <hr class="small">
            <p class="text-muted">Copyright &copy; Moises Wesley 2017</p>
            <p class="text-muted">Copyright &copy; Vitor Mendes 2017</p>
          </div>
        </div>
      </div>
      <a id="to-top" href="#top" class="btn btn-dark btn-lg js-scroll-trigger">
        <i class="fa fa-chevron-up fa-fw fa-1x"></i>
      </a>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="css/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="css/freela.js"></script>

  </body>
</html>
