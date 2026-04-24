<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Student Dashboard</h1>
<a href="create.php">Add Student</a>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Actions</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM students");

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['course']}</td>
        <td>
            <a href='update.php?id={$row['id']}'>Edit</a>
            <a href='delete.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
?>

</table>

</body>
</html>
