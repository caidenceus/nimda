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
      <h1 class="title blue-text">Areas of Expertise</h1>
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
    
    <div class="top-level-container work-experience">
      <h1 class="title blue-text">Work Experience</h1>
      <div class="job">
        <h2 class="job-title">Vulnerability Analysis / Quality Assurance</h2>
        <h3 class="company">NetApp E-Series</h3>
        <h4 class="work-dates">04/2020 - present</h4>
        <ul>
          <li class="job-task-bullet">Created Python testing framework to reach near 100% code test coverage across all our REST APIs.</li>
          <li class="job-task-bullet">Created Python library to add Nessus and Invicti vulnerability scanning to several continuous integration pipelines including firmware builds, REST API definitions, and web proxy builds.</li>
          <li class="job-task-bullet">Design, develop, and deploy testing techniques for new features and defect patches.</li>
        </ul>
      </div>
    </div>

    <div class="top-level-container extra-experience">
      <div class="volunteer-work">
        <h1 class="title">Volunteer Work</h1>
      </div>
      <div class="personal-projects">
        <h1 class="title">Personal Projects</h1>
      </div>
    </div>

<?php include_once SHARED_PATH . 'page_footer.php'; ?>