<?php 
session_start();
include "db-connect.php";


if (!isset($_POST['username']) || !isset($_POST['password'])) {
    echo "<h2>Invalid parameter</h2>";
    echo "<p>Login <a href='index.php'>Again</a></p>";
    exit;
}


$email = htmlspecialchars(trim($_POST["username"]));
$passw = $_POST["password"];


$stmt = $conn->prepare("SELECT * FROM user_account WHERE username = ?");
if (!$stmt) {
    error_log("Prepare failed: " . $conn->error);
    die("Database error");
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    error_log("User not found: " . $email);
    $_SESSION["is_authenticated"] = false;
    echo "<script>alert('User not found!'); window.location.href = './';</script>";
    exit;
}


$user = $result->fetch_assoc();
$hashpassword = $user["password"];


if (password_verify($passw, $hashpassword)) {
    error_log("Password matched for: " . $email);
} else {
    error_log("Invalid password for: " . $email);
}

if (!password_verify($passw, $hashpassword)) {
    $_SESSION["is_authenticated"] = false;
    echo "<script>alert('Invalid password!'); window.location.href = './';</script>";
    exit;
}

$_SESSION["is_authenticated"] = true;
$_SESSION["user_id"] = $user["id"];
$_SESSION["username"] = $user["username"];
$_SESSION["email"] = $email;

error_log("Login successful for: " . $email);
header("Location: dash.php");
exit;
?>
