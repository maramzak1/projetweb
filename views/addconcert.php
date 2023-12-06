<?php
include '../controller/concertC.php';
include '../model/concert.php';
$error = "";
$Concert = null;
$ConcertC = new concertC();
if (
    isset($_POST["date"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["etat"])&&
    isset($_POST["image"])
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["etat"])&&
        !empty($_POST["image"])
    ) {
        $Concert = new concert(
            null,
            $_POST['date'],
            $_POST['lieu'],
            $_POST['etat'],
            $_POST['image']
        );
        $ConcertC->addconcert($Concert);
        header('Location:index.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
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
								<img class="img-responsive" src="img/logo/logo.png" alt="" />
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								
								<li><a href="#CONCERTS">CONCERTS</a></li>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
					

				</nav>
			</header>
            <div class="concerts parallax-three pad" id="concerts">
                <div class="container">
                    <div class="default-heading-shadow">
                        <h2>Coming concerts</h2>
<body>
   
        <div class="row">
           
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0" style="color:black; font-size: 40px;"> Ajouter concert</h5>
                           
                        </div>
                        <div class="card-body">
        
                            <form class="form-horizontal" action="" method="POST">
                                <!-- date concerts -->
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" style="color:black; font-size: 20px;" for="date">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control"  style="color:black; font-size: 20px;"id="basic-default-name-date" name="date" placeholder="Date du concert" />
                                </div>
                                </div>
        
                                <!-- lieu concert  -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" style="color:black; font-size: 20px;" for="lieu">lieu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" style="color:black; font-size: 20px;" id="basic-default-name" name="lieu" placeholder="lieu du concerts" />
                                    </div>
                                </div>
                                 <!-- etat concert  -->
                                 <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" style="color:black; font-size: 20px;" for="etat">État</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="basic-default-name" name="etat">
                                            <option value="en cours">En Cours</option>
                                            <option value="annule">Annulé</option>
                                            <option value="complet">Complet</option>
                                        </select>
                                    </div>
        
                                <!-- concert Image -->
                                        <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" style="color:black; font-size: 20px;" for="image">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image" id="basic-default-pic" accept="image/*" />
                                        </div>
                                         </div>
        
                                <!-- Submit Button -->
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
            
       
</body>	
</html>


