<?php session_start();?>
<!DOCTYPE html>
<html lang="pl"><head>
  <link rel="icon" type="image/png" href="images/icon_img.png">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test C++</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/styleQuestion.css">
</head>
<body>
<header class="header">
      <a href="index.php" class="logo"><i class="fas fa-magic">TEST C++</i></a>
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php if(isset($_SESSION['nickname'])): ?>
            <li><a href="user_acc.php">Cześć, <?php echo htmlspecialchars($_SESSION['nickname']); ?></a></li>
          <?php else: ?>
            <li><a href="ls.php">Login/Sign up</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header> 
    <?php

include 'Questions/dbconfig.php'; // Dołącz swój plik konfiguracyjny bazy danych

$user_id = $_SESSION['user_id']; // Pobierz user_id z sesji

// Zapytanie do bazy danych
$query = "SELECT test_name, attempt_date, score FROM results WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo '<table class="user-results-table">';
echo '<tr><th>Nazwa testu</th><th>Kiedy został wykonany</th><th>Ilość uzyskanych punktów</th><th>Z możliwych</th></tr>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['test_name']) . '</td>';
    echo '<td>' . date('d-m H:i', strtotime($row['attempt_date'])) . '</td>'; // Formatuj datę
    echo '<td>' . htmlspecialchars($row['score']) . '</td>';
    echo '<td>10</td>'; // Statycznie, ponieważ każdy test ma 10 pytań
    echo '</tr>';
}

echo '</table>';
echo '<a class="wyloguj" href="logout.php">Wyloguj</a>';

$stmt->close();
$conn->close();
?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/main.js"></script>

</body></html>