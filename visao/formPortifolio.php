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
    <title>Freela - portifolio</title>

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

    <div class="portifolio">
      <section>
        <center><a href="#bnt-imagem" class="btn btn-primary js-scroll-trigger sub-menu-portifolio">Imagens</a>
        <a href="#btn-video" class="btn btn-primary js-scroll-trigger sub-menu-portifolio">Videos</a></center>
      </section>

      <section id="bnt-imagem">
        <div class="sub-menu-portifolio">
          <?php
    			include_once "modelo/Portifolio.class.php";
    			include_once "modelo/PortifolioDAO.class.php";
    			$daoPortifolio = new PortifolioDAO();
            if(isset($_GET["user"]))
            {
              //$daoPortifolio->verificaportifolio($_GET["user"]);
      				//listar
      				$portifolio=$daoPortifolio->exibir($_GET["user"]);
            }
            else {

      			  $daoPortifolio->verificaportifolio($_SESSION["login"]);
      				//listar
      				$portifolio=$daoPortifolio->exibir($_SESSION["login"]);
            }
    				if(isset($_GET["op"])&&$_GET["op"]=="alterargithub")
    				{
    					foreach ($portifolio as $reggit)
    					{
    						echo"<form action='site.php?func=alterargithub' method='POST' enctype='multipart/form-data'>
    						<input type='hidden' id='id' name='id' value='".$reggit->getIdportifolio()."'>";
    						echo"<br><input id='linkgithub' name='linkgithub' value='".$reggit->getLinkgithub()."'><br><br>";
    						echo"<button type='submit' name='enviar' value='Editar' class='btn btn-success'>Editar</button></form>";
    					}
    				}
    				else if(isset($_GET["op"])&&$_GET["op"]=="editarlink")
    				{
    					foreach ($portifolio as $reggit)
    					{
    						echo"<form action='site.php?func=editarlink' method='POST' enctype='multipart/form-data'>
    						<input type='hidden' id='idlink' name='idlink' value='".$reggit->getIdportifolio()."'>";
    						echo"<input type='hidden' id='linkantigo' name='linkantigo' value='".$_GET['link']."'>";
    						echo"<br><input id='link' name='link' value='".$_GET["link"]."'><br><br>";
    						echo"<button type='submit' name='enviar' value='Editar' class='btn btn-success'>Editar</button></form>";
    					}
    				}
            else if(isset($_GET["op"])&&$_GET["op"]=="editarvideo")
    				{
    					foreach ($portifolio as $reggit)
    					{
    						echo"<form action='site.php?func=editarvideo' method='POST' enctype='multipart/form-data'>
    						<input type='hidden' id='idlink' name='idlink' value='".$reggit->getIdportifolio()."'>";
    						echo"<input type='hidden' id='linkantigo' name='linkantigo' value='".$_GET['link']."'>";
    						echo"<br><input id='link' name='link' value='".$_GET["link"]."'><br><br>";
    						echo"<button type='submit' name='enviar' value='Editar' class='btn btn-success'>Editar</button></form>";
    					}
    				}
            else
    				{
    					foreach ($portifolio as $regp)
    					{
    						if($regp!=null)
    						{
                  echo"<div class='port-git'>
                    <h2>Portfolio externo</h2>
                    <h3>Git Hub: </h3><h4><p>".$regp->getLinkgithub()."</p></h4>";
                    if(!isset($_GET["user"]))
                    {
                    echo"<a href='http://127.0.0.1/freela/site.php?func=portifolio&op=alterargithub' class='btn btn-primary sub-menu-portifolio'>Editar</a>";
                    }
                    echo"</div>";
    						}
                $links=$daoPortifolio->listaLinks($regp->getIdportifolio());
    						$count = count($links);
                echo"<h2>Outros Links</h2>";
    						for ($i=0; $i<$count;$i++)
    						{
    							if($links[$i]!=null)
    							{
                    echo"<div class='port-outros'>
                      </h3><h4><p>".$links[$i]."</p></h4>";
                      if(!isset($_GET["user"]))
                      {
                      echo" <a href='http://127.0.0.1/freela/site.php?func=portifolio&op=editarlink&link=".$links[$i]."' class='btn btn-primary sub-menu-portifolio'>Editar</a>
                      <form action='site.php?func=excluirlinks' method='POST' enctype='multipart/form-data'>
                      <input type='hidden' id='link' name='link' value='".$links[$i]."'>
                      <input type='hidden' id='id' name='id' value='".$regp->getIdportifolio()."'>
      								<button class='btn btn-primary sub-menu-portifolio' type='submit' name='enviar' value='Excluir'>Excluir</button></form>";
                      }
                      echo"</div>";
    							}
    						}
                if(!isset($_GET["user"]))
                {
    						echo"<form action='site.php?func=adicionarlink' method='POST' enctype='multipart/form-data'>";
    						echo"<input type='hidden' id='id' name='id' value='".$regp->getIdportifolio()."'>";
    						echo"<input type='text' id='link' name='link' >";
    						echo"<button type='submit' name='enviar' value='Inserir' class='btn btn-success'>Inserir</button></form>";
                }
                ?>
          <h2>Imagens</h2>
          <?php
          $imagens=$daoPortifolio->listaImagens($regp->getIdportifolio());
          $count = count($imagens);
          if(!isset($_GET["user"]))
          {
          echo"<div class='form-group'>
          <form action='site.php?func=adicionarimagem' method='POST' enctype='multipart/form-data'>
          <input type='hidden' id='id' name='id' value='".$regp->getIdportifolio()."'>
            <input type='file' id='arquivo' name='arquivo' required name='arquivo' class='form-control-fil'  aria-describedby='fileHelp'>
            <small id='fileHelp' class='form-text text-muted'>  </small>
            <button type='submit' name='enviar' value='Inserir' class='btn btn-primary'>Inserir</button></form>
          </div>";
        }
        ?>
            <div class="row">
              <?php
              for ($i=0; $i<$count;$i++)
              {
                if($imagens[$i]!=null)
                {
                  echo"<div class='col-md-6 col-sm-6'>
                    <div>
                      <a href='#'><img class='img-fluid img-portifolio' src='http://127.0.0.1/freela/fotos/".$imagens[$i]."'height='500' width='900' alt=''></a>
                    </div>
                    <center>
                    <form action='site.php?func=excluirimagem' method='POST' enctype='multipart/form-data'>
                    <input type='hidden' id='link' name='link' value='".$imagens[$i]."'>
                    <input type='hidden' id='id' name='id' value='".$regp->getIdportifolio()."'>
                    <button type='submit' name='enviar' value='Excluir' class='btn btn-primary sub-menu-portifolio'>Excluir</button></form>
                    </center>
                  </div>";
                }
              }
              ?>
            </div>
          </div>
      </section>

      <section id="btn-video">
        <div class="sub-menu-portifolio">
          <h2>Videos</h2>
          <?php
          $videos=$daoPortifolio->listaVideos($regp->getIdportifolio());
          $count = count($videos);
          if(!isset($_GET["user"]))
          {
          echo"
                <div class='form-group'>
                <form action='site.php?func=adicionarvideo' method='POST' enctype='multipart/form-data'>
                <input type='hidden' id='id' name='id' value='".$regp->getIdportifolio()."'>
                  <input type='text' id='link' name='link' class='form-control-fil'  aria-describedby='fileHelp'>
                  <small id='fileHelp' class='form-text text-muted'>  </small>
                  <button type='submit' name='enviar' value='Inserir' class='btn btn-primary'>Inserir</button></form>
                </div>";
              }
                ?>
          <div class="row">
            <?php
                  for ($i=0; $i<$count;$i++)
                  {
                    if($videos[$i]!=null)
                    {
                      echo"<div class='col-md-6'>
                        <div>
                          <iframe type='text/html' width='100%'' height='405'
                          src='".$videos[$i]."'
                          frameborder='0' allowfullscreen></iframe>
                        </div>
                        <center>
                        <form action='site.php?func=excluirvideo' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' id='link' name='link' value='".$videos[$i]."'>
                        <input type='hidden' id='id' name='id' value='".$regp->getIdportifolio()."'>
                        <button type='submit' name='enviar' value='Excluir' class='btn btn-primary sub-menu-portifolio'>Excluir</button></form>

                        </center>
                      </div>";
                    }
                  }
                }
              }
            ?>
          </div>
        </div>
      </section>
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
