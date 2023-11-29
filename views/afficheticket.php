<?php
//list
include "../controller/ticketC.php";

$c = new ticketC();
$tab = $c->listticket();

?> 

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
		<title>Tounizika</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="HimanshuGupta">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
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
		
		<!-- Favicon -->
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
					<!-- form for events ticket booking -->
					<form>
                    
                    <?php foreach ($tab as $ticket) { ?>
                        
                        <tr>
                        
                        
                          <td><p>id tickets</p><span class="badge bg-label-primary me-1"><?= $ticket['id_ticket']; ?></span></td>
                          <td><p>date concerts</p>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $ticket['date']; ?></span>
                          </td>

                          <td><p>prix tickets</p>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $ticket['prix']; ?></span>
                          </td>

                          <td><p>date limite du tickets</p>
                          
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $ticket['date_limite']; ?></span>
                          </td>

                          <td><p>quantite des tickets</p>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $ticket['quantite']; ?></span>
                          </td>

                          <td><p>heure du concert</p>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $ticket['heure']; ?></span>
                          </td>

                          <td><p>lieu du concert</p>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $ticket['lieu']; ?></span>
                          </td>
                          <td>
                    </td>
                          <td>
                            <a href="deleteticket.php?id=<?= $ticket['id_ticket']; ?>">
                            Delete</a>
                            <form method="POST" action="updateticket.php">
                                <input type="submit" name="update" value="Update">
                                <input type="hidden" value="<?= $ticket['id_ticket']; ?>" name="id_ticket">
                            </form>
                            </td>
                        <div class="figure">
                            <button href="#bookTicket" class="btn btn-lg btn-theme" data-toggle="modal">Book Ticket</button>
                        </div>
                    </div>
                        

                       
                          
                          
                        </tr>
                        <?php } ?>
                      
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
				
			</header>
            
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

</body>	
</html>


