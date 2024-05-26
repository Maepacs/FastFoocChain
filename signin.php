<?php
// Database connection details
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "fast_food_chain";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();
        
        // Verify password
        if (password_verify($input_password, $hashed_password)) {
            // Check if the user is admin
            if ($username === "admin") {
                // Redirect to table.php for admin
                header("Location: admin_dashboard.php");
                exit();
            } else {
                // Redirect to index.php for non-admin users
                header("Location: index.php");
                exit();
            }
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that username.');</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
     <div class="signin-form">
        <h2>Sign In</h2>
        <form action="signin.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign In">
             <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
    
</body>
</html>