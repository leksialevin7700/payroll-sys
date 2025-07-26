<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['per_no'])) {
    echo "<script>alert('Please log in first.'); window.location='index.php';</script>";
    exit();
}

// Get the logged-in user's per_no from the session
$per_no = $_SESSION['per_no'];

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "pay_roll";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data for the logged-in user
$sql = "SELECT * FROM n_ot_earn WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OT-PAGE</title>
    <link rel="stylesheet" href="nav-style.css">
    <style>
        .body-style1 {
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        .body-style2 {
            font-family: Arial, sans-serif;
            background-color: #F3E5AB;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            max-width: 2000px;
            overflow: auto;
        }
        .container {
            position: relative;
            width: 800px;
            height: 60vh;
            background-color: lavenderblush;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table-wrapper {
            display: flex;
            transition: transform 0.5s ease;
            width: 200%; /* Double the width to fit both tables side by side */
            height: 100%;
        }
        .table-section {
            width: 50%; /* Each table takes up half of the table-wrapper's width */
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }
        h2 {
            background-color: tomato;
            color: white;
            border-radius: 8px;
            border: 2px solid black;
            margin: 5px;
            padding: 10px;
            text-align: center;
        }
        table {
            margin-top: 20px;
            margin-left: 20px;
            width: 600px;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px 19px;
            text-align: center;
            border: 2px solid #ddd;
        }
        thead {
        text-align: center;
            background-color: #333;
            color: white;
        }
        tbody tr {
            background-color: #D1EBA1;
        }
        tbody tr:hover {
            background-color: #A6D577;
        }
        
    </style>
</head>
<body class="body-style1">
<div class="header">
        <?php include("header.php");?>
    </div>
    <div class="nav">
    <nav>
      <input type="checkbox" id="btn">
      <ul>
        <li><a href="homz.php">Home</a></li>
        <li>
          <label for="btn-1" class="show">Earnings +</label>
          <a href="earning.php">Earnings</a>
          <input type="checkbox" id="btn-1">
          <ul>
            <li><a href="ot.php">OT</a></li>
            <li><a href="inc.php">INC-PAY</a></li>
            <li><a href="tax.php">iT-TAX</a></li>
          </ul>
        </li>
        <li>
          <label for="btn-2" class="show">Govt-Detection +</label>
          <a href="gov.php">Govt-Detection</a>
        <li><a href="pvt.php">Private-Detection</a></li>
        <li><a href="persnl.php">PIS</a></li>
        <li><a href="index.php">Logout</a></li>
      </ul>
    </nav>
    </div>
<div class="body-style2">
    <div class="container">
        <div class="table-wrapper" id="tableWrapper">
            <div class="table-section" id="table1">
                <h2>OT-PAY</h2>
                <table>
                    <thead>
                        <tr>
                            <th>per_no</th>
                            <th>o_bp</th>
                            <th>o_da</th>
                            <th>o_hra</th>
                            <th>o_tpa</th>
                            <th>o_tpa_da</th>
                            <th>otdb_hr</th>
                        </tr>
                        </thead>
<?php
$sql = "SELECT * FROM n_ot_earn WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["per_no"] . "</td>";
            echo "<td>" . $row["o_bp"] . "</td>";
            echo "<td>" . $row["o_da"] . "</td>";
            echo "<td>" . $row["o_hra"] . "</td>";
            echo "<td>" . $row["o_tpa"] . "</td>";
            echo "<td>" . $row["o_tpa_da"] . "</td>";
            echo "<td>" . $row["otdb_hr"] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
    ?>
                        </tr>
                        </tbody>
                        <thead>
                            <tr>
                            <th>otdb_amt</th>
                            <th>otsl_hr</th>
                            <th>otsl_amt</th>
                            <th>ot_tot</th>
                            <th>nd_hr</th>
                            <th>nd_amt</th>
                        </tr>
                        </thead>
<?php
$sql = "SELECT * FROM n_ot_earn WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <tbody>
                            <tr>
                            <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["otdb_amt"] . "</td>";
            echo "<td>" . $row["otsl_hr"] . "</td>";
            echo "<td>" . $row["otsl_amt"] . "</td>";
            echo "<td>" . $row["ot_tot"] . "</td>";
            echo "<td>" . $row["nd_hr"] . "</td>";
            echo "<td>" . $row["nd_amt"] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
    ?>
                        </tr>
                        </tbody>
                        </table>
                        </div>
</body>
</html>