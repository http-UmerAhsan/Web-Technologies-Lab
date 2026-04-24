<?php include 'config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("INSERT INTO students(name,email,course) VALUES('$name','$email','$course')");
    header("Location: index.php");
}
?>

<form method="POST">
    <input name="name" placeholder="Name" required>
    <input name="email" placeholder="Email" required>
    <input name="course" placeholder="Course" required>
    <button name="submit">Add</button>
</form>
