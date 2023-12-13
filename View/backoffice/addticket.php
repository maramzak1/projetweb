<?php
include '../../Controller/ticketC.php';
include '../../Model/ticket.php';
include "../../Controller/concertC.php";
$error = "";
$Ticket = null;
$TicketC = new ticketC();
$c = new concertC();
$tab = $c->listconcert();
if (
        isset($_POST['date']) &&
        isset($_POST["prix"])&&
        isset($_POST["date_limite"])&&
        isset($_POST["quantite"])&&
        isset($_POST["heure"])&&
        isset($_POST["lieu"]) &&
        isset($_POST["concert"])&&
        isset($_POST["image"])&&
        isset($_POST["quantite_ticket"]))
      
    {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["prix"])&&
        !empty($_POST["date_limite"])&&
        !empty($_POST["quantite"])&&
        !empty($_POST["heure"])&&
        !empty($_POST["lieu"]) &&
        !empty($_POST["concert"])&&
        !empty($_POST["image"])&&
        !empty($_POST["quantite_ticket"])
    ) {
        $Ticket = new ticket(
            null,
            $_POST['date'],
            $_POST['prix'],
            $_POST['date_limite'],
            $_POST['quantite'],
            $_POST['heure'],
            $_POST['lieu'],
            $_POST['concert'],
            $_POST['image'],
            $_POST['quantite_ticket']
            
           
            
        );
        $TicketC->addticket($Ticket);
        header('Location:listticketbf.php');
    } else
        $error = "Missing information";
}


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

    <link rel="stylesheet" href="../../assets/backoffice/assets/vendor/fonts/boxicons.css" />

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
            <li class="menu-item  ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Réclamations">Post et Commentaires</div>
                
              </a>
              
              <ul class="menu-sub">

              <li class="menu-item  ">
                  
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

<li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Concert Et Ticket</div>
              </a>
              
              <ul class="menu-sub">
             
            <li class="menu-item active">
                  
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
        <div class="layout-page">

<!-- wfet el organisation-->

<!-- Ajout du ticket-->
<div class="row">
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Ajouter tickets</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="" method="POST">
            <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="concert">concert</label>
                           <div class="col-sm-10">
                                 <select name="concert" id="concert">
                                  <?php
                                  foreach ($tab as $concert) {
                                  echo '<option value="' . $concert['id_concert'] . '">' . $concert['lieu'] . '</option>';
                                   }
                                  ?>
                                  </select>
                           </div>
                      </div>

    
                
                        <!-- date concerts -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="date">date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="basic-default-date" name="date" placeholder="date du concerts" />
                            </div>
                        </div>
                    <!-- prix concert  -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="prix">prix</label>
                            <div class="col-sm-10">
                                <input type="int" class="form-control" id="basic-default-prix" name="prix" placeholder="prix du ticket" />
                            </div>
                        </div>
                        
                        
                        <!-- date limite -->
                        <form class="form-horizontal" action="" method="POST">
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="date_limite">date_limite</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="basic-default-datelimite" name="date_limite" placeholder="datelimite du ticket" />
                            </div>
                        </div>
                        <!-- quantite du ticket -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="quantite">quantite</label>
                            <div class="col-sm-10">
                                <input type="int" class="form-control" id="basic-default-quantite" name="quantite" placeholder="combien du ticket voulez vous" />
                            </div>
                        </div>
                         <!-- heure -->
                         <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="heure">heure</label>
                            <div class="col-sm-10">
                                <input type="int" class="form-control" id="basic-default-heure" name="heure" placeholder="heure du concert" />
                            </div>
                        </div>
                        <!-- lieu concert  -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="lieu">lieu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-lieu" name="lieu" placeholder="lieu du concerts" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="basic-default-pic" placeholder="Insérez une image " />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="quantite_ticket">quantite</label>
                            <div class="col-sm-10">
                                <input type="int" class="form-control" id="basic-default-quantite_ticket" name="quantite_ticket" placeholder="nombre de place disponible " />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/backoffice/assets/vendor/js/menu.js"></script>
    <script src="../assets/backoffice/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
   
document.addEventListener('DOMContentLoaded', function () {
    function validateForm() {
        //var dateInput = document.getElementById('basic-default-date');
        var prixInput = document.getElementById('basic-default-prix');
        var quantiteInput = document.getElementById('basic-default-quantite');
        var lieuInput = document.getElementById('basic-default-lieu');
        var imageInput = document.getElementById('basic-default-pic');
        var dateLimiteInput = document.getElementById('basic-default-datelimite'); // Ajout de la référence pour la date limite

        function isFirstLetterUpperCase(str) {
            return /^[A-Z]/.test(str);
        }

        /*function validateDate() {
            var date = dateInput.value;
            var dateRegex = /^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/;
            if (!dateRegex.test(date)) {
                alert('Veuillez saisir une date valide au format mm-dd-yyyy.');
                dateInput.value = '';
            }
        }

        validateDate(); // Appel de la fonction de validation de la date*/

        var lieu = lieuInput.value;
        if (!isFirstLetterUpperCase(lieu)) {
            alert('Le lieu doit commencer par une majuscule');
            return false;
        }

        var prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix > 50) {
            alert('Le prix doit être un nombre inférieur ou égal à 50.');
            return false;
        }

        var quantite = parseInt(quantiteInput.value, 10);
        if (isNaN(quantite) || quantite > 10) {
            alert('La quantité doit être un nombre entier inférieur ou égal à 10.');
            return false;
        }

        var image = imageInput.value;
        if (!image.endsWith('.jpg')) {
            alert('L\'image doit avoir l\'extension .jpg');
            return false;
        }

        // Ajout de la validation pour la date limite
        var dateLimite = dateLimiteInput.value;
        var currentDate = new Date();
        var selectedDate = new Date(dateLimite);

        if (selectedDate < currentDate) {
            alert('La date limite doit être ultérieure à la date actuelle.');
            return false;
        }

        return true;
    }

    document.querySelector('form').addEventListener('submit', function (e) {
        if (!validateForm()) {
            e.preventDefault();
        }
    });
});


</script>
<!--inlcusion taa java-->
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
