<?php
include_once("config.php");

// Step 1: Load user data based on email GET param
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = "SELECT email, password FROM users1 WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Step 2: Process form submission to update email and password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldEmail = $_POST['old_email'];
    $newEmail = $_POST['email'];
    $password = $_POST['password'];

    if ($newEmail && $password && $oldEmail) {

        $sql = "UPDATE users1 SET email = :newEmail, password = :password WHERE email = :oldEmail";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':newEmail', $newEmail);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':oldEmail', $oldEmail);
        $stmt->execute();

        header('Location: dashboard.php');
        exit();
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST" action="udb.php?email=<?= htmlspecialchars($email) ?>">
    <input type="hidden" name="old_email" value="<?= htmlspecialchars($email) ?>">

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

    <label for="password">New Password:</label><br>
    <input type="password" id="password" name="password" placeholder="Enter new password" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
