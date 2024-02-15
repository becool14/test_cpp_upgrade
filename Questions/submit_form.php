<?php
include 'dbconfig.php'; // Dostosuj to do swojego pliku konfiguracyjnego bazy danych

$message = $_POST['message'];
$name = $_POST['name'];
$sub = $_POST['sub'];
$surname = $_POST['surname'];

// Server-side validation
if (strlen($name) > 50 || strlen($surname) > 50 || strlen($sub) > 100 || strlen($message) > 1500) {
    // Handle validation error
    echo "ZADUŻO!";
    exit;
}
if (strlen($name) == 0 || strlen($surname) == 0 || strlen($sub) == 0 || strlen($message) == 0) {
    // Handle validation error
    echo "Wpisz coś, proszę cię";
    exit;
}

// Inserting data into the database
$query = "INSERT INTO form_submissions (name, surname, sub, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $name, $surname, $sub, $message);
$stmt->execute();

// Wysyłanie wiadomości do bota Telegram
$telegramToken = '';
$chatId = ''; // Możesz zdobyć chat ID, pisząc wiadomość do @userinfobot na Telegramie
$telegramMessage = "Nowy formularz kontaktowy:\nImię: $name\nNazwisko: $surname\nTemat: $sub\nWiadomość: $message";

$telegramApiUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
$telegramApiData = [
    'chat_id' => $chatId,
    'text' => $telegramMessage,
];

$curl = curl_init($telegramApiUrl);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $telegramApiData);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response === false) {
    // W przypadku błędu w żądaniu do API Telegram
    echo "Błąd podczas wysyłania wiadomości na Telegram.";
} else {
    echo "success"; // Wskaż sukces
}

curl_close($curl);
$stmt->close();
$conn->close();
?>
