<?php
include_once("html/fonctions_panier.inc.php");
session_start();
if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mihomax</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mihomax" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
//Hi everybody
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
    <link href="css/single.css" rel='stylesheet' type='text/css' />
    <link href="css/medile.css" rel='stylesheet' type='text/css' />
    <!-- banner-slider -->
    <link href="css/jquery.slidey.min.css" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/owl.carousel.js"></script>
    <script src="js/checkform.js"></script>
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
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
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
<nav class="navbar">

    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">MIHOMAX</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
		<?php 
			if( isset($_SESSION["username"]) ){
				echo "<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>Salut, ".$_SESSION['username']."</a></li>";
				echo "<li><a href=\"index.php?logout='1'\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></li>";
				echo "<li><a href=\"html/panier.php\" onclick=\"window.open(this.href, '', 'toolbar=no, location=no, directories=no,	status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=600'); return false;\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Panier<span class=\"badge\">".compterArticles()."</span></a></li>";
				
			}
			else{
				echo "<li><a href=\"connection/register.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>\n";
				echo "<li><a href=\"connection/login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
				
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
                <a href="index.php">
                    <img src="images/logo.png"></a>
            </div>
            <div class="w3_search">
                <form action="html/catalog.php" method="get">
                    <input type="text" name="nom" placeholder="Recherche">
                    <input type="submit" value="Aller">
                </form>
            </div>
            <div class="w3l_sign_in_register">
                <ul>
                    <li><i class="" aria-hidden="true"></i>
                        <li><a href="connection/login.php">Se connecter</a></li>
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
                            <li class="active"><a href="index.php">Accueil</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="html/catalog.php?genre=Action">Action</a></li>
                                                <li><a href="html/catalog.php?genre=Biographie">Biographie</a></li>
                                                <li><a href="html/catalog.php?genre=Crime">Crime</a></li>
                                                <li><a href="html/catalog.php?genre=Famille">Famille</a></li>
                                                <li><a href="html/catalog.php?genre=Horreur">Horreur</a></li>
                                                <li><a href="html/catalog.php?genre=Romance">Romance</a></li>
                                                <li><a href="html/catalog.php?genre=Sports">Sports</a></li>
                                                <li><a href="html/catalog.php?genre=Guerre">Guerre</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="html/catalog.php?genre=Adventure">Adventure</a></li>
                                                <li><a href="html/catalog.php?genre=Comédie">Comédie</a></li>
                                                <li><a href="html/catalog.php?genre=Documentaire">Documentaire</a></li>
                                                <li><a href="html/catalog.php?genre=Fantaisie">Fantaisie</a></li>
                                                <li><a href="html/catalog.php?genre=Thriller">Thriller</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="html/catalog.php?genre=Animation">Animation</a></li>
                                                <li><a href="html/catalog.php?genre=Costume">Costume</a></li>
                                                <li><a href="html/catalog.php?genre=Drame">Drame</a></li>
                                                <li><a href="html/catalog.php?genre=Histoire">Histoire</a></li>
                                                <li><a href="html/catalog.php?genre=Musicale">Musicale</a></li>
                                                <li><a href="html/catalog.php?genre=Psychologique">Psychologique</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="html/catalog.php?genre=séries">tv - séries</a></li>
                            <li><a href="html/catalog.php">nouveautés</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pays <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="html/catalog.php?pays=Asie">Asie</a></li>
                                                <li><a href="html/catalog.php?pays=France">France</a></li>
                                                <li><a href="html/catalog.php?pays=Taiwan">Taiwan</a></li>
                                                <li><a href="html/catalog.php?pays=Amérique">Amérique</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="html/catalog.php?pays=Chine">Chine</a></li>
                                                <li><a href="html/catalog.php?pays=Hong-Kong">Hong-Kong</a></li>
                                                <li><a href="html/catalog.php?pays=Japon">Japon</a></li>
                                                <li><a href="html/catalog.php?pays=Thailand">Thailand</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="html/catalog.php?pays=Europe">Europe</a></li>
                                                <li><a href="html/catalog.php?pays=Inde">Inde</a></li>
                                                <li><a href="html/catalog.php?pays=Corée">Corée</a></li>
                                                <li><a href="html/catalog.php?pays=Royaume-Uni">Royaume-Uni</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="html/catalog.php">Top ventes</a></li>
                            <li><a href="html/catalog.php">A - z list</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    <!-- //nav -->
    <!-- banner -->
    <div id="slidey" style="display:none;">
        <ul>
            <li><img src="images/5.jpg" alt=" ">
                <p class='title'>La ligue des justiciers</p>
                <p class='description'> Depuis la mort de Superman, rien ne va plus. Des entités maléfiques dérangent les habitants. Elles sont alimentées par Steppenwolf... </p>
            </li>
            <li><img src="images/2.jpg" alt=" ">
                <p class='title'>Star Wars - Épisode 8</p>
                <p class='description'>Il y a bien longtemps, dans une galaxie lointaine, très lointaine... Le Premier Ordre étend ses tentacules aux confins de l'univers ...</p>
            </li>
            <li><img src="images/3.jpg" alt=" ">
                <p class='title'>Les Gardiens de la Galaxie 2</p>
                <p class='description'>Les Gardiens de la galaxie 2 poursuit les aventures de l' équipe alors qu'elle traverse les confins du cosmos.</p>
            </li>
            <li><img src="images/4.jpg" alt=" ">
                <p class='title'>Jumanji</p>
                <p class='description'>Le destin de quatre lycéens en retenue bascule lorsqu'ils sont aspirés dans le monde de Jumanji. Après avoir découvert...</p>
            </li>
            <li><img src="images/6.jpg" alt=" ">
                <p class='title'>Coco</p>
                <p class='description'>Depuis déjà plusieurs générations, la musique est bannie dans la famille de Miguel. Un vrai déchirement pour le jeune garçon.</p>
            </li>
            <li><img src="images/7.jpg" alt=" ">
                <p class='title'>Le throne de fer</p>
                <p class='description'>Daenerys Targaryen, secondée par sa gigantesque armée constituée de Dothrakis, de Puînés et d'Immaculés ainsi que de la flotte Fer-nés des Greyjoy, a enfin accosté à Westeros...</p>
            </li>
        </ul>
    </div>
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
    <script type="text/javascript">
        $("#slidey").slidey({
            interval: 8000,
            listCount: 5,
            autoplay: false,
            showList: true
        });
        $(".slidey-list-description").dotdotdot();

    </script>
    <!-- //banner -->
    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="w3_agile_banner_bottom_grid">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    
                    <?php
						require_once("BD/connexion.inc.php");
		
						$requete="SELECT idf, titre, prix, pochette, rating FROM films ORDER BY rating DESC LIMIT 9";
					
						$stmt = $connexion->prepare($requete);
						$stmt->execute();
						$result = $stmt->get_result();
						while($ligne = $result->fetch_object()){

							echo "					<div class=\"item\">\n";
							echo "                        <div class=\"w3l-movie-gride-agile w3l-movie-gride-agile1\">\n";
							echo "                            <a href=\"html/single.php?id=".$ligne->idf."\" class=\"hvr-shutter-out-horizontal\"><img src=\"pochettes/".($ligne->pochette)."\" title=\"album-name\" class=\"img-responsive\" alt=\" \" />\n";
							echo "								<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>\n";
							echo "							</a>\n";
							echo "                            <div class=\"mid-1 agileits_w3layouts_mid_1_home\">\n";
							echo "                                <div class=\"w3l-movie-text\">\n";
							echo "                                    <h6><a href=\"html/single.php?id=".$ligne->idf."\">".($ligne->titre)."</a></h6>\n";	
							echo "                                </div>\n";
							echo "									<div class=\"w3l-movie-text\">\n";
							$requeteGenre="SELECT genres.nom FROM genres, films_genres, films where films.idf=".$ligne->idf." AND films_genres.idf=films.idf AND genres.idgen=films_genres.idgen";
							$stmt1 = $connexion->prepare($requeteGenre);
							$stmt1->execute();
							$result1 = $stmt1->get_result();
							$allGenres=$result1->fetch_object()->nom;
							while ($ligne1 = $result1->fetch_object()){
								$allGenres.=", ".$ligne1->nom;
							}
							
							
							
							echo "									<p>$allGenres</p>";
							echo "                                </div>\n";
							echo "                                <div class=\"mid-2 agile_mid_2_home\">\n";
							echo "                                    <p>".($ligne->prix)." $</p>\n";
							echo "                                    <div class=\"block-stars\">\n";
							echo "                                        <ul class=\"w3l-ratings\">\n";
																			for ($i=0; $i<intval($ligne->rating); $i++){
							echo "                                            <li><a href=\"#\"><i class=\"fa fa-star\" aria-hidden=\"true\"></i></a></li>\n";
																			}
																			for ($j=0; $j<(5-intval($ligne->rating));$j++){
							echo "                                            <li><a href=\"#\"><i class=\"fa fa-star-o\" aria-hidden=\"true\"></i></a></li>\n";
																			}
							echo "                                        </ul>\n";
							echo "                                    </div>\n";
							echo "                                    <div class=\"clearfix\"></div>\n";
							if( isset($_SESSION["username"]) ){
								echo "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"html/panier.php?action=ajout&amp;i=".$ligne->idf."&amp; u=".($ligne->pochette)."&amp;l=".($ligne->titre)."&amp;q=1&amp;p=".($ligne->prix)."\" onclick=\"window.open(this.href, '', 'toolbar=no, location=no, directories=no,	status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=600'); return false;\">Au panier</a>";
							}			else{
								echo "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"connection/login.php\">Au panier</a>";
							}	
							echo "                                </div>\n";
							echo "                            </div>\n";
							echo "                            <div class=\"ribben\">\n";
							echo "                                <p>NEW</p>\n";
							echo "                            </div>\n";
							echo "                        </div>\n";
							echo "                    </div>";

						}
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- //banner-bottom -->
    <div class="general_social_icons">
        <nav class="social">
            <ul>
                <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
                <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
                <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
                <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
            </ul>
        </nav>
    </div>
    
   
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="w3ls_footer_grid">
                <div class="col-md-6 w3ls_footer_grid_left">
                    <div class="w3ls_footer_grid_left1">
                        <h2>Abonnez-vous</h2>
                        <div class="w3ls_footer_grid_left1_pos">
                            <form action="#" method="post">
                                <input type="email" name="email" placeholder="Your email..." required="">
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 w3ls_footer_grid_right">
                    <a href="index.html"></a>
                </div>
                <div class="clearfix"> <img src="images/logoBlanc.png" class="footerLogo"></div>
            </div>
            <div class="col-md-5 w3ls_footer_grid1_left">
                <p>&copy; 2018 MIHOMAX | AEC 2017-2018 | By MI_chael / HO_vhannes / MAX_ime</a>
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
    <!-- //footer -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });

    </script>
    <!-- //Bootstrap Core JavaScript -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

    </script>
    <!-- //here ends scrolling icon -->
</body>

</html>
