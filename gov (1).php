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
$sql = "SELECT * FROM n_gov_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOV-RECOVERY</title>
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
            width: 1000px;
            height: 90vh;
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
            width: 800px;
            height: 25vh;
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
        @media (max-width: 480px) {
        .container {
            width: 100%;
            height: auto;
        }
        table {
            width: 100%;
            font-size: 10px;
        }
        th, td {
            padding: 5px 5px;
        }
        h2 {
            font-size: 16px;
            padding: 8px;
        }
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
        <li><a href="persnl.php">PIS</a></li>

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
                <h2>GOV-RECOVERY</h2>
                <table>
                    <thead>
                        <tr>
                            <th>per_no</th>
                            <th>gpf_sub</th>
                            <th>gpf_arr</th>
                            <th>gpf_lon</th>
                            <th>nps_tli</th>
                            <th>nps_tlia</th>
                        </tr>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM n_gov_recy WHERE per_no='$per_no'";
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
            echo "<td>" . $row["gpf_sub"] . "</td>";
            echo "<td>" . $row["gpf_arr"] . "</td>";
            echo "<td>" . $row["gpf_lon"] . "</td>";
            echo "<td>" . $row["nps_tli"] . "</td>";
            echo "<td>" . $row["nps_tlia"] . "</td>";
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
                        $sql = "SELECT * FROM n_gov_recy WHERE per_no='$per_no'";
                        $result = $conn->query($sql);
                        ?>
                        <thead>
                        <tr>
                            <th>nps_tlg</th>
                            <th>nps_tlga</th>
                            <th>cgegia</th>
                            <th>qtr_rent</th>
                            <th>it_recy</th>
                            <th>it_cess</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nps_tlga"] . "</td>";
            echo "<td>" . $row["nps_tlga"] . "</td>";
            echo "<td>" . $row["cgegis"] . "</td>";
            echo "<td>" . $row["qtr_rent"] . "</td>";
            echo "<td>" . $row["it_recy"] . "</td>";
            echo "<td>" . $row["it_cess"] . "</td>";
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
                        $sql = "SELECT * FROM n_gov_recy WHERE per_no='$per_no'";
                        $result = $conn->query($sql);
                        ?>
                        <thead>
                        <tr>
                            <th>veh_adv</th>
                            <th>comp_adv</th>
                            <th>hb_adv</th>
                            <th>leav_sal</th>
                            <th>tada_recy</th>
                            <th>ltc_recy</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["veh_adv"] . "</td>";
            echo "<td>" . $row["comp_adv"] . "</td>";
            echo "<td>" . $row["hv_adv"] . "</td>";
            echo "<td>" . $row["leav_sal"] . "</td>";
            echo "<td>" . $row["tada_recy"] . "</td>";
            echo "<td>" . $row["ltc_recy"] . "</td>";
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
                        $sql = "SELECT * FROM n_gov_recy WHERE per_no='$per_no'";
                        $result = $conn->query($sql);
                        ?>
                        <thead>
                        <tr>
                            <th>flod_recy</th>
                            <th>drought_recy</th>
                            <th>hosp_recy</th>
                            <th>oth_recy1</th>
                            <th>oth_recy2</th>
                            <th>oth_recy3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["flod_recy"] . "</td>";
            echo "<td>" . $row["drought_recy"] . "</td>";
            echo "<td>" . $row["hosp_recy"] . "</td>";
            echo "<td>" . $row["oth_recy1"] . "</td>";
            echo "<td>" . $row["oth_recy2"] . "</td>";
            echo "<td>" . $row["oth_recy3"] . "</td>";
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
                        $sql = "SELECT * FROM n_gov_recy WHERE per_no='$per_no'";
                        $result = $conn->query($sql);
                        ?>
                        <thead>
                        <tr>
                            <th>oth_recy4</th>
                            <th>oth_recy5</th>
                            <th>misc_recy</th>
                            <th>tot_gvt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["oth_recy4"] . "</td>";
            echo "<td>" . $row["oth_recy5"] . "</td>";
            echo "<td>" . $row["misc_recy"] . "</td>";
            echo "<td>" . $row["tot_gov"] . "</td>";
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
</body>
</html>