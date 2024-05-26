<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <h2>Fast Food Chain</h2>
      <nav class="sidebar-nav">
        <ul>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="dropdown">
            <a href="#" class="dropbtn">Fast Food Chains</a>
            <div class="dropdown-content">
              <a href="chains.php">Chains</a>
              <a href="products.php">Product</a>
              <a href="locations.php">Locations</a>
            </div>
          </li>
          <li><a href="users.php">Users</a></li>
          <li><a href="tables.php">Tables</a></li>
          <li><a href="sales.php">Sales</a></li>
        </ul>
      </nav>
    </div>
    <div class="main-content">
      <div class="navbar">
        <ul>
          <div class="dropdown">
          <a href="#" class="dropbtn"><img src="img/user-2-fill.png" alt="Admin"></a>
          <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="logout.php">Logout</a>
          </div>
          </li>
        </ul>
      </div>
      <br>
      
      <div class="content-wrapper">
        <div class="chain_form">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h2>Add Chain</h2>
     <input type="text" name="name" placeholder="Name" required>
            <select class="form-control" id="floatingtype" name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="Domestic">Domestic</option>
                <option value="International">International</option>
            </select><br><br>

    <input type="submit" value="Submit">
</form>
        </div>
      </div>
</body>
</html>

<?php
// Change these credentials according to your database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fast_food_chain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];

    // Insert data into database
    $sql = "INSERT INTO fast_food_chains (name, type) VALUES ('$name', '$type')";


if (mysqli_query($conn, $sql)) {
  echo "<script>alert('New record created successfully.');</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
mysqli_close($conn);

?>
