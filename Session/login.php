<?php 
include 'connection.php';
session_start();

if(isset($_SESSION['user'])){
    header('location: userHome.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post" class="col-4 mx-auto">
        <label for="">Username</label>
        <input type="text" class="form-control" name="u_name">
        <label for="">Password</label>
        <input type="password"class="form-control" name="pass">
        <button type="submit" name="login_btn" class="btn btn-primary m-2">Log In</button>
        Did not signed in yet? <a href="signup.php">Sign Up!</a>
    </form>
</body>
</html>

<?php 
if(isset($_POST['login_btn'])){
    $username = $_POST['u_name'];
    $pw = $_POST['pass'];

    $auth = "SELECT * FROM users WHERE username = '$username' AND password = '$pw'";
    $query =  mysqli_query($conn, $auth);
    $row_count = mysqli_num_rows($query);



    // echo $row_count;

    if($row_count == 1){
        $_SESSION['user'] = $username;
        $_SESSION['start_time'] = time();
        // echo "<script> window.location.href = 'userHome.php'</script>";
        header("location: userHome.php");
    }
    else{
        echo "<p style='color: red;'> Username OR Pasword is Incorrect </p>";
    }
}
?>