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
          <li><a href="dashboard.php"></i>Dashboard</a></li>
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
  
      <div class="content-wrapper">
       


        </div>
    </div>
  </div>
</body>
</html>
