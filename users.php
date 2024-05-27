<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
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
  <br>
      <div class="content-wrapper">
         <div class="chain_form">
       <?php
    //create database connection
    $conn = new mysqli("localhost", "root", "", "fast_food_chain");

    //construct sql state
    $sql = 'SELECT * FROM users ORDER BY users.`Id` DESC';

    $result = $conn->query($sql);
    ?>
    <div class="container">
    <div class="table">
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
          </tr>
          
        </thead>
        <tbody>

          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['id'];  ?></td>
              <td><?php echo $row['username'];  ?></td>
              <td><?php echo $row['email'];  ?></td>
              <td><?php echo $row['role'];  ?></td>
              <td>
                 <a href="edit_user.php?" class="btn btn-sm btn-info">Edit</a>
                 <a onclick="delete_user(<?php echo $row['id'];  ?>)" href="#" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>

          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

</body>

<script>

  function delete_user(id) {
      if (confirm("Do you want to delete this data? ")){
       swindow.location = "delete-user.php?id="+id;
      }
  }

</script>
</html>


        </div>
    </div>
  </div>
</body>
</html>
