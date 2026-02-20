<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Employee Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4 text-center">Employee Management System</h2>
<a href="create.php" class="btn btn-success mb-3">Add Employee</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Position</th>
        <th>Salary (PKR)</th>
        <th>Action</th>
    </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM employees ORDER BY id DESC");
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['position'] ?></td>
    <td><?= number_format($row['salary']) ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
