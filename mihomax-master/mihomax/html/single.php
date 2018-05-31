<?php 
	error_reporting(E_ALL & ~E_NOTICE);
	include_once("fonctions_panier.inc.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mihomax</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mihomax" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/catalog.css" rel="stylesheet">
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    
    
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //for-mobile-apps -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/contactstyle.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/faqstyle.css" type="text/css" media="all" />
    <link href="../css/single.css" rel='stylesheet' type='text/css' />
    <link href="../css/medile.css" rel='stylesheet' type='text/css' />
    <!-- banner-slider -->
    <link href="../css/jquery.slidey.min.css" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="../css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <script src="../js/owl.carousel.js"></script>
    <script src="../js/checkform.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items: 5,
                itemsDesktop: [640, 4],
                itemsDesktopSmall: [414, 3]

            });

        });

    </script>
    <!-- //banner-bottom-plugin -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
    <script type="text/javascript" src="../js/catalog.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });

    </script>
    
    
    
    
    <!-- start-smoth-scrolling -->
</head>
	
<body>


<!-- header -->
<nav class="navbar">

    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">MIHOMAX</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
		<?php 
			if( isset($_SESSION["username"]) ){
				echo "<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>Salut, ".$_SESSION['username']."</a></li>";
				echo "<li><a href=\"../index.php?logout='1'\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></li>";
				echo "<li><a href=\"panier.php\" onclick=\"window.open(this.href, '', 'toolbar=no, location=no, directories=no,	status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=600'); return false;\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Panier<span class=\"badge\">".compterArticles()."</span></a></li>";
				
			}
			else{
				echo "<li><a href=\"../connection/register.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>\n";
				echo "<li><a href=\"../connection/login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
				
			}
		?>
	<!--   <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier<span class="badge"><?php echo compterArticles();?></span></a></li>
	--> 
    </ul>

</nav>
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="mihamax_logo">
                <a href="../index.php">
                    <img src="../images/logo.png"></a>
            </div>
            <div class="w3_search">
                <form action="catalog.php" method="get">
                    <input type="text" name="nom" placeholder="Recherche">
                    <input type="submit" value="Aller">
                </form>
            </div>
            <div class="w3l_sign_in_register">
                <ul>
                    <li><i class="" aria-hidden="true"></i>
                        <li><a href="../connection/login.php">Se connecter</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //header -->
    <!-- nav -->
    <div class="movies_nav">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="../index.php">Accueil</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="catalog.php?genre=Action">Action</a></li>
                                                <li><a href="catalog.php?genre=Biographie">Biographie</a></li>
                                                <li><a href="catalog.php?genre=Crime">Crime</a></li>
                                                <li><a href="catalog.php?genre=Famille">Famille</a></li>
                                                <li><a href="catalog.php?genre=Horreur">Horreur</a></li>
                                                <li><a href="catalog.php?genre=Romance">Romance</a></li>
                                                <li><a href="catalog.php?genre=Sports">Sports</a></li>
                                                <li><a href="catalog.php?genre=Guerre">Guerre</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="catalog.php?genre=Adventure">Adventure</a></li>
                                                <li><a href="catalog.php?genre=Comédie">Comédie</a></li>
                                                <li><a href="catalog.php?genre=Documentaire">Documentaire</a></li>
                                                <li><a href="catalog.php?genre=Fantaisie">Fantaisie</a></li>
                                                <li><a href="catalog.php?genre=Thriller">Thriller</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="catalog.php?genre=Animation">Animation</a></li>
                                                <li><a href="catalog.php?genre=Costume">Costume</a></li>
                                                <li><a href="catalog.php?genre=Drame">Drame</a></li>
                                                <li><a href="catalog.php?genre=Histoire">Histoire</a></li>
                                                <li><a href="catalog.php?genre=Musicale">Musicale</a></li>
                                                <li><a href="catalog.php?genre=Psychologique">Psychologique</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="catalog.php?genre=séries">tv - séries</a></li>
                            <li><a href="catalog.php">nouveautés</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pays <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="catalog.php?pays=Asie">Asie</a></li>
                                                <li><a href="catalog.php?pays=France">France</a></li>
                                                <li><a href="catalog.php?pays=Taiwan">Taiwan</a></li>
                                                <li><a href="catalog.php?pays=Amérique">Amérique</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="catalog.php?pays=Chine">Chine</a></li>
                                                <li><a href="catalog.php?pays=Hong-Kong">Hong-Kong</a></li>
                                                <li><a href="catalog.php?pays=Japon">Japon</a></li>
                                                <li><a href="catalog.php?pays=Thailand">Thailand</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="catalog.php?pays=Europe">Europe</a></li>
                                                <li><a href="catalog.php?pays=Inde">Inde</a></li>
                                                <li><a href="catalog.php?pays=Corée">Corée</a></li>
                                                <li><a href="catalog.php?pays=Royaume-Uni">Royaume-Uni</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="catalog.php">Top ventes</a></li>
                            <li><a href="catalog.php">A - z list</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    	<?php
			require_once("../BD/connexion.inc.php");
		
			$requete="SELECT * FROM films WHERE idf=?";
			
			$stmt = $connexion->prepare($requete);
			$stmt->bind_param("i", $_GET["id"]);
			$stmt->execute();
			$result = $stmt->get_result();
			$ligne = $result->fetch_object();
			echo "<h1 class=\"text-center\">".$ligne->titre."</h1>";
			echo "<div class=\"text-center\">\n";
			echo "  <img src=\"../pochettes/".$ligne->pochette."\" class=\"rounded\" alt=\"Image de film\">\n";
			echo "</div>";
			echo "<div class=\"conteiner col-xl-7 col-lg-7 col-md-8 col-sm-10 col-xs-12\">";
			echo "<table class=\"table table-bordered table-hover table-condensed\">";
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Realisateur</th>\n";
			echo "    <td>".$ligne->res."</td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Genre</th>\n";
			
			
			$requeteGenre="SELECT genres.nom FROM genres, films_genres, films where films.idf=".$ligne->idf." AND films_genres.idf=films.idf AND genres.idgen=films_genres.idgen";
			$stmt1 = $connexion->prepare($requeteGenre);
			$stmt1->execute();
			$result1 = $stmt1->get_result();
			$allGenres=$result1->fetch_object()->nom;
			while ($ligne1 = $result1->fetch_object()){
				$allGenres.=", ".$ligne1->nom;
			}
			
			
			
			
			
			echo "    <td>".$allGenres."</td>\n";
			echo "  </tr>\n";
			
			
			
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Duree</th>\n";
			echo "    <td>".$ligne->duree."</td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Pays</th>\n";
			echo "    <td>".$ligne->pays."</td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Rating</th>\n";
			echo "    <td>".$ligne->rating."</td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Prix</th>\n";
			echo "    <td>".$ligne->prix."</td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <th scope=\"row\">Description</th>\n";
			echo "    <td>".$ligne->descr."</td>\n";
			echo "  </tr>\n";
			echo "   <tr><td colspan=\"2\">";
			if( isset($_SESSION["username"]) ){
				echo "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"panier.php?action=ajout&amp;i=".$ligne->idf."&amp; u=".($ligne->pochette)."&amp;l=".($ligne->titre)."&amp;q=1&amp;p=".($ligne->prix)."\" onclick=\"window.open(this.href, '', 'toolbar=no, location=no, directories=no,	status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=600'); return false;\">Au panier</a>";
			}else{
				echo "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"../connection/login.php\">Au panier</a>";
			}
			echo "</td></tr>";
			echo "</table>\n";
			echo "</div>";
			echo "<div class=\"conteiner\">";
			echo "<div class=\"embed-responsive embed-responsive-16by9 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
			echo "	<iframe src=\"https://www.youtube.com/embed/".$ligne->trailer."?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1\" allowfullscreen></iframe>";
			echo "</div>";
			echo "</div>";
			mysqli_close($connexion);
		?>
		<div class="container"></div>
<div class="footer">
	<div class="container">
		<div class="w3ls_footer_grid">
			<div class="col-md-6 w3ls_footer_grid_left">
				<div class="w3ls_footer_grid_left1">
					<h2>Abonnez-vous</h2>
					<div class="w3ls_footer_grid_left1_pos">
						<form action="#" method="post">
							<input type="email" name="email" placeholder="Your email..." required="required">
							<input type="submit" value="Envoyer">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 w3ls_footer_grid_right">
				<a href="index.html"></a>
			</div>
			<div class="clearfix"> <img src="../images/logoBlanc.png" class="footerLogo"></div>
		</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2018 MIHOMAX | AEC 2017-2018 | By MI_chael / HO_vhannes / MAX_ime
				</p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
						<a href="genres.html">Movies</a>
					</li>
					<li>
						<a href="faq.html">FAQ</a>
					</li>
					<li>
						<a href="horreur.html">Action</a>
					</li>
					<li>
						<a href="genres.html">Adventure</a>
					</li>
					<li>
						<a href="comedie.html">Comedie</a>
					</li>
					<li>
						<a href="icons.html">Icons</a>
					</li>
					<li>
						<a href="contact.html">Contact Us</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</body>
</html>
