<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Desafio Unyleya">
    <meta name="author" content="Lucas Porto">

    <title>Desafio Unyleya</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <style type="text/css">
		nav div img{
		  width: 18%;
		}

		nav div a{
			color: #632A40;
		}

        label{
            float: left;
        }

		#section-principal{
			height: 100vh;
			background-color: #632A40!important; 
		}

        .artigos{
            padding-top: 5vh;

        }

		#mainNav {
		    padding-top: 0.5rem;
		    padding-bottom: 0.5rem;
		}

		.bg-secondary {
		    background-color: white!important;
		}

        #radioBtn .notActive{
            color: #3276b1;
            background-color: #fff;
        }

       .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #F04D4D;
            border-color: #F04D4D;
        }
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
      	<img class="navbar-brand js-scroll-trigger" src="img/logo.png" >
        <a  href="#page-top">Desafio Unyleya</a>
      </div>
    </nav>

    <!-- Header -->
    <section id="section-principal" class="masthead bg-primary text-white text-center">
      <div class="container">
        <div class="row">
		    <div class="col">
                <article class="artigos">
                    <form id="calcFesta" method="post" action="">
                        <div class="form-group">
                            <label for="qtdAdulto" >Adultos: </label>
                            <input id="qtdAdulto" placeholder="Nº de adultos" class="form-control" type="number" name="qtdAdulto" min="1"></br>
                        </div>
                        <div class="form-group">
                            <label for="qtdCrianca">Crianças: </label>
                            <input id="qtdCrianca" placeholder="Nº de criança" class="form-control" type="number" name="qtdCrianca" min="1">
                        </div>
                        <div class="form-group" style="padding-top: 4vh;">
                            <label for="bebida" class="control-label text-left">Vai ter bebida?</label>
                            <div class="input-group">
                                <div id="radioBtn" class="btn-group">
                                    <a class="btn btn-primary btn-sm active" data-toggle="bebida" data-title="SIM">SIM</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="bebida" data-title="NAO">NÃO</a>
                                </div>
                                <input type="hidden" name="bebida" id="bebida">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="location.reload();">Calcular</button>
                    </form>
                </article>
		    </div>
		    <div class="col">
                <article class="artigos">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Salgados</th>
                                <th>Doces</th>
                                <th>Kg de Carne</th>
                                <th>Litros de Refrigerante</th>
                                <th>Bebidas</th>
                                <th>Latas de Cerveja</th>
                                <th>Litros de Whisky</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $arquivo = file_get_contents('data.json');
                                $json = json_decode($arquivo);

                                if(count($json) > 0){
                                    foreach ($json as $dado) {
                                        $qtdSalgados = intval($dado->qtdAdulto/10) * 100;
                                        $qtdSalgados = $qtdSalgados + intval($dado->qtdCrianca/2) * 10;
                                        $qtdDoces = intval($dado->qtdCrianca/4) * 5;
                                        $qtdCarne = intval(($dado->qtdAdulto + $dado->qtdCrianca)/6);
                                        $qtdRefrigerante = intval(($dado->qtdAdulto + $dado->qtdCrianca)/4) * 2;

                                        $qtdCerveja = 0;
                                        $qtdWhisky = 0;

                                        if($dado->bebida == "SIM"){
                                            $qtdCerveja = intval($dado->qtdAdulto/3) * 12;
                                            $qtdWhisky = intval($dado->qtdAdulto/30);
                                            $qtdCerveja = $qtdCerveja - $dado->qtdCrianca * 2;
                                        }
                                        echo "
                                            <tr>
                                                <td>$qtdSalgados</td>
                                                <td>$qtdDoces</td>
                                                <td>$qtdCarne</td>
                                                <td>$qtdRefrigerante</td>
                                                <td>$dado->bebida</td>
                                                <td>$qtdCerveja</td>
                                                <td>$qtdWhisky</td>
                                                <td>
                                                    <button class='btn btn-primary' onclick='Excluir($dado->id);'>
                                                        <img class='icon-remove' src='img/remove.png'>
                                                    </button>
                                                </td>
                                            </tr>
                                            ";
                                    }
                                }

                            ?>
                        </tbody>
                    </table>
                </article>		     
		    </div>
		 </div>
      </div>
    </section>

    <!-- Main JavaScript -->
    <script src="js/main.js"></script>    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
