<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
  // Redirect the user to the authentication page if they are not authenticated
  header("Location: /login");
  exit;
}

// Function to read CSV file and return data as an array
function readCSV($csvFile) {
    $csvData = [];
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $csvData[] = $data;
        }
        fclose($handle);
    }
    return $csvData;
}

// File path for the CSV file
$csvFile = 'ip_addresses.csv';

// Read CSV file to get visitor data
$visitor_data = readCSV($csvFile);

// Get total visits count
$total_visits = count($visitor_data);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png" />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #121212;
        color: #fff;
      }

      .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #1f1f1f;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
      }

      h1,
      h2 {
        text-align: center;
      }

      h1 {
        margin-bottom: 30px;
      }

      h2 {
        font-size: 20px;
        margin-top: 30px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th,
      td {
        padding: 12px 15px;
        border-bottom: 1px solid #444;
        text-align: left;
      }

      th {
        background-color: #333;
        font-weight: bold;
      }

      tbody tr:nth-child(even) {
        background-color: #292929;
      }

      @media only screen and (max-width: 600px) {
        .container {
          padding: 10px;
        }

        h1 {
          font-size: 24px;
          margin-bottom: 20px;
        }

        h2 {
          font-size: 18px;
          margin-top: 20px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Dashboard</h1>
      <h2>
        Total visitors:
        <?php echo $total_visits; ?>
      </h2>
      <table>
        <thead>
          <tr>
            <th>IP Address</th>
            <th>Timestamp</th>
            <th>Country</th>
            <th>City</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($visitor_data as $visitor): ?>
          <tr>
            <td><?php echo htmlspecialchars($visitor[0]); ?></td>
            <td><?php echo htmlspecialchars($visitor[1]); ?></td>
            <td><?php echo htmlspecialchars($visitor[2]); ?></td>
            <td><?php echo htmlspecialchars($visitor[3]); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <script src="/handler/script.js"></script>
  </body>
</html>
