  </head>  <!-- Head is opened in head.php -->
  <body>
    <div class="top-level-container">
      <h1 class="title page-header-title">White hat hacking</h1>

      <ul class="page-header-buttons">
        <?php
            echo '<li><a><button class="blue-button">Udemy</button></a></li>';
            echo '<li><a><button class="yellow-button">About Me</button></a></li>';
            echo '<li><a href="' . HTTP_PUBLIC . 'index.php' . '"><button class="red-button">Home</button></a></li>';
        ?>
      </ul>

      <p class="header-tagline">Ethical hacking | labs | tools | techniques </p>
    </div>