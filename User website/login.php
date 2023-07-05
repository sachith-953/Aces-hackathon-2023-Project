

<!-- PHP for LOGIN process-->
<!-- PHP for LOGIN process-->
<!-- PHP for LOGIN process-->



<?php
 echo "fuck";
?>

<?php
$hostname = "localhost";   
$username = "root"; 
$password = ""; 
$database = "hackerthon"; 

// Establish a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
// Retrieve data from POST
$emaillogin = $_POST['emaillogin'];
$passwordlogin = $_POST['passwordlogin'];

// Construct the query
$query = "SELECT * FROM signups WHERE email = '$emaillogin' AND password = '$passwordlogin'";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) 
{
    
    // Process the retrieved data
    if ($row = mysqli_fetch_assoc($result)) {

      // Access individual fields using $row['field_name']
      //$workerid = $row['workerid'];

        // Redirecting to the home website
        $redirectUrl = "index.html";
        header("Location: " . $redirectUrl);
        exit;

    } else {
        // Redirecting to the login website
        $redirectUrl = "login.html";
        echo " non fuck";
        header("Location: " . $redirectUrl);
        exit;
    }
}
else 
{
    // Query failed
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);


?>

<!-- END OF PHP for LOGIN process-->
<!-- END OF PHP for LOGIN process-->
<!-- END OF PHP for LOGIN process-->