<?php
include("../../Controller/UtilisateurC.php");

$c = new UtilisateurC();
$tab = $c->listUtilisateurs();


$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC(); 
?>

<!DOCTYPE html>

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
            <li class="menu-item ">
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

<li class="menu-item active">
<a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Utilisateur</div>
              </a>
              
              <ul class="menu-sub">
             
            <li class="menu-item active">
                  
                    <a href="tables-basic.php" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Liste utilisateur</div>
                  </a>
                </li>
                
              
                
              </ul>
            </li>






          
            <li class="menu-item">
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
    <!-- Displaying the list of users -->
    <div class="card">
        <h5 class="card-header">Liste des Utilisateurs</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Tel</th>
                            <th>Password</th>
                            <th>Configuration</th>
                            <th>Etat du compte</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $utilisateur) { ?>
                            <tr>
                                <td><span class="badge bg-label-primary me-1"><?= $utilisateur['idUtilisateur']; ?></span></td>
                                <td><?= $utilisateur['nom']; ?></td>
                                <td><?= $utilisateur['prenom']; ?></td>
                                <td><?= $utilisateur['email']; ?></td>
                                <td><?= $utilisateur['tel']; ?></td>
                                <td><?= password_hash($utilisateur['password_'], PASSWORD_DEFAULT); ?></td>
                                <td><?= $utilisateur['configuration']; ?></td>
                                <td><?= $utilisateur['etat']; ?></td>
                                <td>
                                    <form method="POST" action="updateUtilisateur.php">
                                        <input type="submit" name="update" value="Update" onclick="this.disabled=true;this.form.submit();">
                                        <input type="hidden" name="idUtilisateur" value="<?= $utilisateur['idUtilisateur']; ?>">
                                    </form>
                                </td>
                                <td>
                                    <button><a href="deleteUtilisateur.php?id=<?= $utilisateur['idUtilisateur']; ?>">Delete</a></button>
                                </td>
                                <td>
                                    <form method="POST" action="updateetat.php">
                                        <input type="submit" name="update" value="Update" onclick="this.disabled=true;this.form.submit();">
                                        <input type="hidden" name="idUtilisateur" value="<?= $utilisateur['idUtilisateur']; ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript inclusion -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/js/menu.js"></script>
    <script src="../../Assets/backoffice/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>