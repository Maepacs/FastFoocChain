<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
     <link rel="stylesheet" href="css/signup.css">
   
</head>
 <div class="signin-form">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select class="form-control" id="floatingRole" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <input type="submit" value="Sign Up">
        </form>
        <p class="text-center mb-0">Already have an Account? <a href="signin.php">Sign In</a></p>
    </div>
    <script src="path/to/your/bootstrap.js"></script>
</body>
</html>
<?php
// Database connection details
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Function to check if username exists
    function isUsernameUnique($username, $conn) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows === 0; // If there are no rows, the username is unique
    }

    // Check if username is unique
    if (isUsernameUnique($username, $conn)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>
                    alert('Registration successful! Redirecting to login page.');
                    window.location.href='signin.php';
                  </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>
                    alert('Username is already taken. Please choose another one.');
                  </script>";
    }
    
    // Close the connection
    $conn->close();
}
?>
