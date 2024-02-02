<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Your code -->
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
     
    <div class="login-container" id="loginForm">
        <form id="loginForm" action="Questions/login.php" method="POST">
            Wpisz email: <input type="email" id="lemail" name="lemail" placeholder="Wpisz email" required><br>
            Wpisz hasło: <input type="password" id="lpass" name="lpass" placeholder="Wpisz hasło" required><br>
            
            <div class="g-recaptcha" data-sitekey="6LcLWWApAAAAAAkCIpDVcdyMgBPyo96_BLuXFbdk" data-callback="enableBtn" data-expired-callback="disableBtn"></div>
            <br>
            <div class="form-footer">
                <div class="submit-container">
                    <input type="submit" value="Submit" id="submitButtonLog" disabled>
                </div>
                <div class="account-link">
                    <label><a href="#" id="showRegisterForm">Nie masz konta?</a></label>
                </div>
            </div>
        </form>
        </div>
        <div class="register-container" id="registerForm">
            <form id="registerForm" method="POST" action="Questions/register.php">
                Wymyśl nickname: <input type="text" id="rnickname" name="rnickname" placeholder="Wpisz nickname" required><br>
                Wpisz email: <input type="email" id="remail" name="remail" placeholder="Wpisz email" required><br>
                Wymyśl hasło: <input type="password" id="rpass" name="rpassword" placeholder="Wymyśl hasło" required><br>
                Powtórz hasło: <input type="password" id="rpass" name="rpassword_rep" placeholder="Wymyśl hasło" required><br>
                <div class="g-recaptcha" data-sitekey="6LcLWWApAAAAAAkCIpDVcdyMgBPyo96_BLuXFbdk" data-callback="enableBtn" data-expired-callback="disableBtn"></div>
                <br>
                <div class="form-footer">
                    <div class="submit-container">
                        <input type="submit" value="Submit" id="submitButtonReg" disabled>
                    </div>
                    <div class="account-link">
                        <label><a href="">Już masz konto?</a></label>
                    </div>
                </div>
            </form>
            </div>
            <script>
                document.getElementById("showRegisterForm").addEventListener("click", function(event){
                    event.preventDefault(); // Запобігає перехід по посиланню
                    document.getElementById("loginForm").style.display = "none"; // Приховує форму входу
                    document.getElementById("registerForm").style.display = "block"; // Показує форму реєстрації
                });
                function enableBtn() {
    document.getElementById('submitButtonLog').disabled = false;
    document.getElementById('submitButtonReg').disabled = false;
}

function disableBtn() {
    document.getElementById('submitButtonLog').disabled = true;
    document.getElementById('submitButtonReg').disabled = true;
}
<?php if(isset($_SESSION["message"])): ?>
    alert("<?php echo addslashes($_SESSION["message"]); ?>");
    <?php unset($_SESSION["message"]); // Opcjonalnie, aby wyczyścić wiadomość po wyświetleniu ?>
<?php endif; ?>
                </script>
        


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
