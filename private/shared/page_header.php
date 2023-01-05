  </head>  <!-- Head is opened in head.php -->
  <body>
    <div class="page-header share-container">
      <h3>Nimda</h3>
      <ul class="header-links">
        <!-- TODO: The $nbsp;'s in the Udemy link are to give the button the same width as the Tutorials link. -->
        <!--       Find a better way to make the buttons the same size rather than using whitespace.           -->
        <?php echo '<li><a class="tutorial-header-link" href="' . TUTORIAL_LINK . '">Tutorials</a></li>' ?>
        <?php echo '<li><a class="udemy-header-link" href="' . UDEMY_LINK . '">&nbsp;&nbsp;Udemy&nbsp;&nbsp;</a></li>' ?>
      </ul>
    </div>