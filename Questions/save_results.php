<?php
session_start();
include 'dbconfig.php'; // Dołącz swój plik konfiguracyjny bazy danych

if (!isset($_SESSION['user_id'])) {
    // Użytkownik nie jest zalogowany
    echo "Błąd: Użytkownik nie jest zalogowany.";
    exit;
}

$score = $_POST['score'];
$user_id = $_SESSION['user_id']; // Pobierz user_id z sesji
$test_name = "Test C++"; // Stała wartość dla test_name

$query = "INSERT INTO results (user_id, test_name, score, attempt_date) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("isi", $user_id, $test_name, $score);
    if ($stmt->execute()) {
        echo "Wynik zapisany pomyślnie.";
    } else {
        echo "Błąd podczas zapisywania wyniku: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Błąd przygotowania zapytania: " . $conn->error;
}

$conn->close();
?>
