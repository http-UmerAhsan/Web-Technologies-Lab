<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root {
    --main-gradient: linear-gradient(135deg, #11998e, #38ef7d);
}

body {
    background: #eef2f3;
    font-family: Arial, sans-serif;
}

/* Sidebar */
.sidebar {
    position: fixed;
    width: 220px;
    height: 100vh;
    background: var(--main-gradient);
    color: white;
    padding-top: 20px;
}

.sidebar a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

/* Main content */
.main {
    margin-left: 220px;
    padding: 20px;
}

/* Cards */
.card-custom {
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.1);
}

/* Profile avatar */
.avatar {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: var(--main-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: white;
    margin: auto;
}
</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">User Panel</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="#">Profile</a>
    <a href="#">Settings</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Main -->
<div class="main">

    <!-- Welcome -->
    <div class="p-4 mb-4 text-white rounded" style="background: var(--main-gradient);">
        <h2>Welcome, <?php echo $_SESSION["name"]; ?> 👋</h2>
        <p>This is your personal dashboard for the PHP Login System assignment.</p>
    </div>

    <div class="row">

        <!-- Profile Info -->
        <div class="col-md-8">
            <div class="card card-custom p-4">
                <h4 class="mb-3">Profile Information</h4>

                <p><strong>Full Name:</strong> <?php echo $_SESSION["name"]; ?></p>
                <p><strong>Email:</strong> <?php echo $_SESSION["email"]; ?></p>
                <p><strong>Username:</strong> <?php echo $_SESSION["username"]; ?></p>
                <p><strong>Age:</strong> <?php echo $_SESSION["age"]; ?> years</p>
            </div>
        </div>

        <!-- Avatar Card -->
        <div class="col-md-4">
            <div class="card card-custom text-center p-4">
                <div class="avatar">
                    <?php echo strtoupper(substr($_SESSION["name"],0,1)); ?>
                </div>
                <h5 class="mt-3"><?php echo $_SESSION["name"]; ?></h5>
                <p class="text-muted">@<?php echo $_SESSION["username"]; ?></p>

                <a href="logout.php" class="btn btn-danger w-100">Logout</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
