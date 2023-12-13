<?php
include_once "../../Controller/postC.php";
include_once "../../Controller/commentaireC.php";

$postC = new postC();
$commentaireC = new commentaireC();

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $posts = $postC->recherchePostParTitre($searchTerm);
} else {
    $posts = $postC->getAllPosts();
}

$totalPosts = $postC->getTotalPosts();
?>

			


<!DOCTYPE html>
<html>
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
		<link rel="shortcut icon" href="../../Assets/frontoffice/img/logo/favicon.ico">
		


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="add.js"></script>


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
							<strong>E-mail</strong>:&nbsp; <a href="#">Tounizika@gmail.tn</a>
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
						<!-- Ajoutez ceci où vous voulez dans votre code -->
						<!-- Ajoutez ceci où vous voulez dans votre code 
<div id="sortRegions-container" class="sort-dropdown pull-right">
    <select id="sortRegions">
        <option value="asc">Tri alphabétique croissant</option>
        <option value="desc">Tri alphabétique décroissant</option>
    </select>
</div>-->





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
								<img class="img-responsive" src="../../Assets/frontoffice/img/logo/ok.png" alt="" />
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							

								<li><a href="#Region.php">Regions</a></li>
								<li><a href="#joinus">A propos</a></li>
								<li><a href="#portfolio">Contact</a></li>
								<li><a href="profiluser.php">Compte</a></li>
								<li><a href="addUtilisateur.php">Créer Compte</a></li>

								<li><a href="auth-login-basic.php">Se Connecter</a></li>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				
   

			</header>









<body>
	
	
			<!--/ header end -->
			
			<!-- banner area -->
			<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../../Assets/frontoffice/img/banner/2.jpg" alt="...">
                <div class="container">
                    <!-- Contenu de la bannière ici -->

                    <!-- Search form -->
                    <form action="allposts.php" method="GET">
                        <input type="text" name="search" placeholder="Search by Title">
                        <button type="submit">Search</button>
                    </form>

                    <!-- Total posts count -->
                    <div class="total-posts">Total Posts: <?= $totalPosts; ?></div>


                    <div class="featured-element">
                        <?php foreach ($posts as $post) : ?>
                            <div class="post <?= isset($_GET['search']) ? 'search-result' : ''; ?>" onclick="toggleComments(this)">
                                <h3><?= $post['title']; ?></h3>
                                <p><?= $post['content']; ?></p>
                                <img src="<?= $post['image']; ?>" alt="Post Image" class="<?= isset($_GET['search']) ? 'search-image' : ''; ?>" width="300">
                                <p>Posted on <?= $post['date']; ?></p>
                                <!-- Comment button -->
                                <button type="button" onclick="redirectToCommentPage(<?= $post['id']; ?>, '<?= $post['title']; ?>')">Comment</button>
                                <!-- Comments container -->
                                <div class="comments-container" id="comments_<?= $post['id']; ?>">
                                    <?php
                                    $comments = $commentaireC->getcommentaireBypost($post['id']);
                                    if (!empty($comments)) {
                                        echo '<div class="comments-section">';
                                        foreach ($comments as $comment) :
                                    ?>
                                            <div class="comment">
                                                <p><?= $comment['comment_text']; ?></p>
                                                <p>Commented by <?= $comment['author']; ?> on <?= $comment['created_at']; ?></p>
                                            </div>
                                    <?php
                                        endforeach;
                                        echo '</div>';
                                    } else {
                                        echo '<p>No comments yet.</p>';
                                    }
                                    ?>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>

                    <script>
                        function toggleComments(postElement) {
                            var commentsContainer = postElement.querySelector('.comments-container');
                            commentsContainer.style.display = (commentsContainer.style.display === 'none' || commentsContainer.style.display === '') ? 'block' : 'none';
                        }
                    </script>
					
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ banner end -->
<style>
    /* Ajustez cette valeur selon la hauteur de votre barre d'en-tête */
    .banner {
        margin-top: 30px;
    }

    body, html {
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Pour éviter les débordements horizontaux */
    }

    .container {
        position: absolute;
        top: 50%; /* Ajustez cette valeur selon votre besoin */
        left: 50%; /* Ajustez cette valeur selon votre besoin */
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    .total-posts,
    .featured-element {
        margin-top: 0px;
    }

	.navbar-fixed-top {
    margin-top: 0; /* Ajustez cette valeur selon vos besoins */
}


    form {
        margin-bottom: 20px;
        display: inline-block;
    }

    input[type="text"] {
        padding: 8px;
        font-size: 16px;
    }

    button {
        padding: 8px 16px;
        font-size: 16px;
        cursor: pointer;
        background-color: #d2b48c;
        color: #fff;
        border: none;
        border-radius: 4px;
    }

    button:hover {
        background-color: #e74c3c;
    }

    .post {
        float: left;
        width: calc(50% - 20px);
        margin: 0 40px 40px 10px;
        padding: 15px;
        background-color: transparent;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .post:hover {
        transform: scale(1.05);
    }

    h3 {
        color: white;
    }

    p {
        margin-bottom: 10px;
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-top: 10px;
    }

    .comments-container {
        display: none;
        margin-top: 10px;
        padding: 10px;
        border-top: 0px solid #ddd;
        clear: both;
    }

    .comment {
        margin: 10px 0;
        padding: 8px;
        border-radius: 4px;
    }

    .total-posts {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: bold;
    }

    @media (min-width: 750px) {
        .post {
            width: calc(20% - 10px);
        }
    }
</style>


			
			
			
			
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
		<script src="js/custom.js"></script>
	</body>	
</html>