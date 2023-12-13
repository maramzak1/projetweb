<?php
include "../../Controller/reponseC.php";

//php liste
$c = new reponseC();
$tab = $c->listReponses();

//php ajout
include '../../Model/reponse.php';

$error = "";
$reponseC = new reponseC();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs sont non vides
    if (!empty($_POST['reponse']) && !empty($_POST['idReclamation']) ) {
        // Créer un objet  avec les données du formulaire
        $reponse = new reponse(
            null,
            $_POST['reponse'],
          time(),
           $_POST['idReclamation']
        );

        // Ajouter le folklore à la base de données
        $reponseC->addReponse($reponse);

        // Rediriger vers la liste des folklores
        header('Location: solve.php');
        exit();
    } else {
        // Afficher une erreur si des informations sont manquantes
        $error = "Missing information";
    }
}
?>





<meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/backoffice/assets/img/favicon/favicon.ico" />

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

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../Assets/backoffice/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../Assets/backoffice/assets/js/config.js"></script>
    <script src="addReponse.js" ></script>

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
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Réclamations">Réclamations</div>
                
              </a>
              
              <ul class="menu-sub">
              <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Listes de réclamations</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="solve.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Gestion de réponses</div>
              </a>
            </li>
            </a>
            <li class="menu-item">
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
                <li class="menu-item">
                  <a href="AddFolklore.php" class="menu-link">
                    <div data-i18n="Horizontal Form">Ajout du Folklore</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="listFolklore.php" class="menu-link">
                    <div data-i18n="Horizontal Form">Liste des Folklores</div>
                  </a>
                </li>


              </ul>
            </li>
            

          </ul>

        </aside>



      <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              
              
            </div>
          </nav>
              
            
          
        

      <!-- Ajout de reponses -->
      <br>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <a href="index.php"><button type="button" class="btn btn-outline-primary">back to list</button></a>
                    <h5 class="mb-0">Ajouter une reponse</h5>
                    <small class="text-muted float-end">Gestion de réponses</small>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="POST" >
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="reponse">Reponse</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reponse" name="reponse" placeholder="Saisissez la reponse" />
                            </div>
                        </div>

                       
                        
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="idReclamation">id et titre de la Réclamation</label>
<div class="col-sm-10">
    <select class="form-control" name="idReclamation" id="idReclamation">
        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=tounizika', 'root', '');

            // Préparez et exécutez la requête SQL
            $requete = $pdo->prepare("SELECT idReclamation, titre FROM reclamation");
            $requete->execute();

            // Vérifiez s'il y a des résultats
            if ($requete->rowCount() > 0) {
                // Affichez chaque ID et titre comme une option dans la liste déroulante
                while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['idReclamation'] . "'>" . $row['idReclamation'] . " - " . $row['titre'] . "</option>";
                }
            } else {
                echo "<option value=''>Aucune réclamation trouvée</option>";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
        }
        ?>
    </select>
</div>


</div>
                    
                              

                        
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" onclick="return validateForm()">Send</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    
   



      














        
        
        
        
        
        
        
        <!--AFFICHAGE DE LA LISTE-->
        <div class="card">
                <h5 class="card-header">Listes des reponses</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Id de la reponse</th>
                          <th>reponse</th>
                          <th>date de la reponse</th>
                          <th>reclamation associée</th>

                          
                        </tr>
                      </thead>
                      
                      
                      <tbody>
                      <?php foreach ($tab as $reponse) { ?>
                        <tr>
                        
                          
                          <td><span class="badge bg-label-primary me-1"><?= $reponse['idReponse']; ?></span></td>
                          <td>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $reponse['reponse']; ?></span>
                          </td>
                          <td>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $reponse['dateReponse']; ?></span>
                          </td>
                          
                          
                          <td>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium"><?= $reponse['idReclamation']; ?></span>
                          </td>
                          <td>
                            
                            <form method="POST" action="update.php">
                           <div class="row justify-content-end">
                                    
                                      <td>
                                      <button type="submit" class="btn btn-info" name="update" value="Update">Update</button>
                                      </td>
                                      
                                   
                                <input type="hidden" value="<?= $reponse['idReponse']; ?>" name="idReponse">
                            </form>
                        </td>
                        <td>
                        <a href="deleteReponse.php?id=<?= $reponse['idReponse']; ?>"><button type="Delete" class="btn btn-secondary" name="delete" value="Delete">Delete</button></a>
                      </td>
                        
                          
                        

                       
                          
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>


  <!--inlcusion taa java-->
  <script src="../../Assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Assets/backoffice/assets/vendor/js/menu.js"></script>
    <script src="../../Assets/backoffice/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>
</html>