<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body>
<form action="" method="POST" class="col-4 m-auto">
   <legend>Sign Up / Registration Form</legend>

<label for="">First Name</label>
<input type="text" class="form-control" name="fname" required>

<label for="">Last Name</label>
<input type="text" class="form-control" name="lname" required>

<label for="">Date Of Birth</label>
<input type="date" name="dob" class="form-control" required>

<label for="">Gender</label>
<select name="gender" class="form-control" required>
    <option value="">Select Gender</option>
    <option value="M">Male</option>
    <option value="F">Female</option>
</select>

<label for="">User Name</label>
<input type="text" class="form-control" name="username" required>

<label for="">E-mail</label>
<input type="text" class="form-control" name="email" required>

<label for="">Password</label>
<input type="password" class="form-control" name="password" id="pass" required>

<label for="">Confirm Password</label>
<input type="password" class="form-control" name="c_password" id="c_pass" required>

<button type="submit" class="btn btn-info m-2" name="logInBtn" onclick="return verify_pass()">Sign Up</button>
</form>
</body>
</html>

<?php 
if(isset($_POST['logInBtn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = 2;

    $regd = "INSERT INTO `users`(`first_name`, `last_name`, `gender`, `date_of_birth`, `username`, `email`, `password`, `role_id`)
    VALUES ('$fname','$lname','$gender','$dob','$username','$email','$password','$roleId')";
    $done = mysqli_query($conn, $regd);

    if($done){
        echo "<script>
        alert('Registered Successfully');
        window.location.href = 'login.php';
        </script>";
    }
}
?>