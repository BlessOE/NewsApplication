<?php include_once('header.php') ?>

<?php
include("session2.php");

$path = "login.php"; //this path is to pass to checkSession function from session.php 

session_start(); //must start a session in order to use session in this page.
if (!isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
    header("Location:" . $path); //return to the login page
}

$user = $_SESSION['email'];
// $userFN = $_SESSION['first_name'];
// $userLN = $_SESSION['last_name'];
checkSession($path); //calling the function from session.php

$userId = $_GET['user_id'];
$userFN = $_GET['first_name'];
$userLN = $_GET['last_name'];


$db = new SQLite3('C:\xampp\Data\news.db');
$sql = 'SELECT * FROM user WHERE user_id=:userId'; // OR StdName=:stdName'
$stmt = $db->prepare($sql);
$stmt->bindParam(':userId', $userID, SQLITE3_INTEGER);
$res = $stmt->execute();
$userRes = [];
while ($row = $res->fetchArray()) {

    $userRes[] = $row; //should only have 1 record
}
//print_r($studRes);
?>

<header>
    <div id="logo">
        <!-- logo -->
    </div>
    <nav>
        <ul>
            <li><a href="login.php"></a>Login</li>
            <li><a href="createAccount.php"></a>Sign-up</li>
        </ul>
    </nav>
</header>

<head>
    <title>News | Edit Profile</title>
</head>

<body>
    <div>
        <h1>Edit Profile</h1>

        <div>
            <div class="formEA">
                <div class="input">
                    <div>
                        <input type="hidden" name="userId" value="<?php echo $userRes[0]['user_id'] ?>" />
                    </div>
                    <div>
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?php echo $userRes[0]['first_name'] ?>" required>
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?php echo $userRes[0]['last_name'] ?>" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $userRes[0]['email'] ?>" required>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="pwd_1" required>
                    </div>
                    <div>
                        <label>City</label>
                        <input type="text" name="city" value="<?php echo $userRes[0]['city'] ?>" required>
                    </div>
                </div>
            </div>
            <div>
                <a class="button" href="userProfile.php">Update Account</a>
            </div>
        </div>
    </div>
</body>

</html>