<?php require_once '../private/init.php'; ?>
<?php require_once PRIVATE_PATH . 'generatable.php'; ?>
<?php require_once SHARED_PATH . 'head.php'; ?>

<?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'index.css">'; ?>
<?php echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'randomColors.js" defer></script>' ?>

<?php require_once SHARED_PATH . 'page_header.php'; ?>
<?php require_once SHARED_PATH . 'legal_disclaimer.php'; ?>

    <div class="learning-path-container top-level-container">
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

    <div class="course-container top-level-container">
      <h1 class="title">Courses</h1>

      <h3 class="sub-title">SQL injection</h3>
        <?php 
            generate_course_link('SQL injection techniques', 'sql-injection');
            generate_course_link('Sqlmap', 'sql-injection'); 
        ?>
    </div> <!-- course-container -->

<?php require_once SHARED_PATH . 'page_footer.php'; ?>