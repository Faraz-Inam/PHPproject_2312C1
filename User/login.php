<?php 
include("../Admin/connection.php");
session_start();

if(isset($_SESSION['username'])){
    header('location: index.php');
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
        <input type="password"class="form-control" name="pass" id="sp">
        <input type="checkbox" name="" id="" onclick="showPass()">
        <button type="submit" name="login_btn" class="btn btn-primary m-2">Log In</button>
        Did not signed in yet? <a href="signup.php">Sign Up!</a>
    </form>
</body>
</html>



<?php 
if(isset($_POST['login_btn'])){
    $username = $_POST['u_name'];
    $pw = $_POST['pass'];

    $auth = "SELECT * FROM users WHERE username = '$username'";
    $query =  mysqli_query($connect, $auth);
    $row_count = mysqli_num_rows($query);
    $fetch = mysqli_fetch_assoc($query);
    $encryptedPass = $fetch['password'];


    // echo $row_count;
    if(password_verify($pw, $encryptedPass)){
    if($row_count == 1){
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['userrole'] = $fetch['role_id'];
        // $_SESSION['start_time'] = time();
        // echo "<script> window.location.href = 'userHome.php'</script>";
        if($fetch['role_id'] == 1){
            header("location: ../Admin/index.php");
        }
        else{
            header("location: index.php");
        }
    }
    else{
        echo "<p style='color: red;'> Username OR Pasword is Incorrect </p>";
    }
}

}
?>

<script>
    function showPass(){
       var sp = document.getElementById("sp");
    if(sp.type == "password"){
        sp.type = "text";
    }
    else{
        sp.type = "password";
    }
    }
</script>