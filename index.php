<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <link rel="icon" type="image/png" href="images/icon_img.png">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test C++</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/styleQuestion.css" />
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
    <section id="home" class="home">
      <h1 class="banner">Prosty test dla początkujących</h1>
      <h3 class="slogan">Spróbuj sam!</h3>
      <?php if(isset($_SESSION['nickname'])): ?>
        <a href="Questions/question1.php">
        <button class="button">Rozpocznij!</button></a
      >
          <?php else: ?>
            <a href="ls.php">
        <button class="button">Rozpocznij!</button></a
      >
          <?php endif; ?>

    </section>
    <script><?php if(isset($_SESSION["message"])): ?>
    alert("<?php echo addslashes($_SESSION["message"]); ?>");
    <?php unset($_SESSION["message"]); // Opcjonalnie, aby wyczyścić wiadomość po wyświetleniu ?>
<?php endif; ?></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
