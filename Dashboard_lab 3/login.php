<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $file = fopen("users.txt", "r");

    while (!feof($file)) {
        $line = trim(fgets($file));
        $data = explode("|", $line);

        if (count($data) === 5) {
            if ($data[2] === $username && password_verify($password, $data[3])) {

                $_SESSION["name"] = $data[0];
                $_SESSION["email"] = $data[1];
                $_SESSION["username"] = $data[2];
                $_SESSION["age"] = $data[4];

                header("Location: dashboard.php");
                exit();
            }
        }
    }

    $error = "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    height:100vh;
    background: linear-gradient(135deg,#11998e,#38ef7d);
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

<div class="card p-4 shadow" style="width:350px;">
    <h3 class="text-center mb-3">Login</h3>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-success w-100">Login</button>
    </form>

    <p class="text-center mt-3">
        Don't have an account? <a href="signup.php">Signup</a>
    </p>
</div>

</body>
</html>
