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
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Recovery</title>
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
            height: 10%;
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
            margin: 10px auto;
            width: 600px;
            height: 60vh;
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
                <h2>PVT-RECOVERY</h2>
                <table>
                    <thead>
                        <tr>
                            <th>per_no</th>
                            <th>court_ded</th>
                            <th>lic_pol</th>
                            <th>pli_pol</th>
                            <th>rd_post</th>
                            <th>lwf_sub</th>
                        </tr>
                        </thead>
<?php
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
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
            echo "<td>" . $row["court_ded"] . "</td>";
            echo "<td>" . $row["lic_pol"] . "</td>";
            echo "<td>" . $row["pli_pol"] . "</td>";
            echo "<td>" . $row["rd_post"] . "</td>";
            echo "<td>" . $row["lwf_sub"] . "</td>";
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
                            <th>lwf_recy</th>
                            <th>frf_sub</th>
                            <th>frf_recy</th>
                            <th>vij_inst</th>
                            <th>co_optx</th>
                            <th>co_opsoc</th>
                        </tr>
                        </thead>
                        <?php
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["lwf_recy"] . "</td>";
            echo "<td>" . $row["frf_sub"] . "</td>";
            echo "<td>" . $row["frf_recy"] . "</td>";
            echo "<td>" . $row["vij_inst"] . "</td>";
            echo "<td>" . $row["co_optx"] . "</td>";
            echo "<td>" . $row["co_opsoc"] . "</td>";
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
$sql = "SELECT * FROM n_pvt_recy";
$result = $conn->query($sql);
?>
                        <thead>
                        <tr>
                            <th>co_opstr</th>
                            <th>sport_recy</th>
                            <th>maf_sub</th>
                            <th>maf_loan</th>
                            <th>prof_tax</th>
                            <th>flag_day</th>
                        </tr>
                        </thead>
                        <?php
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <tbody>
                        <tr>
                            <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["co_opstr"] . "</td>";
            echo "<td>" . $row["sport_recy"] . "</td>";
            echo "<td>" . $row["maf_sub"] . "</td>";
            echo "<td>" . $row["maf_loan"] . "</td>";
            echo "<td>" . $row["prof_tax"] . "</td>";
            echo "<td>" . $row["flag_day"] . "</td>";
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
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <thead>
                        <tr>
                            <th>relif_fund</th>
                            <th>hvf_recy</th>
                            <th>krish_mdr</th>
                            <th>vin_templ</th>
                            <th>tvm_templ</th>
                            <th>bhish_club</th>
                        </tr>
                        </thead>
                        <?php
$sql = "SELECT * FROM n_pvt_recy";
$result = $conn->query($sql);
?>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["relif_fund"] . "</td>";
            echo "<td>" . $row["hvf_recy"] . "</td>";
            echo "<td>" . $row["krish_mdr"] . "</td>";
            echo "<td>" . $row["vin_teml"] . "</td>";
            echo "<td>" . $row["tvm_templ"] . "</td>";
            echo "<td>" . $row["bhish_club"] . "</td>";
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
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <thead>
                        <tr>
                            <th>asso_sub</th>
                            <th>off_mess</th>
                            <th>fin_asst</th>
                            <th>ind_cantn</th>
                            <th>oth_recy1</th>
                            <th>oth_recy2</th>
                        </tr>
                        </thead>
                        <?php
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["asso_sub"] . "</td>";
            echo "<td>" . $row["off_mess"] . "</td>";
            echo "<td>" . $row["fin_asst"] . "</td>";
            echo "<td>" . $row["ind_cantn"] . "</td>";
            echo "<td>" . $row["oth_recy1"] . "</td>";
            echo "<td>" . $row["oth_recy2"] . "</td>";
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
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <thead>
                        <tr>
                            <th>oth_recy3</th>
                            <th>oth_recy4</th>
                            <th>oth_recy5</th>
                            <th>misc_recy</th>
                            <th>tot_pvt</th>
                        </tr>
                        </thead>
                        <?php
$sql = "SELECT * FROM n_pvt_recy WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
                        <tbody>
                        <tr>
                        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["oth_recy3"] . "</td>";
            echo "<td>" . $row["othr_ecy4"] . "</td>";
            echo "<td>" . $row["oth_recy5"] . "</td>";
            echo "<td>" . $row["misc_recy"] . "</td>";
            echo "<td>" . $row["tot_pvt"] . "</td>";
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