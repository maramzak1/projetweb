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

// Process data
$treatedComplaintsByMonth = $treatedComplaintsByMonthQuery->fetchAll(PDO::FETCH_ASSOC);
$untreatedComplaintsByMonth = $untreatedComplaintsByMonthQuery->fetchAll(PDO::FETCH_ASSOC);
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

    <div style="width: 70%; margin: auto;">
      <canvas id="complaintChart"></canvas>
    </div>
  </div>

  <script>
    var ctx = document.getElementById('complaintChart').getContext('2d');

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
  </script>
</body>
</html>