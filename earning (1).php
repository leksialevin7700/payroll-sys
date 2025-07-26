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
$sql = "SELECT * FROM n_earnings WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings</title>
    <link rel="stylesheet" href="nav-style.css">
    <style>
        .body-style1 {
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
        .body-style2 {
            
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        .container {
            position: relative;
            width: 1000px;
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
            margin: 20px AUTO;
            width: 600px;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px 20px;
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
        .nav-buttons {
            position: absolute;
            bottom: 5px;
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .nav-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            background-color: hsl(0, 0%, 11%);
            color: white;
            margin: 0 10px;
        }
        .nav-buttons button:hover {
            color: cyan;
            border-radius: 8px;
            box-shadow:  0 0 5px #33ffff,
               0 0 10px #66ffff;
        }
    </style>
</head>
<body class="body-style2">
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
        <li><a href="tax.php">iT</a></li>
        <li><a href="index.php">Logout</a></li>
      </ul>
    </nav>
    </div>
<div class="body-style1">
    <div class="container">
        <div class="table-wrapper" id="tableWrapper">
            <div class="table-section" id="table1">
                <h2>Earnings</h2>
                <table>
                    <thead>
                        <tr>
                            <th>per_no</th>
                            <th>bank</th>
                            <th>acc_no</th>
                            <th>bp</th>
                            <th>da</th>
                            <th>hra</th>
                            <th>tpa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["per_no"] . "</td>";
            echo "<td>" . $row["bank"] . "</td>";
            echo "<td>" . $row["acc_no"] . "</td>";
            echo "<td>" . $row["bp"] . "</td>";
            echo "<td>" . $row["da"] . "</td>";
            echo "<td>" . $row["hra"] . "</td>";
            echo "<td>" . $row["tpa"] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
    ?>
    </tr>
    </tbody>
<?php
  $sql = "SELECT * FROM n_earnings WHERE per_no='$per_no'";
  $result = $conn->query($sql);
  
?>
                        <thead>
                            <tr>
                            <th>tpa_da</th>
                            <th>spl_pay</th>
                            <th>spl_all</th>
                            <th>dres_all</th>
                            <th>misc_ern</th>
                            <th>tot_sal</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                            <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["tpa_da"] . "</td>";
            echo "<td>" . $row["spl_pay"] . "</td>";
            echo "<td>" . $row["spl_all"] . "</td>";
            echo "<td>" . $row["dres_all"] . "</td>";
            echo "<td>" . $row["misc_ern"] . "</td>";
            echo "<td>" . $row["tot_sal"] . "</td>";
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
        <div class="table-section" id="table2">
            <h2>Other-Earnings</h2>
             <table>
             <?php
     $sql = "SELECT * FROM n_earnings WHERE per_no='$per_no'";
     $result = $conn->query($sql);
     
?>
                    <thead>
                        <tr>
                            <th>ot_amt</th>
                            <th>nd_amt</th>
                            <th>m_plis</th>
                            <th>q_plis</th>
                            <th>y_plis</th>
                            <th>gross</th>
                            <th>gov_rcy</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ot_amt"] . "</td>";
            echo "<td>" . $row["nd_amt"] . "</td>";
            echo "<td>" . $row["m_plis"] . "</td>";
            echo "<td>" . $row["q_plis"] . "</td>";
            echo "<td>" . $row["y_plis"] . "</td>";
            echo "<td>" . $row["gross"] . "</td>";
            echo "<td>" . $row["gov_rcy"] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
    ?>

                        </tr>
                    </tbody>
                    <?php
    $sql = "SELECT * FROM n_earnings WHERE per_no='$per_no'";
    $result = $conn->query($sql);
    
?>
                        <thead>
                            <tr>
                                <th>bal_pay</th>
                                <th>pvt_rcy</th>
                                <th>net_pay</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["bal_pay"] . "</td>";
            echo "<td>" . $row["pvt_rcy"] . "</td>";
            echo "<td>" . $row["net_pay"] . "</td>";
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
        </div>
    </div>
    <div class="nav-buttons">
        <button onclick="showTable(1)">Earings</button>
        <button onclick="showTable(2)">other earnings</button>
    </div>

    <script>
        let currentTable = 1;

        function showTable(tableNumber) {
            const tableWrapper = document.getElementById('tableWrapper');
            if (tableNumber === 1) {
                tableWrapper.style.transform = 'translateX(0)';
            } else if (tableNumber === 2) {
                tableWrapper.style.transform = 'translateX(-50%)';
            }
            currentTable = tableNumber;
        }

        // Optional: Swipe detection (for touch devices)
        let touchStartX = 0;
        let touchEndX = 0;

        function handleTouchStart(event) {
            touchStartX = event.changedTouches[0].screenX;
        }

        function handleTouchEnd(event) {
            touchEndX = event.changedTouches[0].screenX;
            handleSwipe();
        }

        function handleSwipe() {
            if (touchEndX < touchStartX) {
                showTable(2);
            } else if (touchEndX > touchStartX) {
                showTable(1);
            }
        }

        document.getElementById('tableWrapper').addEventListener('touchstart', handleTouchStart, false);
        document.getElementById('tableWrapper').addEventListener('touchend', handleTouchEnd, false);
    </script>
    </div>
</body>
</html>

