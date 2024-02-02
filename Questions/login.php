<?php
session_start();
include 'dbconfig.php'; // Підключення до бази даних

$email = $_POST['lemail'];
$password = $_POST['lpass'];

// Валідація введених даних
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Email nie prawidłowy.";
    //header("Location: ../ls.html"); // Повернення на сторінку логіну
    exit;
}

// Перевірка користувача в базі даних
$sql = "SELECT id, nickname, password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Перевірка пароля
    if (password_verify($password, $user['password'])) {
        // Автентифікація успішна
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nickname'] = $user['nickname'];
        header("Location: ../index.php");
    } else {
        $_SESSION['message'] = "Nie p. hasło.";
        header("Location: ../ls.php");
    }
} else {
    $_SESSION['message'] = "Usera nie znalieziono.";
    header("Location: ../ls.php");
}

$stmt->close();
$conn->close();
?>
