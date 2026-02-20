<?php
include "config.php";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    mysqli_query($conn, "INSERT INTO employees (name,email,position,salary)
    VALUES ('$name','$email','$position','$salary')");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Employee</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Add Employee</h2>
<form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="text" name="position" class="form-control mb-2" placeholder="Position" required>
    <input type="number" name="salary" class="form-control mb-3" placeholder="Salary (PKR)" required>
    <button name="submit" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
