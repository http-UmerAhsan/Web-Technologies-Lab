<?php
include "config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    mysqli_query($conn, "UPDATE employees SET
        name='$name',
        email='$email',
        position='$position',
        salary='$salary'
        WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Employee</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Edit Employee</h2>
<form method="POST">
    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control mb-2" required>
    <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control mb-2" required>
    <input type="text" name="position" value="<?= $row['position'] ?>" class="form-control mb-2" required>
    <input type="number" name="salary" value="<?= $row['salary'] ?>" class="form-control mb-3" required>
    <button name="update" class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
