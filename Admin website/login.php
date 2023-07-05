<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test3";

// Create a new mysqli instance
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate and process the login
function processLogin($username, $password, $conn) {
    // Prepare and bind the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM sellers WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        // Fetch the row data
        $row = $result->fetch_assoc();

        // Verify the password
        // password_verify($password, $row['password'])
        if ($password == $row["password"]) {
            echo "Login successful!";
            // Continue with further processing or redirect to a dashboard page

            header("Location: add.html");
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Username not found!";
    }

    // Close the statement
    $stmt->close();
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Process the login
    processLogin($username, $password, $conn);
}

// Close the database connection
$conn->close();
?>

<!-- Example HTML form for login
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html> -->
