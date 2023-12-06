<?php
// Include PHPMailer and other necessary files
 
 

// Include config.php first
require_once 'C:\xampp\htdocs\projetweb\config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'C:\xampp\htdocs\projetweb\vendor/autoload.php';
require_once 'C:\xampp\htdocs\projetweb\vendor\phpmailer\phpmailer\src/Exception.php';
require_once 'C:\xampp\htdocs\projetweb\vendor\phpmailer\phpmailer\src/PHPMailer.php';
require_once 'C:\xampp\htdocs\projetweb\vendor\phpmailer\phpmailer\src/SMTP.php';

include_once "../model/post.php";
include_once "../controller/postC.php";

include_once "../model/commentaire.php";
include_once "../controller/commentaireC.php";
 

$c = new commentaireC();
$tab = $c->listecommentaire();
$postC = new postC();
$error = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";

    $title = $_POST['title'];
    $content = $_POST['content'];

    // Check if all required fields are filled
    if (!empty($title) && !empty($content) && isset($_FILES['image'])) {
        $image = $_FILES['image'];

        // Check if the file is an image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($image['type'], $allowedTypes)) {
            // Generate a unique filename for the uploaded file
            $filename = uniqid() . "_" . $image['name'];
            $uploadPath = $uploadDir . $filename;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
                // Create a new Post object with the uploaded image path
                $post = new Post(
                    $content,
                    date('Y-m-d H:i:s'),
                    $title,
                    $uploadPath,
                    1
                );

                $postC->addPost($post);
				$mail = new PHPMailer(true);

                try {
                    // Your email configuration code
                    // ...
					$mail->isSMTP();
					$mail->Host = "your-smtp-server.com";
					$mail->SMTPAuth = true;
					$mail->Username = "your-smtp-username";
					$mail->Password = "your-smtp-password";
					$mail->SMTPSecure = "tls"; // Use "tls" or "ssl" depending on your email provider
					$mail->Port = 587; // Check the port required by your email provider
					

                    $mail->send();
                } catch (Exception $e) {
                    echo "Email could not be sent. Error: {$e->getMessage()}";
                }

                //$postC->sendSMS();
                // Redirect to listepost.php after adding the post
                //header('Location: listepost.php');
                //exit();
            } else {
                $error = "Failed to upload image.";
            }
        } else {
            $error = "Invalid image format. Please upload a JPEG, PNG, or GIF file.";
        }
    } else {
        $error = "Missing information. Please fill in all required fields.";
    }
}
  $comment_id = isset($_POST['commentaire']) ? $_POST['commentaire'] : '';
$postC->getpostBycommentaire($comment_id);
 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

 
<html lang="en">
    
   <!DOCTYPE html>
<html>
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
	
	<body>
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
							<a class="navbar-brand" href="#home">
								<!-- logo image -->
								 <img class="img-responsive" src=" frontoffice/HTML/img/logo/logo.png" alt="" width="100" height="auto" />
  
							</a>
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
					<h2>posts</h2>
				</div>

<!-- hedhiii khedemtiii -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ajoutez tout balisage méta et les feuilles de style nécessaires -->
</head>

<body>
    <hr> 
	<a class="view-all-posts" href="allposts.php">View All Posts</a>



    <center>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td>
                        <input type="text" id="title" name="title" />
                        <span id="errortitle" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="content">Content:</label></td>
                    <td>
                        <input type="text" id="content" name="content" />
                        <span id="errorcontent" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">Image:</label></td>
                    <td>
                        <input type="file" id="image" name="image" accept="image/*" />
                        <span id="errorimage" style="color: red"></span>
                    </td>
                </tr>
                <tr>
    <td><label for="commentaire">commentaire:</label></td>
    <td>
        <select name="commentaire" id="commentaire">
            <?php
            foreach ($tab as $commentaire) {
                $comment_id = isset($commentaire['comment_id']) ? $commentaire['comment_id'] : '';
                $author = isset($commentaire['author']) ? $commentaire['author'] : '';
                echo '<option value="' . $comment_id . '">' . $author . '</option>';
            }
            ?>
        </select>
    </td>
</tr>
                <tr>
                    <br>
                    <td colspan="2">
                        <input type="submit" class="btn btn-lg btn-theme" value="Save">
                        <input type="reset" class="btn btn-lg btn-theme" value="Reset">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // Traitement du formulaire lorsqu'il est soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ajoutez la logique de traitement ici, par exemple, pour valider et enregistrer les données
            // Utilisez $_POST['title'], $_POST['content'], $_FILES['image'] pour accéder aux données du formulaire

            // Notez également l'utilisation de l'attribut "enctype" pour traiter les fichiers dans le formulaire
        }
        ?>
    </center>
	<script>
document.addEventListener("DOMContentLoaded", function () {
    // Form reference
    var form = document.querySelector('form');

    // Add event listener to form submit
    form.addEventListener('submit', function (event) {
        // Validate title
        var titleInput = document.getElementById('title');
        if (titleInput.value.trim() === '') {
            document.getElementById('errortitle').innerText = 'Title is required';
            event.preventDefault();
        } else {
            document.getElementById('errortitle').innerText = '';
        }

        // Validate content
        var contentInput = document.getElementById('content');
        if (contentInput.value.trim() === '') {
            document.getElementById('errorcontent').innerText = 'Content is required';
            event.preventDefault();
        } else {
            document.getElementById('errorcontent').innerText = '';
        }

        // Validate image
        var imageInput = document.getElementById('image');
        if (imageInput.files.length === 0) {
            document.getElementById('errorimage').innerText = 'Image is required';
            event.preventDefault();
        } else {
            document.getElementById('errorimage').innerText = '';
        }
    });
});
</script>
</body>

</html>

<style>
body {
    background-color: #f4f4f4;
    color: #333;
    font-family: Arial, sans-serif;
}

.comment-form {
    width: 60%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

textarea,
input[type="text"],
input[type="datetime-local"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 4px;
}
body {
    background-color: #f4f4f4;
    color: #333;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.wrapper {
    position: relative;
    overflow: hidden;
}

/* Header Styles */
header {
    background-color: #333;
    color: #fff;
    padding: 15px 0;
}

.secondary-menu {
    background-color: #444;
    padding: 5px 0;
}

.sm-left,
.sm-right {
    float: left;
    width: 50%;
}

.sm-right {
    text-align: right;
}

.sm-social-link a {
    color: #fff;
    margin-right: 10px;
}

.navbar {
    margin-bottom: 0;
    background-color: #333;
    border: none;
    border-radius: 0;
}

.navbar-brand img {
    max-height: 50px;
}

.navbar-nav > li > a {
    color: #fff;
}

/* Form Styles */
.contact.pad {
    padding: 50px 0;
    background-color: #fff;
}

.default-heading h2 {
    color: #333;
    font-size: 36px;
    margin-bottom: 30px;
}

form {
    width: 60%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input,
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 4px;
}

input[type="submit"],
input[type="reset"] {
    background-color: #e8491d;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
    background-color: #333;
}
/* Styles for "View All Posts" link */
a.view-all-posts {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #e8491d;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

a.view-all-posts:hover {
    background-color: #333;
}

</style>

</html>