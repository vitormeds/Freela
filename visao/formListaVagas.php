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
    <title>Freela - Vagas</title>

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

    <div class=" listVagas">

      <p>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1>Resultado da pesquisa</h1>
      </p>
      <?php
        include_once "modelo/AnuncioDAO.class.php";
        if(isset($_GET["id"]))
        {
          $funcao = $_GET["id"];
          $dao = new AnuncioDAO();
          $lista = $dao->exibir($funcao);

                  foreach ($lista as $reg)
          {
            if($reg->getContratante()==$_SESSION["login"])
            {

              echo "<div class='row listVagas'>

                <div class=' perfilInf col-md-8 centralizar'>
                    <div class='card'>
                      <div class='card-titulo'>
                          <div>
                                <h1>Descrição da vaga</h1>
                          </div>
                              <h2>".$reg->getTitulo()."</h2><!--Titulo-->
                              <h3>Resumo: </h3>
                              <textarea name='Descrição form' rows='8' cols='80' readonly>".$reg->getResumo()."</textarea>
                              <h3>Valor medio: ".$reg->getValormedio()."</h3>
                              <h3>Descrição: </h3>
                              <textarea name='Descrição form' rows='8' cols='80' readonly>".$reg->getConteudo()."</textarea>
                              <br><br>
                              <center>
                                <a href='site.php?func=editarvaga&idanuncio=".$reg->getId()."' class='btn btn-primary'>Editar informações</a>
                              </center>
                      </div>
                    </div>
                </div>
              </div>";
              //listagem de candidatos
              include_once "modelo/ComentarioDAO.class.php";
              $dao = new ComentarioDAO();
              $lista=$dao->listaVaga($_GET["id"]);
              echo "<br>";
              echo "<h1>Candidatos</h1>";
              foreach ($lista as $reg)
              {


                echo"<div class='perfilInf'>
                  <div class='col-md-12 centralizar'>
                    <div class='card'>
                      <div class='card-content card-titulo'>
                          <div class='card-top'>
                                <h2><a href='site.php?func=perfilempregado&user=".$reg->getUsuario()."'</a>".$reg->getUsuario()."</h2>
                          </div>
                              <p>
                                  ".$reg->getComentario()."

                              </p>
                              <a href='site.php?func=escolherusuario&idanuncio=".$reg->getIdanuncio()."&usuario=".$reg->getUsuario()."' class='btn btn-primary btn-vg'>Escolher</a>
                      </div>
                    </div>
                  </div>
                </div>";
              }
            }
            else
            {


              echo "<div class='row listVagas'>

                <div class=' perfilInf col-md-8 centralizar'>
                    <div class='card'>
                      <div class='card-titulo'>
                          <div>
                                <h1>Descrição da vaga</h1>
                          </div>
                              <h2>".$reg->getTitulo()."</h2><!--Titulo-->
                              <h3>Resumo: </h3>
                              <textarea name='Descrição form' rows='8' cols='80' readonly>".$reg->getResumo()."</textarea>
                              <h3>Valor medio: ".$reg->getValormedio()."</h3>
                              <h3>Descrição: </h3>
                              <textarea name='Descrição form' rows='8' cols='80' readonly>".$reg->getConteudo()."</textarea>
                              <br><br>
                              <br>
                              <a href='site.php?func=perfilempregador&user=".$reg->getContratante()."'><p>Empregador: ".$reg->getContratante()."<p></a>

                              <center>
                                <a href='site.php?func=aplicarvaga&idanuncio=".$reg->getId()."' class='btn btn-primary'>Enviar proposta</a>
                              </center>
                      </div>
                    </div>
                </div>
              </div>";
            }
                  }
        }
        else
        {
          echo"<div class='perfilInf ' >
            <div class='col-md-12' >
              <div class='card' style='background-color:#BBDEFB;'>
                <div class='card-content card-titulo'>
                    <div class='card-top'>
                          <h2>Precisa-se de analista de sistema</h2>
                    </div>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,
                            or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there
                            isn't anything embarrassing hidden in the middle of text.

                        </p>
                        <a href='descricaoVaga.html' class='btn btn-dark btn-vg'>Saiba mais</a>
                </div>
              </div>
            </div>
          </div>";

          $dao = new AnuncioDAO();
          $lista = $dao->Listar();

                  foreach ($lista as $reg){


                    echo"<div class='perfilInf'>
                      <div class='col-md-12'>
                        <div class='card'>
                          <div class='card-content card-titulo'>
                              <div class='card-top'>
                                    <h2>".$reg->getTitulo()."</h2>
                              </div>
                                  <p>
                                      ".$reg->getResumo()."

                                  </p>
                                  <br>
                                  <a href='site.php?func=perfilempregador&user=".$reg->getContratante()."'><p>Empregador: ".$reg->getContratante()."<p></a>
                                  <a href='site.php?func=listavaga&id=".$reg->getId()."' class='btn btn-primary btn-vg'>Saiba mais</a>
                          </div>
                        </div>
                      </div>
                    </div>";
                  }
        }
      ?>
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
