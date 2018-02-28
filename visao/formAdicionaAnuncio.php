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
    <title>Freela - Adicionar Anuncios</title>

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

      <div class="row formulario">
  			<div class="col-md-8">
  				<form action="site.php?func=novoprojeto" method="POST" enctype="multipart/form-data">
  						<h1>Adicionar novo anuncio</h1>
  						<b>Titulo: </b>
              <?php
      					echo "<input type='hidden' name='contratante' value='".$_SESSION["login"]."'>";
      				?>
  						<input type="text" class="form-control" name="titulo" id="nome" required minlength="2" maxlength="62"/><!--pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"-->
  						<br/>
  						<b>Resumo: </b>
  						  <textarea name="resumo" rows="8" cols="128"></textarea>
              <b>Descrição:</b><br/>
              <textarea name="conteudo" rows="8" cols="128"></textarea>
  						<br/>
  						<button type="submit" name="enviar" value="Enviar" class="btn btn-primary" >Salvar</button>
              <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Destacar Anuncio R$: 1.00</button>
  						<br>
  						<br>
  				</form>
  			</div>
  		</div>

      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-login">Digite os dados do cartão</h4>
          </div>
          <div class="modal-body">
          <div align="center">
            <div class="col-md-8">
               <form action="site.php?func=login" method="post">
                  <b>Titular:</b>
                  <input type="text" class="form-control" name="login" required minlength="2" maxlength="62">
                  <br/>
                  <b>Data de Validade:</b>
                  <input type="text" class="form-control" name="senha" required minlength="2" maxlength="62">
                  <br/>
                  <b>Numero do Cartão:</b>
                  <br/>
                  <input type="text" class="form-control" name="senha" required minlength="2" maxlength="62">
                  <br/>
                  <b>Codigo do Cartão:</b>
                  <input type="text" class="form-control" name="senha" required minlength="2" maxlength="62">
                  <br/>
                  <button  name="enviar" value="Enviar" data-dismiss="modal" class="btn btn-primary" >Confirmar</button>
                  <br>
                  <br>
              </form>
            </div>
          </div>

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
