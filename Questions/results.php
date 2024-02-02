<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="questions.js"></script>
    <link rel="icon" type="image/png" href="../images/icon_img.png">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Results</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="../style/styleQuestion.css" />
  </head>
  <body>
  <header class="header">
      <a href="../index.php" class="logo"><i class="fas fa-magic">TEST C++</i></a>
      <nav class="navbar">
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../about.php">About</a></li>
          <li><a href="../contact.php">Contact</a></li>
          <?php if(isset($_SESSION['nickname'])): ?>
            <li><a href="../user_acc.php">Cześć, <?php echo htmlspecialchars($_SESSION['nickname']); ?></a></li>
          <?php else: ?>
            <li><a href="../ls.php">Login/Sign up</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
    <div class="result-container">
      <div id="result">
        <!-- Results will be displayed here -->
    </div>
      <div id="result"></div>
      <div class="correct-answers">Prawidłowe odpowiedzi:</div>
      <ul>
        <li>
          Jaka jest składnia deklarowania zmiennej całkowitej w C++?
          <ul>
            <li>a) int x;</li>
          </ul>
        </li>

        <li>
          Jak zdefiniować stałą w C++?
          <ul>
            <li>c) const int x;</li>
          </ul>
        </li>

        <li>
          Jaki jest cel obiektu „cin” w C++?
          <ul>
            <li>a) Wejście z konsoli.</li>
          </ul>
        </li>

        <li>
          Które słowo kluczowe jest używane do tworzenia funkcji w C++?
          <ul>
            <li>b) function</li>
          </ul>
        </li>

        <li>
          Jaki jest wynik 5 + 3 w C++?
          <ul>
            <li>a) 8</li>
          </ul>
        </li>

        <li>
          Jak skomentować pojedynczą linię w C++?
          <ul>
            <li>b) // This is a comment</li>
          </ul>
        </li>

        <li>
          Do czego służy instrukcja „if” w C++?
          <ul>
            <li>c) Podejmowanie decyzji</li>
          </ul>
        </li>

        <li>
          Jaki typ danych jest używany do przechowywania liczb dziesiętnych w C++?
          <ul>
            <li>a) float</li>
          </ul>
        </li>

        <li>
          Co robi operator „++” w C++?
          <ul>
            <li>b) Zwiększa zmienną o 1.</li>
          </ul>
        </li>

        <li>
          Jak zadeklarować i zainicjować tablicę w C++ z 5 elementami?
          <ul>
            <li>b) int array[5];</li>
          </ul>
        </li>
      </ul>
    </div>
   

    <script>
        $(document).ready(function() {
          showResults();
        });
    </script>
  </body>
</html>
