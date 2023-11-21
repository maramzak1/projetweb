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
        header('Location:listconcert - Copy.php');
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
                    <h5 class="mb-0"> Ajouter concert</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="POST">
                        <!-- date concerts -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="date">date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name-date" name="date" placeholder="date du concerts" />
                            </div>
                        </div>

                        <!-- lieu concert  -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="lieu">lieu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="lieu" placeholder="lieu du concerts" />
                            </div>
                        </div>
                         <!-- etat concert  -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="etat">etat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="etat" placeholder="etat du concerts" />
                            </div>
                        </div>

                        <!-- concert Image -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Image</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="image" id="basic-default-pic" placeholder="Insérez une image " />
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
