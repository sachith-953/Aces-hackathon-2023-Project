<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'test3';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()){
    exit('Error connecting the database ' . mysqli_connect_error());

}

if(!isset($_POST['username'], $_POST['password'], $_POST['email'])){
    echo "{$_POST['username']}";
    exit('Empty field(s)');

}

if(empty($_POST['username'] || $_POST['password'] || $_POST['email'] )){
    exit('Empty values');

}


if($stmt = $con ->prepare('SELECT seller_id FROM sellers WHERE username = ?')){ // Here, It should be ok to duplicate the usermame since we use IDs, Just remove it later.if you need.
   
    $stmt-> bind_param('s', $_POST['username']);
    // Set parameters for above statement.
    $stmt-> execute();
    $stmt-> store_result();
    // Store results in statement to use later.

    if($stmt-> num_rows > 0){// Result of executing the statement is used here.
        echo 'Username already exist';

    }else{
        if($stmt = $con-> prepare('INSERT INTO sellers (username, email, password) VALUES (?, ? ,?)')){
           // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password = $_POST["password"];
            $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
            $stmt->execute();

            echo 'Successfully registered!';

            header("Location: add.html");

        }else{
            echo 'Error occurred';

        }
    }

    $stmt->close();
}else{
    echo 'Error occurred';
}

$con->close();

// Process the form data if needed

// Redirect to the desired webpage

?>
