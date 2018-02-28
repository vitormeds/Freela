<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freela</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/freela.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Custom CSS -->
    <link href="css/freela.css" rel="stylesheet">
    <title>Freela - Meus Anuncios</title>

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

    <section>
      <div class=" row listVagas">
        <div class="col-md-12">
          <p>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1>Meus Anuncios <a href="site.php?func=novoprojeto" class="btn btn-primary btn-vg">Criar anuncio</a></h1>
          </p>
        </div>
  </div>
    </section>
      <?php

  			include_once "modelo/AnuncioDAO.class.php";
  				$dao = new AnuncioDAO();
  				$lista = $dao->listarMeusAnuncios();

                  foreach ($lista as $reg){

                    echo"<div class='perfilInf '>
                      <div class='col-md-12'>
                        <div class='card'>
                          <div class='card-content card-titulo'>
                              <div class='card-top'>
                                    <h2>".$reg->getTitulo()."</h2>
                              </div>
                                  <p>
                                    ".$reg->getResumo()."

                                  </p>
                                  <a href='site.php?func=listavaga&id=".$reg->getId()."' class='btn btn-primary btn-vg'>Ver Mais</a>
                          </div>
                        </div>
                      </div>
                    </div>";
                  }

  		?>

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
