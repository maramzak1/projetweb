<?php
include "../../controller/FolkloreC.php";

if (isset($_GET['id_region'])) {
    $id_region = $_GET['id_region'];

    $folkloreC = new FolkloreC();
    $folkloreDetails = $folkloreC->getFolkloresByRegion($id_region);}


?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tounizika</title>
    <!-- Description, Keywords, Author, Viewport, and other meta tags... -->

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="../../Assets/frontoffice/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="../../Assets/frontoffice/css/animate.min.css" rel="stylesheet">
    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="../Assets/frontoffice/css/owl.carousel.css">
    <!-- Font awesome CSS -->
    <link href="../../Assets/frontoffice/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../Assets/frontoffice/css/style.css" rel="stylesheet">
    <link href="../../Assets/frontoffice/css/style-color.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../Assets/frontoffice/img/logo/logo.png">

    <!-- Style for the background image -->

	<style>
      .item {
   background-size: cover;
   background-position: center;
   height:900px; /* Ajustez la hauteur selon vos besoins */
   width: 1700px; 
}



   </style>


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
								<label for="exampleInputContact">Contact</label>
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
								<img class="img-responsive" src="../../Assets/frontoffice/img/logo/logo.png" alt="" />
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">

								<li><a href="#Region.php">Regions</a></li>
								<li><a href="#joinus">A propos</a></li>
								<li><a href="#portfolio">Contact</a></li>
								<li><a href="#events">Aide</a></li>
								<li><a href="#team">Sign in</a></li>
								<li><a href="#contact">Login</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>






			<!-- L AFFICHAAAAGE -->
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
		<?php foreach ($folkloreDetails as $folklore) { ?>
            <div class="item active" style="background-image: url('../../Assets/frontoffice/img/banner/<?php echo $folklore['banner']; ?>');">
                <div class="container">

                        <!-- banner caption -->
                        <div class="carousel-caption slide-one">
                            <!-- heading -->
                            <h2 class="animated fadeInLeftBig"><i class="fa fa-music"></i> <?php echo $folklore['nom']; ?></h2>
                            <!-- paragraph -->
                            <h3 class="animated fadeInRightBig"><?php echo $folklore['histoire']; ?></h3>
                            <!-- video -->
                            <video controls autoplay loop style="width: 50%; height: auto; position: absolute; top: 30%; right: 0%; transform: translate(-0%, -0%);">
                                <source src="../../Assets/frontoffice/img/video/<?php echo $folklore['chanson']; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                        </div>

                </div>
            </div>
			<?php } ?>
        </div>


    </div>
</div>
<!--/ banner end -->

<!-- block for animate navigation menu -->
<div class="nav-animate"></div>

<script src="js/jquery.js"></script>
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
</body>
</html>
