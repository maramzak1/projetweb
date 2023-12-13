<?php

include '../../Controller/concertC.php';
include '../../Model/concert.php';
$error = "";

$concert = null;
$concertC = new concertC();


if (
    isset($_POST["date"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["etat"]) &&
    isset($_POST["image"]) 
    
) 
{
    if (
        !empty($_POST['date']) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["etat"])&&
        !empty($_POST["image"])
        )
   {
        foreach ($_POST as $key => $value) 
        {
            echo "Key: $key, Value: $value<br>";
        }
        $concert = new concert(
            null,
            $_POST['date'],
            $_POST['lieu'],
            $_POST['etat'],
            $_POST['image']
        );
        var_dump($concert);
        
        $concertC->updateconcert($concert, $_POST['id_concert']);

        header('Location:listconcert - Copy.php');
    } 
    else
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
    <!-- Layout wrapper ORGANISATION MADHHER -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink">
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2"> Tounizika</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            
             <li class="menu-item active">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Gestion des concerts</div>
              </a>
            </li>
            
          </ul>
        </aside>
        
        
        <!-- / Menu -->

        <!-- Layout container  masoul al mandher hhh-->
         <!-- / Menu -->

        <!-- Layout container  masoul al mandher hhh-->
        <div class="layout-page">


        <div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Modifiez concert</h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">

                <?php
                if (isset($_POST['id_concert'])) {
                  $concert = $concertC->showconcert($_POST['id_concert']);
                    if ($concert) { // Check if $concert is not null
                ?>
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="id_concert">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-id" name="id_concert" value="<?php echo $concert['id_concert']; ?>" readonly />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="date">date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="basic-default-name" name="date" value="<?php echo $concert['date']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="lieu">lieu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="lieu" value="<?php echo $concert['lieu']; ?>" />
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="etat">État</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="basic-default-name" name="etat">
                                    <option value="en cours">En Cours</option>
                                    <option value="annule">Annulé</option>
                                    <option value="complet">Complet</option>
                                    <option value="termine">termine</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-image">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="basic-default-image" name="image" value="<?php echo $concert['image']; ?>" />
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="update_concert">Update</button>
                                </div>
                            </div>
                        </form>

                        <?php
                        // Handle form submission
                        if (isset($_POST['update_concert'])) {
                            // Check if the expected keys exist in $_POST before using them
                            $id_concert = isset($_POST['id_concert']) ? $_POST['id_concert'] : '';
                            $date = isset($_POST['date']) ? $_POST['date'] : '';
                            $lieu = isset($_POST['lieu']) ? $_POST['lieu'] : '';
                            $etat = isset($_POST['etat']) ? $_POST['etat'] : '';
                            $image = isset($_POST['image']) ? $_POST['image'] : '';

                            // Create a concert object
                            $updatedconcert = new concert($id_concert, $date, $lieu, $etat, $image);

                            // Update the concert in the database
                            $concertC->updateconcert($updatedconcert, $id_concert);

                            // Redirect to the desired location after updating
                            header('Location: listconcert - Copy.php');
                        }
                        ?>

                <?php
                    } else {
                        echo "concert not found"; // Handle the case where the concert is not found
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    function validateForm() {
        var dateInput = document.getElementById('basic-default-name-date');
        var lieuInput = document.getElementById('basic-default-name');
        var etatInput = document.getElementById('basic-default-name');
        var imageInput = document.getElementById('basic-default-image');

        function isFirstLetterUpperCase(str) {
            return /^[A-Z]/.test(str);
        }

        function validateDate() {
            var date = dateInput.value;
            var dateRegex = /^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/;
            if (!dateRegex.test(date)) {
                alert('Veuillez saisir une date valide au format mm-dd-yyyy.');
                dateInput.value = '';
            }
        }

        validateDate(); // Appel de la fonction de validation de la date

        var lieu = lieuInput.value;
        if (!isFirstLetterUpperCase(lieu)) {
            alert('Le lieu doit commencer par une majuscule');
            return false;
        }

        var etat = etatInput.value.toLowerCase();
        console.log('etat:', etat);

        if (etat === 'termine') {
            alert('Vous ne pouvez pas ajouter un concert dont l\'état est "terminé".');
            return false;
        }

        var image = imageInput.value;
        if (!image.endsWith('.jpg')) {
            alert('L\'image doit avoir l\'extension .jpg');
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
            </body>
            </html>







