<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'C:\xampp\htdocs\projetweb\vendor/autoload.php';
require_once 'C:\xampp\htdocs\projetweb\vendor\phpmailer\phpmailer\src/Exception.php';
require_once 'C:\xampp\htdocs\projetweb\vendor\phpmailer\phpmailer\src/PHPMailer.php';
require_once 'C:\xampp\htdocs\projetweb\vendor\phpmailer\phpmailer\src/SMTP.php';

require_once 'C:\xampp\htdocs\projetweb\config.php';
include_once "../model/post.php";
include_once "../controller/postC.php";
include_once "../model/commentaire.php";
include_once "../controller/commentaireC.php";

// Retrieve post information from query parameters
$postId = isset($_GET['id']) ? $_GET['id'] : '';
$postTitle = isset($_GET['title']) ? $_GET['title'] : '';

$comment_text = isset($_POST['comment_text']) ? $_POST['comment_text'] : '';
$author = isset($_POST['author']) ? $_POST['author'] : '';

$created_at = date('Y-m-d H:i:s');

$commentaire = new Commentaire(null, $comment_text, $author, $created_at, $postId);
$commentaireC = new commentaireC();
$postC = new postC();
$tab = $postC->listepost();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentaireC->addcommentaire($commentaire);
	//$commentaireC->sendSMS();
    header('Location: allposts.php?comment_added=true');
    exit();
	 
}
 
?>
 
<html lang="en">
    
   
	<head>
		<meta charset="utf-8">
		<title>Melodi</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="HimanshuGupta">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="..\assets\frontoffice\HTML\css\bootstrap.min.css" rel="stylesheet">	  
		<!-- Animate CSS --> 
		<link href="..\assets\frontoffice\HTML\css/animate.min.css" rel="stylesheet">
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<!-- Font awesome CSS -->
		<link href="..\assets\frontoffice\HTML\css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="..\assets\frontoffice\HTML\css/style.css" rel="stylesheet">
		<link href="..\assets\frontoffice\HTML\css/style-color.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="..\assets\frontoffice\HTML\img\logo\favicon.ico"> 
	</head>
	
	<body  style="background-image: url('../assets/frontoffice/HTML/img/logo/marr.jpg'); background-size: cover; background-position: center;">
		<!-- wrapper -->
		<div class="wrapper" id="home">
		
			<!-- header area -->
			<header>
				<!-- secondary menu -->
				<nav class="secondary-menu">
					<div class="container">
						<!-- secondary menu left link area -->
						<div class="sm-left">
							<strong>Phone</strong>:&nbsp; <a href="#">555 555 555</a>&nbsp;&nbsp;&nbsp;&nbsp;
							<strong>E-mail</strong>:&nbsp; <a href="#">music.site@melodi.com</a>
						</div>
						<!-- secondary menu right link area -->
						<div class="sm-right">
							<!-- social link -->
							<div class="sm-social-link">
								<a class="h-facebook" href="#"><i class="fa fa-facebook"></i></a>
								<a class="h-twitter" href="#"><i class="fa fa-twitter"></i></a>
								<a class="h-google" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="h-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</nav>
				<!-- primary menu -->
				<nav class="navbar navbar-fixed-top navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- logo area -->
							 
						</div>
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#latestalbum">Latest Album</a></li>
								<li><a href="#featuredalbum">Featured Album</a></li>
								<li><a href="#joinus">Join Us</a></li>
								<li><a href="#portfolio">Portfolio</a></li>
								<li><a href="#events">Events</a></li>
								<li><a href="#team">Team</a></li>
								<li><a href="#contact">Comment</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>
			<!-- banner area -->
			<div class="banner">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="img/banner/b1.jpg" alt="...">
							<div class="container">
								<!-- banner caption -->
								<div class="carousel-caption slide-one">
									<!-- heading -->
									<h2 class="animated fadeInLeftBig"><i class="fa fa-music"></i> Melodi For You!</h2>
									<!-- paragraph -->
									<h3 class="animated fadeInRightBig">Find More Innovative &amp; Creative Music Albums.</h3>
									<!-- button -->
									<a href="#" class="animated fadeIn btn btn-theme">Download Here</a>
								</div>
							</div>
						</div>
						<div class="item">
							<img src="img/banner/b2.jpg" alt="...">
							<div class="container">
								<!-- banner caption -->
								<div class="carousel-caption slide-two">
									<!-- heading -->
									<h2 class="animated fadeInLeftBig"><i class="fa fa-headphones"></i> Listen It...</h2>
									<!-- paragraph -->
									<h3 class="animated fadeInRightBig">Lorem ipsum dolor sit amet, consectetur elit.</h3>
									<!-- button -->
									<a href="#" class="animated fadeIn btn btn-theme">Listen Now</a>
								</div>
							</div>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="fa fa-arrow-left" aria-hidden="true"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="fa fa-arrow-right" aria-hidden="true"></span>
					</a>
				</div>
			</div>
			<!--/ banner end -->
			
			<!-- block for animate navigation menu -->
			<div class="nav-animate"></div>
			 
			 
		 
			<!-- contact end -->
			
			<!-- footer -->
		 
			<!-- footer end -->
			
			<!-- Scroll to top -->
			<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
			
		</div>
		<!-- footer -->
		 
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="..\assets\frontoffice\HTML\js/jquery.js"></script>
		<!-- Bootstrap JS --> 
		<script src="..\assets\frontoffice\HTML\js/bootstrap.min.js"></script>
		<!-- WayPoints JS -->
		<script src="..\assets\frontoffice\HTML\js/waypoints.min.js"></script>
		<!-- Include js plugin -->
		<script src="..\assets\frontoffice\HTML\js/owl.carousel.min.js"></script>
		<!-- One Page Nav -->
		<script src="..\assets\frontoffice\HTML\js/jquery.nav.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="..\assets\frontoffice\HTML\js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="..\assets\frontoffice\HTML\js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="..\assets\frontoffice\HTML\js/custom.js"></script>

		<div class="contact pad" id="contact">
			<div class="container">
				<!-- default heading -->
				<div class="default-heading">
					<!-- heading -->
					<h2>comments</h2>
				</div>

<!-- hedhiii khedemtiii -->


 
 
  
<form action="" method="POST" enctype="multipart/form-data" class="comment-form">

            <table>
                <tr>
                    <td><label for="comment_text">comment_text:</label></td>
                    <td>
                        <input placeholder="comment_text" type="text" id="comment_text" name="comment_text" />
                        <span id="errorcomment_text" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="author">author:</label></td>
                    <td>
                        <input placeholder="author" type="text" id="author" name="author" />
                        <span id="errorauthor" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="post_title">post_title:</label></td>
                    <td>
                        <input type="text" id="post_title" name="post_title" value="<?= $postTitle; ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-lg btn-theme" value="Save">
                        <input type="reset" class="btn btn-lg btn-theme" value="Reset">
                    </td>
                </tr>
            </table>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var form = document.querySelector('form');
                form.addEventListener('submit', function (event) {
                    var comment_textInput = document.getElementById('comment_text');
                    if (comment_textInput.value.trim() === '') {
                        document.getElementById('errorcomment_text').innerText = 'comment_text is required';
                        event.preventDefault();
                    } else {
                        document.getElementById('errorcomment_text').innerText = '';
                    }

                    var authorInput = document.getElementById('author');
                    if (authorInput.value.trim() === '') {
                        document.getElementById('errorauthor').innerText = 'author is required';
                        event.preventDefault();
                    } else {
                        document.getElementById('errorauthor').innerText = '';
                    }
                });
            });
        </script>
    
</body>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        color: black;
    }

	form.comment-form {
        max-width: 600px;
        margin: 100px auto;
        background-color: rgba(255, 255, 255, 0);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
        margin-left: 600px; /* ou la valeur que vous préférez */
    }

    table {
        width: 100%;
    }

    table tr {
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: white;
        font-size: 16px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        color: black;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
        border-color: #3498db; /* Change la couleur de la bordure en cas de focus */
    }

    span.error {
        color: red;
    }

    input[type="submit"],
    input[type="reset"] {
        background-color: beige;
        color: black;
        padding: 12px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-right: 10px;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
         
        color: white;
    }

    .navbar-brand img {
        max-width: 60px; /* Définissez la largeur maximale souhaitée */
        height: auto; /* Assurez-vous que la hauteur s'ajuste automatiquement pour conserver les proportions */
    }

	.default-heading {
    text-align: center; /* Alignez le texte au centre */
    margin: 0px auto; /* Ajustez les marges pour positionner verticalement et horizontalement */
}

     
.btn-theme {
    background-color: beige; /* Changez la couleur du bouton */
    color: black; /* Changez la couleur du texte du bouton */
    margin-left: 20px; /* Ajustez la marge à gauche pour déplacer le bouton vers la gauche */
}
.default-heading h2 {
    color: white; /* Changez la couleur du texte en blanc */
	margin-left: 630px;
}

</style>


</html>
 

 