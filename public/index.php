<?php require_once '../private/init.php'; ?>
<?php require_once SHARED_PATH . 'head.php'; ?>

<?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'index.css">'; ?>

<?php require_once SHARED_PATH . 'page_header.php'; ?>
<?php require_once SHARED_PATH . 'legal_disclaimer.php'; ?>

    <div class="learning-path-container">
      <h1 class="title">Learning Paths</h1>
    
      <div class="learning-path">
        <a class="learning-path-link">
          <h3 class="random-color">Hacking Windows</h3>
          <p>Hack Windows and write Windows computer viruses</p>
        </a>
      </div>
      <div class="learning-path">
        <a class="learning-path-link">
          <h3 class="random-color">Hacking Rest APIs</h3>
          <p>Exploit vulnerable Rest APIs</p>
        </a>
      </div>
      <div class="learning-path">
        <a class="learning-path-link">
          <h3 class="random-color">Hacking with Metasploit</h3>
          <p>Hack like a pro with the Metasploit framework</p>
        </a>
      </div>
      <div class="learning-path">
        <a class="learning-path-link">
          <h3 class="random-color">Hacking databases</h3>
          <p>Learn how to hack databases using SQL injection</p>
        </a>
      </div>
    </div> <!-- learning-path-container -->
    
    <div class="course-container share-container">
      <h1 class="title">Courses</h1>

      <h3 class="sub-title">SQL injection</h3>
      <div class="course">
        <div class="center-text">
          <a class="course-link random-color">
            Time-based attack
          </a>
        </div>
      </div>
      <div class="course">
        <div class="center-text">
          <?php 
              $course_path = COURSE_PATH . "sqlInjection/" . 'error_based_attack.php';
              echo '
                  <a href="' . $course_path . '" class="course-link random-color">
                    Error-based attack
                  </a>';
          ?>
        </div>
      </div>
      <div class="course">
        <div class="center-text">
          <?php 
              $course_path = COURSE_PATH . "sqlInjection/" . 'union_based_attack.php';
              echo '
                  <a href="' . $course_path . '" class="course-link random-color">
                    Union-based attack
                  </a>';
          ?>
        </div>
      </div>
      <div class="course">
        <div class="center-text">
          <?php 
              $course_path = COURSE_PATH . "sqlInjection/" . 'boolean_based_attack.php';
              echo '
                  <a href="' . $course_path . '" class="course-link random-color">
                    Boolean-based attack
                  </a>';
          ?>
        </div>
      </div>
      <div class="course">
        <div class="center-text">
          <?php 
              $course_path = COURSE_PATH . "sqlInjection/" . 'stacked_query_attack.php';
              echo '
                  <a href="' . $course_path . '" class="course-link random-color">
                    Stacked query attack
                  </a>';
          ?>
        </div>
      </div>
      <div class="course">
        <div class="center-text">
          <?php 
              $course_path = COURSE_PATH . "sqlInjection/" . 'out_of_band_attack.php';
              echo '
                  <a href="' . $course_path . '" class="course-link random-color">
                    Out-of-band attack
                  </a>';
          ?>
        </div>
      </div>
      <div class="course">
        <div class="center-text">
          <?php 
              $course_path = COURSE_PATH . "sqlInjection/" . 'sqlmap_basics.php';
              echo '
                  <a href="' . $course_path . '" class="course-link random-color">
                    Sqlmap basics
                  </a>';
          ?>
        </div>
      </div>
    </div> <!-- course-container -->

<?php require_once SHARED_PATH . 'page_footer.php'; ?>