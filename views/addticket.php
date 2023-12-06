<?php
include '../controller/ticketC.php';
include '../model/ticket.php';
$error = "";
$Ticket = null;
$TicketC = new ticketC();
if (
    isset($_POST["date"]) &&
    isset($_POST["prix"])&&
    isset($_POST["date_limite"])&&
    isset($_POST["quantite"])&&
    isset($_POST["heure"])&&
    isset($_POST["lieu"]) 
   
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["prix"])&&
        !empty($_POST["date_limite"])&&
        !empty($_POST["quantite"])&&
        !empty($_POST["heure"])&&
        !empty($_POST["lieu"]) 
    ) {
        $Ticket = new ticket(
            null,
            $_POST['date'],
            $_POST['prix'],
            $_POST['date_limite'],
            $_POST['quantite'],
            $_POST['heure'],
            $_POST['lieu']
           
            
        );
        $TicketC->addticket($Ticket);
        header('Location:afficheticket.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
 <!-- Meta tags and title -->
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Horizontal Layouts - Forms | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="../assets/backoffice/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/backoffice/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/backoffice/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/backoffice/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- JS Helpers and Config -->
    <script src="../assets/backoffice/assets/vendor/js/helpers.js"></script>
    <script src="../assets/backoffice/assets/js/config.js"></script>








</head>

<body>
    <!-- Main Content -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0"> Ajouter ticket</h5>
                    
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="POST">
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

    <!-- JS Scripts -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/backoffice/assets/vendor/js/menu.js"></script>
    <script src="../assets/backoffice/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
