<?php 
require_once '../private/init.php';
include_once PRIVATE_PATH . 'generatable.php';
include_once SHARED_PATH . 'head.php';

echo '<link rel="stylesheet" href="' . CSS_PATH . 'about_me.css">';
?>
  </head>
  <body>
    <div class="page-heading top-level-container">
      <div class="profile-picture">
        <img src="profile_picture.jpg" alt="Caiden">
      </div>
      <div class="current-info">
        <h1>Caiden Pyle - Vulnerability Analysis \ Quality Assurance.</h1>
      </div>
    </div>
<?php include SHARED_PATH . 'terminal_text.php'; ?>

<?php include_once SHARED_PATH . 'page_footer.php'; ?>