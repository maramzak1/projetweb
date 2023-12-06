<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root');

// Retrieve distinct months available in the database
$distinctMonthsQuery = $pdo->query('
SELECT DISTINCT DATE_FORMAT(dateEnregistrement, "%Y-%m") AS distinct_month
FROM reclamation
ORDER BY distinct_month DESC
');

// Process distinct months data
$distinctMonths = $distinctMonthsQuery->fetchAll(PDO::FETCH_ASSOC);

// Get the selected month (default to the latest month)
$selectedMonth = isset($_GET['month']) ? $_GET['month'] : $distinctMonths[0]['distinct_month'];

// Retrieve data for treated complaints by month
$treatedComplaintsByMonthQuery = $pdo->prepare('
SELECT DATE_FORMAT(dateEnregistrement, "%Y-%m") AS complaint_month, COUNT(*) AS nb_treated
FROM reclamation
WHERE etat = "traitee" AND DATE_FORMAT(dateEnregistrement, "%Y-%m") = :selectedMonth
GROUP BY complaint_month
');
$treatedComplaintsByMonthQuery->bindParam(':selectedMonth', $selectedMonth);
$treatedComplaintsByMonthQuery->execute();

// Retrieve data for untreated complaints by month
$untreatedComplaintsByMonthQuery = $pdo->prepare('
SELECT DATE_FORMAT(dateEnregistrement, "%Y-%m") AS complaint_month, COUNT(*) AS nb_untreated
FROM reclamation
WHERE etat <> "traitee" AND DATE_FORMAT(dateEnregistrement, "%Y-%m") = :selectedMonth
GROUP BY complaint_month
');
$untreatedComplaintsByMonthQuery->bindParam(':selectedMonth', $selectedMonth);
$untreatedComplaintsByMonthQuery->execute();

// Retrieve data for complaint titles and their counts
$complaintTitlesQuery = $pdo->query('
SELECT titre, COUNT(*) AS title_count
FROM reclamation
GROUP BY titre
');

// Process data for percentages
$treatedComplaintsQuery = $pdo->query('
SELECT COUNT(*) AS nb_treated
FROM reclamation
WHERE etat = "traitee"
');

$untreatedComplaintsQuery = $pdo->query('
SELECT COUNT(*) AS nb_untreated
FROM reclamation
WHERE etat <> "traitee"
');

// Process data
$treatedComplaintsByMonth = $treatedComplaintsByMonthQuery->fetchAll(PDO::FETCH_ASSOC);
$untreatedComplaintsByMonth = $untreatedComplaintsByMonthQuery->fetchAll(PDO::FETCH_ASSOC);

$treatedComplaints = $treatedComplaintsQuery->fetchColumn();
$untreatedComplaints = $untreatedComplaintsQuery->fetchColumn();

$complaintTitlesData = $complaintTitlesQuery->fetchAll(PDO::FETCH_ASSOC);
// Requête pour récupérer les statistiques
$statsQuery = $pdo->query('
    SELECT 
        AVG(evaluation) AS moyenne_evaluation,
        COUNT(evaluation) AS total_evaluations,
        COUNT(CASE WHEN evaluation = 1 THEN 1 END) AS nb_etoile_1,
        COUNT(CASE WHEN evaluation = 2 THEN 1 END) AS nb_etoile_2,
        COUNT(CASE WHEN evaluation = 3 THEN 1 END) AS nb_etoile_3,
        COUNT(CASE WHEN evaluation = 4 THEN 1 END) AS nb_etoile_4,
        COUNT(CASE WHEN evaluation = 5 THEN 1 END) AS nb_etoile_5
    FROM reponse
    WHERE evaluation IS NOT NULL
');

$stats = $statsQuery->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../../assets/backoffice/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/backoffice/assets/vendor/js/helpers.js"></script>
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
    <a href="index.html" class="app-brand-link">
    <img class="img-responsive" src="../../assets/frontoffice/assets/img/logo/tunisika.png" alt="" style="width: 50px; height: auto;">
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
                <div data-i18n="Dashboards">Dashboards</div>
                <div class="badge bg-danger rounded-pill ms-auto">5</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                    target="_blank"
                    class="menu-link">
                    <div data-i18n="CRM">CRM</div>
                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="dash.php" class="menu-link">
                    <div data-i18n="Analytics">Analytics</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-dashboard.html"
                    target="_blank"
                    class="menu-link">
                    <div data-i18n="eCommerce">eCommerce</div>
                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-logistics-dashboard.html"
                    target="_blank"
                    class="menu-link">
                    <div data-i18n="Logistics">Logistics</div>
                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-academy-dashboard.html"
                    target="_blank"
                    class="menu-link">
                    <div data-i18n="Academy">Academy</div>
                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Front Pages -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Front Pages">Front Pages</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/landing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div data-i18n="Landing">Landing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/pricing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div data-i18n="Pricing">Pricing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/payment-page.html"
                    class="menu-link"
                    target="_blank">
                    <div data-i18n="Payment">Payment</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/checkout-page.html"
                    class="menu-link"
                    target="_blank">
                    <div data-i18n="Checkout">Checkout</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/help-center-landing.html"
                    class="menu-link"
                    target="_blank">
                    <div data-i18n="Help Center">Help Center</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li>
            <!-- Apps -->
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Email">Email</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-chat.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div data-i18n="Chat">Chat</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-calendar.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Calendar">Calendar</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-kanban.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div data-i18n="Kanban">Kanban</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
            <!-- Pages -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="Account">Account</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-notifications.html" class="menu-link">
                    <div data-i18n="Notifications">Notifications</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-connections.html" class="menu-link">
                    <div data-i18n="Connections">Connections</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="auth-login-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Login</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-register-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Register</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Misc</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-misc-error.html" class="menu-link">
                    <div data-i18n="Error">Error</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-misc-under-maintenance.html" class="menu-link">
                    <div data-i18n="Under Maintenance">Under Maintenance</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            <!-- Cards -->
            <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Cards</div>
              </a>
            </li>
            <!-- User interface -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">User interface</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="ui-accordion.html" class="menu-link">
                    <div data-i18n="Accordion">Accordion</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-alerts.html" class="menu-link">
                    <div data-i18n="Alerts">Alerts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-badges.html" class="menu-link">
                    <div data-i18n="Badges">Badges</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-buttons.html" class="menu-link">
                    <div data-i18n="Buttons">Buttons</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-carousel.html" class="menu-link">
                    <div data-i18n="Carousel">Carousel</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-collapse.html" class="menu-link">
                    <div data-i18n="Collapse">Collapse</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-dropdowns.html" class="menu-link">
                    <div data-i18n="Dropdowns">Dropdowns</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-footer.html" class="menu-link">
                    <div data-i18n="Footer">Footer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-list-groups.html" class="menu-link">
                    <div data-i18n="List Groups">List groups</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-modals.html" class="menu-link">
                    <div data-i18n="Modals">Modals</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-navbar.html" class="menu-link">
                    <div data-i18n="Navbar">Navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-offcanvas.html" class="menu-link">
                    <div data-i18n="Offcanvas">Offcanvas</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                    <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-progress.html" class="menu-link">
                    <div data-i18n="Progress">Progress</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-spinners.html" class="menu-link">
                    <div data-i18n="Spinners">Spinners</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tabs-pills.html" class="menu-link">
                    <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-toasts.html" class="menu-link">
                    <div data-i18n="Toasts">Toasts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tooltips-popovers.html" class="menu-link">
                    <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-typography.html" class="menu-link">
                    <div data-i18n="Typography">Typography</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Extended UI</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="extended-ui-text-divider.html" class="menu-link">
                    <div data-i18n="Text Divider">Text Divider</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Boxicons</div>
              </a>
            </li>

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
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Form Layouts</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="form-layouts-vertical.html" class="menu-link">
                    <div data-i18n="Vertical Form">Vertical Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Form Validation -->
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/form-validation.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-check"></i>
                <div data-i18n="Form Validation">Form Validation</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
            <!-- Tables -->
            <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li>
            <!-- Data Tables -->
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/tables-datatables-basic.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div data-i18n="Datatables">Datatables</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

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
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/backoffice/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../assets/backoffice/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle ms-1">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                      
                      <button><a href="index.php" class="btn btn-secondary">Back to list</a></button>
                        <div class="card-body">
                       
                       
                          <h5 class="card-title text-primary">Welcome! 🎉</h5>
                          <p class="mb-4">
                            Here <span class="fw-medium"></span> is your dashboard.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../../assets/backoffice/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../../assets/backoffice/assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Profit</span>
                          <h3 class="card-title mb-2">$12,628</h3>
                          <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../../assets/backoffice/assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span>Sales</span>
                          <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                          <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Graphes Reclamation -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h3 class="card-header m-0 me-2 pb-3">Overview Réclamations</h3>
                        <div class="container">
                        <style>
                          .separator {
                            width: 90%;
                            margin: auto;
                            margin-top: 20px;
                            margin-bottom: 20px;
                            border-top: 1px solid #ccc;
                          }
                          body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .star {
            color: #FFD700;
        }
                        .etoile-title {
        margin-top: 10px; /* Ajustez selon vos besoins */
    }

    .etoile-1 {
        color: #FF5733; /* Couleur pour 1 étoile */
    }

    .etoile-2 {
        color: #FFD700; /* Couleur pour 2 étoiles */
    }

    .etoile-3 {
        color: #9370DB; /* Couleur pour 3 étoiles */
    }

    .etoile-4 {
        color: #4169E1; /* Couleur pour 4 étoiles */
    }

    .etoile-5 {
        color: #9ACD32; /* Couleur pour 5 étoiles */
    }
                        
                        </style>
                      

                        <!-- Pie Chart for Complaint Percentages -->
                        <div style="width: 50%; margin: auto;">
                        <h5 class="card-header m-0 me-2 pb-3">Total des Réclamations traitées et non traitées</h5>
                          <canvas id="percentageChart"></canvas>
                        </div>
                      </div>
                      <div class="separator"></div>
                     <center> <h4 class="card-header m-0 me-2 pb-3">Réclamations traitées en fonction des mois</h4></center>
                        <!-- Dropdown for selecting the month -->
                        <form action="" method="get">
                          <label for="month">Select Month:</label>
                          <select name="month" id="month" onchange="this.form.submit()">
                            <?php foreach ($distinctMonths as $month): ?>
                              <option value="<?= $month['distinct_month'] ?>" <?= ($selectedMonth === $month['distinct_month']) ? 'selected' : '' ?>>
                                <?= date('F Y', strtotime($month['distinct_month'])) ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </form>
                        <!-- Graph for Complaints by Month -->
                        <div style="width: 70%; margin: auto;">
                        
                          <canvas id="complaintChart"></canvas>
                        </div>
                         <!-- Separator Line -->
                          <div class="separator"></div>

                      <!-- Bar Chart for Complaint Titles -->
                      <center> <h4 class="card-header m-0 me-2 pb-3">Overview Objets des réclamations</h4></center>
                      <div style="width: 70%; margin: auto;">
                        <canvas id="titlesChart"></canvas>
                      </div>
                      
                     
                  <!-- Separator Line -->
                  <div class="separator"></div>
                  <center> <h4 class="card-header m-0 me-2 pb-3">Calendrier </h4></center>
                  

              <!-- Conteneur pour le calendrier Flatpickr -->
<div id="calendarContainer"></div>

<!-- Formulaire pour sélectionner une date -->
<form id="dateForm" method="get">
    <input type="hidden" id="hiddenSelectedDate" name="hiddenSelectedDate">
</form>
    <!-- Ajoutez le script pour activer le sélecteur de date Flatpickr et gérer l'envoi immédiat -->
<!-- Ajoutez le script pour activer le sélecteur de date Flatpickr en mode inline -->
<script>
    flatpickr("#calendarContainer", {
        inline: true,
        dateFormat: "Y-m-d",
        // Vous pouvez ajouter d'autres options selon vos besoins
        onChange: function(selectedDates, dateStr, instance) {
            // Mettez à jour le champ caché avec la date sélectionnée
            document.getElementById('hiddenSelectedDate').value = dateStr;
            
            // Soumettez immédiatement le formulaire
            document.getElementById('dateForm').submit();
        }
    });
</script>

<!-- Complaints for Selected Date -->
<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root');

// Vérifier si une date est soumise
if (isset($_GET['hiddenSelectedDate'])) {
  // Nettoyez la date soumise
  $selectedDate = htmlspecialchars($_GET['hiddenSelectedDate']);

    // Requête pour récupérer le nombre de réclamations traitées pour la date soumise
    $treatedComplaintsQuery = $pdo->prepare('
        SELECT COUNT(DISTINCT r.idReclamation) AS nb_treated
        FROM reclamation r
        LEFT JOIN reponse rp ON r.idReclamation = rp.idReclamation
        WHERE r.etat = "traitee" AND DATE(rp.dateReponse) = :selectedDate
    ');
    $treatedComplaintsQuery->bindParam(':selectedDate', $selectedDate);
    $treatedComplaintsQuery->execute();
    
    // Récupérer le nombre de réclamations traitées
    $nbTreatedComplaints = $treatedComplaintsQuery->fetchColumn();

    // Requête pour récupérer les détails des réclamations traitées pour la date soumise
    $treatedComplaintDetailsQuery = $pdo->prepare('
        SELECT r.idReclamation, r.titre, r.description, r.dateEnregistrement, r.etat, rp.dateReponse
        FROM reclamation r
        LEFT JOIN reponse rp ON r.idReclamation = rp.idReclamation
        WHERE r.etat = "traitee" AND DATE(rp.dateReponse) = :selectedDate
        ORDER BY r.idReclamation
    ');
    $treatedComplaintDetailsQuery->bindParam(':selectedDate', $selectedDate);
    $treatedComplaintDetailsQuery->execute();

    // Récupérer les détails des réclamations traitées
    $treatedComplaintDetails = $treatedComplaintDetailsQuery->fetchAll(PDO::FETCH_ASSOC);

    // Afficher le résultat
   
    echo '<h5>Réclamations pour le ' . $selectedDate . '</h5>';
    echo '<p>Nombre total de Réclamations traitées: ' . $nbTreatedComplaints . '</p>';
    // Afficher le graphique
    echo '<div style="width: 70%; margin: auto;">';
    echo '<canvas id="complaintChartForDate"></canvas>';
    echo '</div>';

    // Script Chart.js pour créer le graphique
    echo '<script>';
    echo 'var ctx = document.getElementById("complaintChartForDate").getContext("2d");';
    echo 'var myChart = new Chart(ctx, {';
    echo 'type: "bar",';
    echo 'data: {';
    echo 'labels: ["Réclamations Traitées"],';
    echo 'datasets: [{';
    echo 'label: "Nombre de Réclamations Traitées",';
    echo 'data: [' . $nbTreatedComplaints . '],';
    echo 'backgroundColor: "rgba(75, 192, 192, 0.2)",';
    echo 'borderColor: "rgba(75, 192, 192, 1)",';
    echo 'borderWidth: 1';
    echo '}]';
    echo '},';
    echo 'options: {';
    echo 'scales: {';
    echo 'y: {';
    echo 'beginAtZero: true';
    echo '}';
    echo '}';
    echo '}';
    echo '});';
    echo '</script>';
}
// Afficher le tableau des réclamations traitées
if (!empty($treatedComplaintDetails)) {
    echo '<h5>Liste des Réclamations traitées pour le ' . $selectedDate . '</h5>';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Titre</th>';
    echo '<th scope="col">Description</th>';
    echo '<th scope="col">Date de Réponse</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($treatedComplaintDetails as $complaint) {
        echo '<tr>';
        echo '<td>' . $complaint['idReclamation'] . '</td>';
        echo '<td>' . $complaint['titre'] . '</td>';
        echo '<td>' . $complaint['description'] . '</td>';
        echo '<td>' . $complaint['dateReponse'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>Aucune réclamation traitée pour la date soumise.</p>';
}
// Afficher la liste des réclamations enregistrées pour la date soumise
$complaintDetailsQuery = $pdo->prepare('
    SELECT r.idReclamation, r.titre, r.description, r.dateEnregistrement, r.etat, rp.dateReponse
    FROM reclamation r
    LEFT JOIN reponse rp ON r.idReclamation = rp.idReclamation
    WHERE DATE(r.dateEnregistrement) = :selectedDate
    ORDER BY r.idReclamation
');
$complaintDetailsQuery->bindParam(':selectedDate', $selectedDate);
$complaintDetailsQuery->execute();

// Récupérer les détails des réclamations
$complaintDetails = $complaintDetailsQuery->fetchAll(PDO::FETCH_ASSOC);

// Afficher la liste des réclamations dans un tableau
if (!empty($complaintDetails)) {
    echo '<h5>Liste des Réclamations envoyées le ' . $selectedDate . ' et leur état de traitement</h5>';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Titre</th>';
    echo '<th scope="col">Description</th>';
    echo '<th scope="col">Date de la réclamation</th>';
    echo '<th scope="col">Etat</th>';
    echo '<th scope="col">Date de Réponse</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($complaintDetails as $complaint) {
        echo '<tr>';
        echo '<td>' . $complaint['idReclamation'] . '</td>';
        echo '<td>' . $complaint['titre'] . '</td>';
        echo '<td>' . $complaint['description'] . '</td>';
        echo '<td>' . $complaint['dateEnregistrement'] . '</td>';
        echo '<td>' . $complaint['etat'] . '</td>';
        echo '<td>' . $complaint['dateReponse'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>Aucune réclamation enregistrée pour la date soumise.</p>';
}
?>
       <div class="separator"></div>
                  <center> <h4 class="card-header m-0 me-2 pb-3">Qualité de réponse évaluée par les utilisateurs</h4></center>
                  <?php
$statsQuery = $pdo->query('
    SELECT 
        AVG(evaluation) AS moyenne_evaluation,
        COUNT(evaluation) AS total_evaluations,
        COUNT(CASE WHEN evaluation = 1 THEN 1 END) AS nb_etoile_1,
        COUNT(CASE WHEN evaluation = 2 THEN 1 END) AS nb_etoile_2,
        COUNT(CASE WHEN evaluation = 3 THEN 1 END) AS nb_etoile_3,
        COUNT(CASE WHEN evaluation = 4 THEN 1 END) AS nb_etoile_4,
        COUNT(CASE WHEN evaluation = 5 THEN 1 END) AS nb_etoile_5
    FROM reponse
    WHERE evaluation IS NOT NULL
');

$stats = $statsQuery->fetch(PDO::FETCH_ASSOC);

function getResponsesByRating($pdo, $rating) {
    $query = $pdo->prepare('
        SELECT 
            r.idReponse,
            r.reponse,
            r.dateReponse,
            r.evaluation,
            rc.idReclamation
        FROM 
            reponse r
        JOIN 
            reclamation rc ON r.idReclamation = rc.idReclamation
        WHERE 
            r.evaluation = :rating
    ');

    $query->bindParam(':rating', $rating, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
                  <table>
        <tr>
            <th>Moyenne des évaluations</th>
            <td><?= round($stats['moyenne_evaluation'], 2) ?></td>
        </tr>
        <tr>
            <th>Nombre total d'évaluations</th>
            <td><?= $stats['total_evaluations'] ?></td>
        </tr>
        <!-- Bouton pour afficher toutes les réponses -->
<button onclick="toggleAllResponses()"  class="btn btn-primary">Afficher toutes les réponses</button>
        <tr>
            <th>Nombre d'évaluations par étoile</th>
            <td>
                <ul>
                <li><span class="star" style="color: #FF5733;">★</span> 1 étoile : <?= $stats['nb_etoile_1'] ?></li>
                    <li><span class="star" style="color: #FFD700;">★★</span> 2 étoiles : <?= $stats['nb_etoile_2'] ?></li>
                    <li><span class="star" style="color: #9370DB;">★★★</span> 3 étoiles : <?= $stats['nb_etoile_3'] ?></li>
                    <li><span class="star" style="color: #4169E1;">★★★★</span> 4 étoiles : <?= $stats['nb_etoile_4'] ?></li>
                    <li><span class="star" style="color: #9ACD32;">★★★★★</span> 5 étoiles : <?= $stats['nb_etoile_5'] ?></li>
                </ul>
            </td>
        </tr>
    </table>
  <!-- Ajout d'une section pour afficher les réponses pour chaque étoile -->
<?php
// Fonction de comparaison pour trier les réponses par évaluation de manière décroissante
function compareResponses($a, $b) {
    return $b['evaluation'] - $a['evaluation'];
}

for ($i = 5; $i >= 1; $i--) {
    // Récupération des réponses pour chaque évaluation
    $responsesByRating = getResponsesByRating($pdo, $i);

    // Tri des réponses en fonction du nombre d'étoiles en ordre décroissant
    usort($responsesByRating, 'compareResponses');

    // Affichage des réponses triées
    echo "<div id='etoile-$i' style='display: none;'>";
    echo "<h5 class='etoile-title etoile-$i'>Réponses pour l'étoile " . str_repeat('★', $i) . ":</h5>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Id Réponse</th>";
    echo "<th>Réponse</th>";
    echo "<th>Date de réponse</th>";
    // Ajoutez d'autres colonnes selon vos besoins
    echo "</tr>";

    foreach ($responsesByRating as $response) {
        echo "<tr>";
        echo "<td>{$response['idReponse']}</td>";
        echo "<td>{$response['reponse']}</td>";
        echo "<td>{$response['dateReponse']}</td>";
        // Ajoutez d'autres colonnes selon vos besoins
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}
?>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function toggleAllResponses() {
        for (let i = 1; i <= 5; i++) {
            $('#etoile-' + i).toggle();
        }
    }
</script>
            <!-- Afficher les statistiques sous forme de graphique circulaire -->
           
            <canvas id="evaluationChart" width="400" height="400"></canvas>
          

                      <script>
                        var ctx = document.getElementById('complaintChart').getContext('2d');
                        var percentageCtx = document.getElementById('percentageChart').getContext('2d');
                        var titlesCtx = document.getElementById('titlesChart').getContext('2d');
                        var evaluationctx = document.getElementById('evaluationChart').getContext('2d');
                        
                        
                        var treatedData = {
                          label: 'Treated',
                          data: <?= json_encode(array_column($treatedComplaintsByMonth, 'nb_treated')) ?>,
                          backgroundColor: '#36a2eb',
                          borderColor: '#36a2eb',
                          fill: false
                        };

                        var untreatedData = {
                          label: 'Untreated',
                          data: <?= json_encode(array_column($untreatedComplaintsByMonth, 'nb_untreated')) ?>,
                          backgroundColor: '#ff6384',
                          borderColor: '#ff6384',
                          fill: false
                        };

                        var complaintChart = new Chart(ctx, {
                          type: 'line',
                          data: {
                            labels: <?= json_encode(array_column($treatedComplaintsByMonth, 'complaint_month')) ?>,
                            datasets: [treatedData, untreatedData]
                          },
                          options: {
                            title: {
                              display: true,
                              text: 'Number of Treated and Untreated Complaints Over Months'
                            }
                          }
                        });

                        var percentageData = {
                          labels: ['Treated', 'Untreated'],
                          datasets: [{
                            data: [<?= $treatedComplaints ?>, <?= $untreatedComplaints ?>],
                            backgroundColor: ['#36a2eb', '#ff6384']
                          }]
                        };
                          
                        var percentageChart = new Chart(percentageCtx, {
                          type: 'pie',
                          data: percentageData,
                          options: {
                            title: {
                              display: true,
                              text: 'Percentage of Treated and Untreated Complaints'
                            }
                          }
                        });
                        var titlesData = {
                                labels: <?= json_encode(array_column($complaintTitlesData, 'titre')) ?>,
                                datasets: [{
                                  label: 'Title Counts',
                                  data: <?= json_encode(array_column($complaintTitlesData, 'title_count')) ?>,
                                  backgroundColor: '#4caf50',
                                  borderColor: '#4caf50',
                                  borderWidth: 1
                                }]
                              };

                              // Options for Complaint Titles Chart
                              var titlesOptions = {
                                scales: {
                                  y: {
                                    beginAtZero: true
                                  }
                                }
                              };

                              // Create Complaint Titles Chart
                              var titlesChart = new Chart(titlesCtx, {
                                type: 'bar',
                                data: titlesData,
                                options: titlesOptions
                              });
                             
                        
                      </script>

                
               </div>

  
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <div class="dropdown">
                            
                             
                            </div>
                          </div>
                        </div>
                        
                        

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"></span>
                            </div>
                            
                          </div>
                          <div class="d-flex">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                                  
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../../assets/backoffice/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                            
                          </div>
                          <span class="d-block mb-1">Payments</span>
                          <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                          <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../../assets/backoffice/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            
                          </div>
                          <span class="fw-medium d-block mb-1">Transactions</span>
                          <h3 class="card-title mb-2">$14,857</h3>
                          <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    
    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-medium"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0">$84,686k</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                 

               
          </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">ThemeSelection</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../../assets/backoffice/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/backoffice/assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/backoffice/assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/backoffice/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/backoffice/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../../assets/backoffice/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/backoffice/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
