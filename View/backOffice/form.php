<?php
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/reclamation.php';
$error = "";
// create reclamation
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();

if (
    isset($_POST["idReclamation"]) &&
    isset($_POST["etat"])
) {
    if (
        !empty($_POST['idReclamation']) &&
        !empty($_POST['etat'])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $reclamationC->changerEtat($_POST['idReclamation'], $_POST['etat']);
        header('Location:index.php');
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

    <title>Horizontal Layouts - Forms | Tounizika - Bootstrap 5 HTML Admin Template - Pro</title>

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
    <link rel="stylesheet" href="../../assets/backoffice/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/backoffice/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/backoffice/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/backoffice/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/backoffice/assets/js/config.js"></script>
  </head>
  <body>
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <img class="img-responsive" src="../../assets/frontoffice/assets/img/logo/tunisika.png" alt="" style="width: 50px; height: auto;">
      <span class="app-brand-text demo menu-text fw-bold ms-2">Tounizika</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
          <div class="menu-inner-shadow"></div>

           <!-- Forms & Tables -->
           <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
            <!-- Forms -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Form Elements</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="forms-basic-inputs.html" class="menu-link">
                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Input groups</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Form Layouts</div>
              </a>
              <ul class="menu-sub">
                
                <li class="menu-item active">
                  <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                  </a>
                </li>
              </ul>
            </li>
            </aside>
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Mise a jour Administrateur</h4>
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Administrateur</h5>
                      <small class="text-muted float-end">Traitement de réclamations</small>
                    </div>
                    <div class="card-body">
                    <a href="index.php"><button type="button" class="btn btn-outline-primary">back to list</button></a>
                    <hr>
                    
                    <div id="error">
                        <?php echo $error; ?>
                    </div>
                    
                    <?php
                    if (isset($_POST['idReclamation'])) {
                        $reclamation = $reclamationC->showReclamation($_POST['idReclamation']);
                        
                    ?>
                      <form  action="" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="idReclamation" >id de Reclamation:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="idReclamation" name="idReclamation" value="<?php echo $_POST['idReclamation'] ?>" readonly />
                            <span id="erreurId" style="color: red"></span>
                          </div>
                           
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="etat">Etat de reclamation:</label>
                          <div class="col-sm-10">
                          <select class="form-control" name="etat">
                            <option class="form-control" value="en attente">En attente</option>
                            <option class="form-control" value="traitee">Traitee</option>
                            <option class="form-control" value="rejetee">Rejetee</option>
                            </select>
                            <span id="erreurStatut" style="color: red"></span>
                          </div>
                        </div> 
                          </div>
                          <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <td>
                            <button type="submit" class="btn btn-primary" value="Update">Save</button>
                            </td>
                            <td>
                            <button type="Reset" class="btn btn-primary" value="Reset">Reset</button>
                            </td>
                          </div>
                         
                        </div>
</form>
<?php
    }
    ?>     
</body>
</html>