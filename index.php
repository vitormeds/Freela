<!DOCTYPE html>
<html lang="en">

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

    <!-- Custom CSS -->
    <link href="css/freela.css" rel="stylesheet">
    <?php if(isset($_SESSION["login"]))
    {
      header("location:visao/formListaVagas.php");
    }
    ?>
  </head>

  <body>

    <!-- Header -->
    <header class="header" id="top">
      <div class="text-vertical-center">
        <h1>Freela</h1>
        <br>
        <a href="#about" class="btn btn-dark btn-lg js-scroll-trigger">Descubra mais</a>
      </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
      <div class="container text-center">
        <h1>Cansado de procurar o trabalho que nao combina com você?</h1>
        <p>Cansado de ir a procura do trabalho perfeito, ou precisa de um profissional para fazer seus serviços e nao encontra? Aqui nos acharemos para você.</p>
        <p>
          Marketing, Web Designer, Programador, Tradução, Android
        </p>
      </div>
      <!-- /.container -->
    </section>

    <section>
	<aside class="callout">
      <div class="text-vertical-center ">
        <h1>Benefícios</h1>
        <h2>Encontre profissionais gratuitamente</h2>
        <h2>Poste seus projetos gratuitamente</h2>
        <h2>Receba gratuitamente alerta sobre novos projetos</h2>
        <h2>Conheça novos profissionais de diversas areas de conhecimento</h2>
        <h2>O poder para escolher projetos e profissionais de qualidade</h2>
      </div>
    </aside>
    </section>
    <!-- Callout -->

    <!-- Call to Action -->
    <aside class="call-to-action bg-primary text-white">
      <div class="container text-center">
        <h3>Não perca tempo venha conquistar o seu futuro.</h3>
        <button type="button" class="btn btn-lg btn-light" data-toggle="modal" data-target="#myModal">Vamos começar</button>
      </div>
    </aside>

    <!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">

			  <h4 class="modal-login">Login</h4>
			</div>
			<div class="modal-body">
			<div align="center">
				<div class="col-md-8">
					 <form action="site.php?func=login" method="post">
							<b>Login:</b>
							<input type="text" class="form-control" name="login" required minlength="2" maxlength="62">
							<b>Senha:</b>
							<input type="password" class="form-control" name="senha" required minlength="2" maxlength="62">
							<br/>
							<button type="submit" name="enviar" value="Enviar" class="btn btn-primary" >Login</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my" data-dismiss="modal">Cadastre-se</button>
							<br>
							<br>
					</form>
				</div>
			</div>

		  </div>

		</div>
	  </div>
  </div>

  <!-- MODAL Cadastre-se  -->
  <div class="modal fade" id="my" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">

			  <h4 class="modal-title">Cadastro</h4>
			</div>
			<div class="modal-body">
			<div align="center">
				<div class="col-md-8">
    		<form action="site.php?func=cadastrarusuario" method="POST" enctype="multipart/form-data">
						<b>Nome Completo:</b>
						<input type="text" class="form-control" name="nome" required minlength="2" maxlength="62">
						<b>Senha</b>
						<input type="password" class="form-control" name="senha" required minlength="2" maxlength="62">
						<b>E-mail:</b>
						<input type="text" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required>
						<br/>
						<button type="submit" name="enviar" class="btn btn-primary" >Salvar</button>
						<button type="button" id="cancel" class="btn" data-dismiss="modal">Cancelar</button>
						<br>
					</form>
				</div>
			</div>

		  </div>

		</div>
	  </div>
  </div>

    <!-- Footer -->
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
