<?php

include "../controller/concertC.php";

$ctC = new concertC;
$ct = $ctC->listconcert();
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
		<title>Tounizika</title>
		
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="HimanshuGupta">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="../assets/frontoffice/css/bootstrap.min.css" rel="stylesheet">	
		<!-- Animate CSS -->
		<link href="../assets/frontoffice/css/animate.min.css" rel="stylesheet">
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="../assets/frontoffice/css/owl.carousel.css">
		<!-- Font awesome CSS -->
		<link href="../assets/frontoffice/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="../assets/frontoffice/css/style.css" rel="stylesheet">
		<link href="../assets/frontoffice/css/style-color.css" rel="stylesheet">
		
		<!-- logo -->
		 <link rel="shortcut icon" href="../assets/frontoffice/img/logo/favicon.png">
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
					<!-- form for concerts ticket booking -->
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
						
						<div class="sm-left">
							<strong>Phone</strong>:&nbsp; <a href="#">555 555 555</a>&nbsp;&nbsp;&nbsp;&nbsp;
							<strong>E-mail</strong>:&nbsp; <a href="#">music.site@melodi.com</a>
						</div>
						
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
								<img class="img-responsive" src="img/logo/logo.png" alt="" />
							</a>
						</div>

						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								
								<li><a href="#CONCERTS">CONCERTS</a></li>
								
							</ul>
						</div>
					</div>
				</nav>
			</header>
            <div class="concerts parallax-three pad" id="concerts">
                <div class="container">
                    <div class="default-heading-shadow">
                        <h2>Coming concerts</h2>
                        <!-- concert element -->
                        <style>
							.concerts-item  {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .lieu {
    color: grey;
    font-size: 22px;
  }

  .concerts button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .concerts button:hover {
    opacity: 0.7;
  }

    .concert-cell {
        padding-right: 10px; /* Ajustez la valeur selon vos besoins */
    }

    .concert-cell {
        padding-right: 50px; 
    }
</style>

<div class="concerts-element">
    <div class="row">
        <table>
            <?php $counter = 0; ?>
            <?php foreach ($ct as $concert) { ?>
                <?php if ($counter % 3 == 0) { ?>
                    <!-- Nouvelle ligne pour chaque troisième concert -->
                    <tr>
                <?php } ?>
                
                <td class="concert-cell">
                    <div class="concerts-item">
                        <!-- concert date -->
                        <div class="figure">
                            <div class="concert-date">
                                <strong style="color:white; font-size: 30px;"><?php echo $concert['date']; ?></strong>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <!-- concert location -->
                        <div class="figure">
                            <span class="concert-location">
                                <i class="fa fa-map-marker" style="font-size: 30px; color: red;">
                                    <strong style="color:black; font-size: 30px;"><?php echo $concert['lieu']; ?>
                                    </strong>
                                </i>
                            </span>
                        </div>

                        <!-- image -->
                        <div class="figure">
                            <img class="img-responsive" src="../assets/frontoffice/img/event/<?php echo $concert['image']; ?>" alt="" />
                            <!-- image hover -->
                            <div class="img-hover">
                                <!-- hover icon -->
                                <a href="#"><i class="fa fa-play-circle"></i></a>
                            </div>
                        </div>

                        <!-- concert information -->
                        <div class="figure">
                            <div class="concert-info">
                                <strong style="color:black; font-size: 30px;"><?php echo $concert['etat']; ?></strong>
                            </div>
                        </div>

                        <!-- concert title -->
                        <div class="figure">
                            <button href="#bookTicket" class="btn btn-lg btn-theme" data-toggle="modal">Book Ticket</button>
                        </div>
                    </div>
                </td>

                <?php $counter++; ?>

                <?php if ($counter % 3 == 0) { ?>
                    <!-- Fermer la ligne après chaque troisième concert -->
                    </tr>
                <?php } ?>
            <?php } ?>
            
            <?php
            // Si le nombre total de concerts n'est pas un multiple de 3, fermer la dernière ligne
            if ($counter % 3 != 0) {
                echo '</tr>';
            }
            ?>
            
        </table>
    </div>
</div>
<!-- footer -->
<footer>
    <div class="container">
        <!-- social media links -->
        <div class="social">
            <a class="h-facebook" href="#"><i class="fa fa-facebook"></i></a>
            <a class="h-google" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="h-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
            <a class="h-twitter" href="#"><i class="fa fa-twitter"></i></a>
        </div>
        <!-- copy right -->
        <p class="copy-right">&copy; copyright 2018, All rights are reserved.</p>
    </div>
</footer>
<!-- footer end -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/custom.js"></script>
</body>	
</html>


