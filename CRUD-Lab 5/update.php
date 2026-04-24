<?php include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id");
    header("Location: index.php");
}
?>

<form method="POST">
    <input name="name" value="<?php echo $row['name']; ?>">
    <input name="email" value="<?php echo $row['email']; ?>">
    <input name="course" value="<?php echo $row['course']; ?>">
    <button name="update">Update</button>
</form>
