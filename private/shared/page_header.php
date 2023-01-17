    <?php
        if (! isset($title)) { $title = "White Hat Hacking"; }
        echo "<title>$title</title>";
    ?>
  </head>  <!-- Head is opened in head.php -->
  <body>
    <div class="top-level-container">
      <div>
        <h1 class="title page-header-title">White hat hacking</h1>

        <ul class="page-header-buttons">
          <?php
              echo '<li><a href="' . HTTP_PUBLIC . 'index.php"><button class="red-background red-button-hover-invert">Home</button></a></li>';
              echo '<li><a href="' . HTTP_PUBLIC . 'about-me.php"><button class="yellow-background yellow-button-hover-invert">About Me</button></a></li>';
              echo '<li><a><button class="blue-background blue-button-hover-invert">Udemy</button></a></li>';
          ?>
        </ul>
      </div>

      <p class="header-tagline">Ethical hacking | labs | tools | techniques </p>
    </div>