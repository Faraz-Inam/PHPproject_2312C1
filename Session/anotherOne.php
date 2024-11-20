<?php 
include 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is Another Home Page</h1>
    <a href="logout.php">Log Out</a>
</body>
</html>


<?php 

if((time() - $_SESSION['start_time']) > 10){
    header("location: logout.php");
}
else{
    echo "Welcome " . $_SESSION['user'];
}

?>
