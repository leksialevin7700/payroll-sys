<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['per_no'])) {
    echo "<script>alert('Please login first.'); window.location='index.php';</script>";
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
$sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personal Information Table</title>
<link rel="stylesheet" href="nav-style.css">
<style>
  .body-style1 {
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        .body-style2 {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
  }
  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 20px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
    box-shadow: 0 2px 15px rgba(64, 64, 64, 0.1);
    background-color: white;
  }
  th, td {
    padding: 12px 15px;
  }
  thead {
    background-color: #55608f;
    color: #ffffff;
  }
  th {
    text-transform: uppercase;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  @media screen and (max-width: 768px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }
    thead tr {
      display: none;
    }
    tr {
      margin-bottom: 15px;
      border: 1px solid #ddd;
    }
    td {
      text-align: right;
      padding-left: 50%;
      position: relative;
    }
    td::before {
      content: attr(data-label);
      position: absolute;
      left: 0;
      width: 50%;
      padding-left: 15px;
      font-weight: bold;
      text-align: left;
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
<div class="table-responsive">
  <table>
    <tbody>
    <tr>
        <td data-label="Field">Personl NO</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["per_no"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
    </tr>
    <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
        <tr>
        <td data-label="Field">First Name</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["first_name"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
    </tr>
        </td>
      <?php
$sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
$result = $conn->query($sql);
      ?>
      <tr>
        <td data-label="Field">Last Name</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["last_name"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
    </tr>
        </td>
      <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Email</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["email_id"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
        <tr>
        <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
        <td data-label="Field">Phone</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["phn_no"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
        </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Address</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["address"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">City</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["city"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">State</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["state"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Zip Code</td>
        <td data-label="Value">
        </td>
      <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["zip_cod"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Country</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["country"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Date of Birth</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["d_o_b"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Gender</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["gender"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Marital Status</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["marid_stat"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Grade</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["grad"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Permanent NO</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["pmt_no"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Category</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["category"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
     $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
     $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Section</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["sec"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Token NO</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["tkn_no"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
      </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">Date of Appointment</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["dt_of_aptm"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
        </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
      <tr>
      <td data-label="Field">PF-Account NO</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["pf_ac_no"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
        </tr>
        </td>
      <?php
      $sql = "SELECT * FROM persnl_info WHERE per_no='$per_no'";
      $result = $conn->query($sql);
      ?>
    <tr>
    <td data-label="Field">Pan NO</td>
        <td data-label="Value">
        <?php
    // Output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["pan_no"] . "</td>";
            // Add more columns as needed
        }
    } else {
        echo "<tr><td colspan='1'>No data found</td></tr>";
    }
    ?>
        </tr>
        </td>
    </tbody>
  </table>
</div>
</body>
</html>
