<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <div class="container">
    <form id="myForm" onsubmit="return submitForm()">
        Imię: <input type="text" id="fname" name="firstname" placeholder="Wpisz imię"><br>
        Nazwiśko: <input type="text" id="lname" name="lastname" placeholder="Wpisz nazwiśko"><br>
        Kierunek: <input type="text" id="sub" name="sub" placeholder="Wpisz swój kierunek"><br>
        Wiadomość: <textarea id="message" name="message" placeholder="Możesz zaznaczyć tutaj swój email"></textarea><br>
        <div class="g-recaptcha" data-sitekey="6LcLWWApAAAAAAkCIpDVcdyMgBPyo96_BLuXFbdk"></div>
        <br>
        <input type="submit" value="Submit">
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
function submitForm() {
    var formData = {
        name: $('#fname').val(),
        surname: $('#lname').val(),
        sub: $('#sub').val(),
        message: $('#message').val(),
        'g-recaptcha-response': grecaptcha.getResponse() // Dodaj pole reCAPTCHA
    };

    $.ajax({
        type: 'POST',
        url: 'Questions/submit_form.php',
        data: formData,
        success: function(response) {
            if (response === 'success') {
                alert('Wiadomość została wysłana! Dziękuję!');
                $('#myForm')[0].reset();
            } else {
                alert('Error: ' + response);
            }
        }
    });

    return false; // Prevent default form submission
}
    </script>
</body>
</html>
