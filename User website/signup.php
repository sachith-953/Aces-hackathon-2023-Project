
<!-- PHP for signup process-->
<!-- PHP for signup process-->
<!-- PHP for signup process-->

<?php
  // SIGNUP DETAIL
    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "hackerthon";

    // Establish database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $workerid = $_POST["nic"];
    $password = $_POST["password"];
    /////////////////////////////////////////////////////////////////////////
        //better if we can add the time of regitration to the database too
    /////////////////////////////////////////////////////////////////////////
    // Construct SQL query
    $sql = "INSERT INTO signups (nic, fullname, email,password) VALUES ('$nic', '$fullname', '$email', '$password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        $warning = "SIGN UP SUCCESSFUL";
    } else {
        $warning = "SIGNUP FAILED:
        check for worker id ";
    }

    // Close the database connection
    mysqli_close($conn);
?>

<!-- NOTIFICATION FOR SUCCESSFUL LOGIN put in the office website-->
  <div style="position: fixed; top: 0; left: 0%; width: 100%; background-color: #9f9d9d; color: #333; padding: 50px; box-sizing: border-box; display: none;" id="notification">
    <span style="float: right; cursor: pointer;" id="closeButton">&times;</span>
    <span id="notificationText"> <?php {echo $warning;} ?> </span>
  </div>

  <script>
    window.onload = function() {
      var notification = document.getElementById("notification");
      var closeButton = document.getElementById("closeButton");

      closeButton.onclick = function() {
        notification.style.display = "none";
      };

      // Show the notification
      notification.style.display = "block";
      setTimeout(function() {
        notification.style.display = "none";
      }, 3000);
    };
  </script>

<!-- REDIRECTING THE WEBSITE website-->
<?php

    if ($warning == "SIGN UP SUCCESSFUL") 
    {
        // Redirecting to the office website
        $redirectUrl = "login.html";
        header("Location: " . $redirectUrl);
        exit;
    } else {

        // Redirecting to the login website
        $redirectUrl = "signup.html";
        header("Location: " . $redirectUrl);
        exit;
    }
?>

<!-- END OF PHP for signup process-->
<!-- END OF PHP for signup process-->
<!-- END OF PHP for signup process-->

