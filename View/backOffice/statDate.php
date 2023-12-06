<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root');

// Retrieve data for treated complaints by date
$treatedComplaintsByDateQuery = $pdo->query('
SELECT DATE(dateEnregistrement) AS complaint_date, COUNT(*) AS nb_treated
FROM reclamation
WHERE etat = "traitee"
GROUP BY complaint_date
');

// Retrieve data for untreated complaints by date
$untreatedComplaintsByDateQuery = $pdo->query('
SELECT DATE(dateEnregistrement) AS complaint_date, COUNT(*) AS nb_untreated
FROM reclamation
WHERE etat <> "traitee"
GROUP BY complaint_date
');

// Process data
$treatedComplaintsByDate = $treatedComplaintsByDateQuery->fetchAll(PDO::FETCH_ASSOC);
$untreatedComplaintsByDate = $untreatedComplaintsByDateQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Complaint Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h1>Complaint Dashboard</h1>

    <div style="width: 70%; margin: auto;">
      <canvas id="complaintChart"></canvas>
    </div>
  </div>

  <script>
    var ctx = document.getElementById('complaintChart').getContext('2d');

    var treatedData = {
      label: 'Treated',
      data: <?= json_encode(array_column($treatedComplaintsByDate, 'nb_treated')) ?>,
      backgroundColor: '#36a2eb',
      borderColor: '#36a2eb',
      fill: false
    };

    var untreatedData = {
      label: 'Untreated',
      data: <?= json_encode(array_column($untreatedComplaintsByDate, 'nb_untreated')) ?>,
      backgroundColor: '#ff6384',
      borderColor: '#ff6384',
      fill: false
    };

    var complaintChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode(array_column($treatedComplaintsByDate, 'complaint_date')) ?>,
        datasets: [treatedData, untreatedData]
      },
      options: {
        title: {
          display: true,
          text: 'Number of Treated and Untreated Complaints Over Time'
        }
      }
    });
  </script>
</body>
</html>