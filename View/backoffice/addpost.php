<?php
// Include PHPMailer and other necessary files
 
 

// Include config.php first
require_once '../../config.php';
 
include_once "../../Model/post.php";
include_once  "../../Controller/postC.php";
 
 
 
$postC = new postC();
$error = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "../../uploads/";

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
                    null, // ou un identifiant réel si vous en avez un
                    $title,
                    $content,
                    date('Y-m-d H:i:s'),
                    $uploadPath
                );
                

                $postC->addPost($post);
				 

               

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
   
 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/backoffice/assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard - Analytics | Tounizika - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../Assets/backoffice/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../../Assets/backoffice/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../Assets/backoffice/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../Assets/backoffice/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../Assets/backoffice/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../Assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../Assets/backoffice/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../Assets/backoffice/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/backoffice/assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  </head>




  <body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <img class="img-responsive" src="../../Assets/backoffice/assets/img/favicon/favicon.ico" alt="" style="width: 50px; height: auto;">
      <span class="app-brand-text demo menu-text fw-bold ms-2">Tounizika</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Réclamations">Réclamations</div>
                
              </a>
              
              <ul class="menu-sub">
              <li class="menu-item ">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Listes de réclamations</div>
              </a>
            </li>
            <li class="menu-item ">
              <a href="solve.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Gestion de réponses</div>
              </a>
            </li>
            </a>
            <li class="menu-item ">
                  <a href="dash.php" class="menu-link">
                    <div data-i18n="Dashboard Réclamations">Dashboard</div>
                  </a>
                </li>
                
              </ul>
            </li>



              <!-- Post et commentaire  -->
            <li class="menu-item active open ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Réclamations">Post et Commentaires</div>
                
              </a>
              
              <ul class="menu-sub">
              <li class="menu-item  active">
                  
                  <a href="addpost.php" class="menu-link">
                <div data-i18n="Perfect Scrollbar">Ajout des posts</div>
                </a>
              </li>
            <li class="menu-item ">
                  
                    <a href="listepost.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Liste des posts</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="listecommentaire.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Liste des Commentaires</div>
                  </a>
                </li>
              
                
              </ul>
            </li>



            <!--RConcert Et Ticket  -->

<li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Concert Et Ticket</div>
              </a>
              
              <ul class="menu-sub">
             
            <li class="menu-item ">
                  
                    <a href="addticket.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Ajouter Ticket</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="addconcert - Copy.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Ajouter Concert </div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="listconcert - Copy.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">List Concert </div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="listticketbf.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">List Ticket </div>
                  </a>
                </li>
              
                
              </ul>
            </li>

              <!--Utilisateur   -->

<li class="menu-item ">
<a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Utilisateur</div>
              </a>
              
              <ul class="menu-sub">
             
            <li class="menu-item ">
                  
                    <a href="tables-basic.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Liste utilisateur</div>
                  </a>
                </li>
                
              
                
              </ul>
            </li>

          
            <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Regions Et Folklores</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="AddRegion.php" class="menu-link">
                    <div data-i18n="Vertical Form">Ajout des Regions</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="listRegion.php" class="menu-link">
                    <div data-i18n="Horizontal Form">Liste des Regions</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="AddFolklore.php" class="menu-link">
                    <div data-i18n="Horizontal Form">Ajout du Folklore</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="listFolklore.php" class="menu-link">
                    <div data-i18n="Horizontal Form">Liste des Folklores</div>
                  </a>
                </li>


              </ul>
            </li>
            

          </ul>

        </aside>


        <!-- / Menu -->

        <!-- Layout container  masoul al mandher hhh-->
        <div class="layout-page">

        <!-- wfet el organisation-->

        <div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Ajouter Post </h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">



<!-- hedhiii khedemtiii -->



 
     
	 



     
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="title">Title:</label>
        <div class="col-sm-10">
            <input type="text" id="title" name="title" class="form-control" />
            <span id="errortitle" style="color: red"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="content">Content:</label>
        <div class="col-sm-10">
            <input type="text" id="content" name="content" class="form-control" />
            <span id="errorcontent" style="color: red"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="image" class="col-sm-2 col-form-label">Image:</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="image" name="image">
            <span id="errorimage" style="color: red"></span>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-sm-2">
            <a href="addpost.php" class="btn btn-secondary">Cancel</a>
        </div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="enregistre">Save</button>
        </div>
    </div>
</form>

        
        <?php
        // Traitement du formulaire lorsqu'il est soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ajoutez la logique de traitement ici, par exemple, pour valider et enregistrer les données
            // Utilisez $_POST['title'], $_POST['content'], $_FILES['image'] pour accéder aux données du formulaire

            // Notez également l'utilisation de l'attribut "enctype" pour traiter les fichiers dans le formulaire
        }
        ?>
    
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
<!--inlcusion taa java-->
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/js/menu.js"></script>
    <script src="../../Assets/backoffice/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>   

 
 