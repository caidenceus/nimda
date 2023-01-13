<?php 
require_once '../private/init.php';
include_once PRIVATE_PATH . 'generatable.php';
include_once SHARED_PATH . 'head.php';

echo '<link rel="stylesheet" href="' . CSS_PATH . 'about_me.css">';

include_once SHARED_PATH . 'page_header.php';
$terminal_text = 'git checkout about-me';
include SHARED_PATH . 'terminal_text.php';
?>
    <div class="page-heading top-level-container">
      <div class="profile-picture">
        <img src="profile_picture.jpg" alt="Caiden">
      </div>
      <div class="current-info">
        <h1>Caiden Pyle - Vulnerability Analysis \ Quality Assurance.</h1>
      </div>
    </div>

    <?php 
    $terminal_text = 'sudo apt-get install -y kali-root-login';
    include SHARED_PATH . 'terminal_text.php';
    ?>

    <div class="top-level-container">
      <h1 class="title">Areas of Expertise</h1>
      <div class="expertise-container">
      <?php
      $areas = array(
          'Agile Software Development',
          'Scrum & Agile Methodologies',
          'Consuming REST APIs',
          'Software Development Lifecycle',
          'Web Application Design & Development',
          'Software Testing',
          'Socket Programming'
      );
      
      foreach ($areas as $area) {
          echo '<div class="expertise-area"><p>' . $area . '</p></div>';
      }
      ?>
      </div>
    </div>
    <div class="top-level-container experience-flexbox-root">
      <div class="work-experience">
        <h1 class="title">Work Experience</h1>
      </div>
      <div class="personal-projects">
        <h1 class="title">Personal Projects</h1>
      </div>
    </div>

<?php include_once SHARED_PATH . 'page_footer.php'; ?>