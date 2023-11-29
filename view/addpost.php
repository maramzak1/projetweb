<?php
include_once "../model/post.php";
include_once "../controller/postC.php";

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
$listepost = $postC->getPostList();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html lang="en">
    
  


<!--code templateeee -->


<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="../assets/HTML/css/bootstrap.min.css" rel="stylesheet">	  
		<!-- Animate CSS -->
		<link href="css/animate.min.css" rel="stylesheet">    
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<!-- Font awesome CSS -->  
		<link href="css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-color.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href=" ../assets/HTML/img/logo/favicon.ico ">
	</head>
	
	<body>
		
		<!-- modal for booking ticket form -->
		<div class="modal fade" id="bookTicket" tabindex="-1" role="dialog" aria-labelledby="BookTicket">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Name of The Event &nbsp; <small><span class="label label-success">Available</span> &nbsp; <span class="label label-danger">Not Available</span></small></h4>
					</div>
					<!-- form for events ticket booking -->
					<form>
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="example@mail.com">
							</div>
							<div class="form-group">
								<label for="exampleInputContact">Comment</label>
								<input type="text" class="form-control" id="exampleInputContact" placeholder="+91 55 5555 5555">
							</div>
							<div class="form-group">
								<label for="exampleInputSeats">Number of Tickets</label>
								<select class="form-control" id="exampleInputSeats">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox"> I accept the Terms of Service
								</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<!-- link to payment gatway here -->
							<button type="button" class="btn btn-primary">Book Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
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
								<img class="img-responsive" src="../assets/HTML/img/logo/logo.png" alt="" />   
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
			<!--/ header end -->
			
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
			<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
			
		</div>
		<!-- footer -->
		 
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- WayPoints JS -->
		<script src="js/waypoints.min.js"></script>
		<!-- Include js plugin -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- One Page Nav -->
		<script src="js/jquery.nav.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
		<div class="about" id="team">
			<div class="container">
				<!-- default heading -->
				<div class="default-heading">
					<!-- heading --> 
					<h2>Posts</h2>
				</div>
				<!-- about what we are like content -->
				<div class="about-what-we">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="what-we-item ">
								<!-- heading with icon -->
								<h3><i class="fa fa-heartbeat"></i> What we do?</h3>
								<!-- paragraph -->
		<!--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit occaecat cupidatat non id est laborum.</p>-->
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="what-we-item ">
								<!-- heading with icon -->
								<h3><i class="fa fa-hand-o-up"></i> Why choose us?</h3>
								<!-- paragraph -->
								<!--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit occaecat cupidatat non id est laborum.</p>-->
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="what-we-item ">
								<!-- heading with icon -->
								<h3><i class="fa fa-map-marker"></i> Where we are?</h3>
								<!-- paragraph -->
<!--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit occaecat cupidatat non id est laborum.</p>-->
							</div>
						</div>
					</div>
				</div>
			</div>


<!-- hedhiii khedemtiii -->



<head>
    <!-- Add any necessary meta tags and stylesheets -->
</head>
<body>
   <!-- <center>
        <button><a href="listepost.php">Back to list</a></button>
    </center>-->
    <hr>
    <center>
        <form action="" method="POST" id="myForm" enctype="multipart/form-data">
            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <?php foreach ($listepost as $post) { ?>
                    <div style="border: 1px solid #ccc; padding: 10px; width: 200px; margin-right: 20px;">
                        <img src="<?= $post['image']; ?>" alt="Description de l'image" style="width: 100%; height: auto; border: 1px solid #ccc;">
                        <p style="margin: 10px 0; font-weight: bold;"><?= $post['title']; ?></p>
                        <p><?= $post['date']; ?></p>
                    </div>
                <?php } ?>
            </div>
                </center>
<center>
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
                    <br>
                    <td colspan="2">
                        <input type="submit" class="btn btn-lg btn-theme" value="Save">
                        <input type="reset" class="btn btn-lg btn-theme" value="Reset">
                    </td>
                </tr>
            </table>

        <?php
        // Display error message if there is any
        if (!empty($error)) {
            echo '<div style="color:red;text-align:center;">' . $error . '</div>';
        }
        ?>
    </form>
    </center>
</body>

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
 
</style>
</html>
