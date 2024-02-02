<?php
session_start();
include 'dbconfig.php';

$nickname = $_POST['rnickname'];
$email = $_POST['remail'];
$password = $_POST['rpassword'];
$rep_password = $_POST['rpassword_rep'];

// Walidacja haseł
if ($password != $rep_password) {
    $_SESSION['message'] = "Hasła nie pasują do siebie.";
    header("Location: ../ls.php");
    exit;
}

// Walidacja formatu email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Nieprawidłowy email.";
    header("Location: ../ls.php");
    exit;
}

// Inicjalizacja cURL dla weryfikacji e-maila
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=475e3bf4f77648598ecacd195997dc4d&email=' . urlencode($email));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
curl_close($ch);

// Dekodowanie odpowiedzi JSON
$verificationResult = json_decode($data, true);

// Sprawdzenie czy e-mail jest prawidłowy
if ($verificationResult && $verificationResult['is_smtp_valid']['value'] == false) {
    $_SESSION['message'] = "Wprowadź prawidłowy email.";
    header("Location: ../ls.php");
    exit;
}

// Hashowanie hasła
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Dodawanie nowego użytkownika
$sql = "INSERT INTO users (nickname, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nickname, $email, $hashedPassword);

if ($stmt->execute()) {
    $_SESSION['message'] = "Jesteś zarejestrowany, zaloguj się!";
    header("Location: ../ls.php");
} else {
    $_SESSION['message'] = "Błąd rejestracji: " . $conn->error;
    header("Location: ../ls.php");
}

$stmt->close();
$conn->close();
?>
