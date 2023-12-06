<?php

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root');

// Retrieve data
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
$treatedComplaints = $treatedComplaintsQuery->fetchColumn();
$untreatedComplaints = $untreatedComplaintsQuery->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en"
class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/backoffice/assets/"
  data-template="vertical-menu-template-free">
>
<head>
  <meta charset="UTF-8">
   <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Complaint Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h1>Complaint Dashboard</h1>

    <div style="width: 50%; margin: auto;">
      <canvas id="complaintChart"></canvas>
    </div>
  </div>

  <script>
    var ctx = document.getElementById('complaintChart').getContext('2d');
    var complaintChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Treated', 'Untreated'],
        datasets: [{
          data: [<?= $treatedComplaints ?>, <?= $untreatedComplaints ?>],
          backgroundColor: ['#36a2eb', '#ff6384']
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Percentage of Treated and Untreated Complaints'
        }
      }
    });
  </script>
</body>
</html>