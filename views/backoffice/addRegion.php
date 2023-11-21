<?php
// Include necessary files
include '../Controller/RegionC.php';
include '../model/Region.php';

// Initialize variables
$error = "";
$region = null;
$RegionC = new RegionC();

// Check if the form is submitted
if (isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["image"])) {
    // Check if form fields are not empty
    if (!empty($_POST['nom']) && !empty($_POST["description"]) && !empty($_POST["image"])) {
        // Create a Region object
        $region = new Region(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['image']
        );
        
        // Add the region to the database
        $RegionC->addRegion($region);

        // Redirect to the region list page
        header('Location: listRegion.php');
    } else {
        // Display an error if any information is missing
        $error = "Missing information";
    }
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
    <link rel="stylesheet" href="../Assets/backoffice/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../Assets/backoffice/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../Assets/backoffice/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../Assets/backoffice/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../Assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- JS Helpers and Config -->
    <script src="../Assets/backoffice/assets/vendor/js/helpers.js"></script>
    <script src="../Assets/backoffice/assets/js/config.js"></script>
</head>

<body>
    <!-- Main Content -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0"> Ajouter Region</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <!-- Form to add a region -->
                    <form class="form-horizontal" action="" method="POST">
                        <!-- Region Name -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="nom" placeholder="Région de la Tunisie" />
                            </div>
                        </div>

                        <!-- Region Description -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="description">Description</label>
                            <div class="col-sm-10">
                                <textarea
                                    name="description"
                                    id="basic-default-message"
                                    class="form-control"
                                    placeholder="Cette région de la Tunisie est..."
                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                    aria-describedby="basic-icon-default-message2">
                                </textarea>
                            </div>
                        </div>

                        <!-- Region Image -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Image</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="image" id="basic-default-pic" placeholder="Insérez une image de cette région" />
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
    <script src="../Assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../Assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../Assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../Assets/backoffice/assets/vendor/js/menu.js"></script>
    <script src="../Assets/backoffice/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>

    