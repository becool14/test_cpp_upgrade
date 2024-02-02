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
  <div class="aboutus">
  <div class="container">
    <h1>Strona O nas</h1>
    <p>Kilka słów o tym kim jesteśmy i co robimy.</p>
    <p>
      Pomysł stworzenia takiego testu online dla języka programowania C++ przyszedł mi do głowy, ponieważ często korzystam z podobnych testów, aby sprawdzić swoje umiejętności, ale pisanie w C++ i tworzenie strony o temacie „Test C++” to dwie różne rzeczy, na przynajmniej jestem teraz pewien, że nigdy nie będę zajmował się tworzeniem stron internetowych. :)
    </p>
  </div>
  
  </div>
  <div class="row">
    <div class="column">
      <div class="card">
        
        <div class="container">
          <h2>Bohdan Mahas</h2>
          <p class="title">*ten kto stworzył tą stronę*</p>
          
          <p>bohdanmahas.work@gmail.com</p>
          <p><button class="button"><a href="https://www.linkedin.com/in/bohdan-mahas-ba608a294/" target="_blank">Contact</a></button></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/main.js"></script>

</body></html>