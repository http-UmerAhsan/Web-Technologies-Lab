<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $age = $_POST["age"];

    $line = "$name|$email|$username|$password|$age\n";
    file_put_contents("users.txt", $line, FILE_APPEND);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    height:100vh;
    background: linear-gradient(135deg,#ff9966,#ff5e62);
    display:flex;
    align-items:center;
    justify-content:center;
}
.card{
    border-radius:15px;
}
</style>
</head>

<body>

<div class="card p-4 shadow" style="width:400px;">
    <h3 class="text-center mb-3">Create Account</h3>

    <form method="POST">
        <input type="text" name="name" class="form-control mb-2" placeholder="Full Name" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <input type="number" name="age" class="form-control mb-3" placeholder="Age" required>

        <button class="btn btn-danger w-100">Signup</button>
    </form>

    <p class="text-center mt-3">
        Already have an account? <a href="login.php">Login</a>
    </p>
</div>

</body>
</html>
