<?php 
    require_once '../private/init.php';
    include_once PRIVATE_PATH . 'generatable.php';
    include_once SHARED_PATH . 'head.php';

    echo '<link rel="stylesheet" href="' . CSS_PATH . 'index.css">';

    include_once SHARED_PATH . 'page_header.php';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';

    $terminal_text = 'git clone git@github.com:caidenceus/sql-injection-labs.git';
    include SHARED_PATH . 'terminal_text.php';
?>

    <div class="learning-path-container top-level-container">
      <h1 class="title blue-text">Learning Paths</h1>
      <?php
          generate_learning_path_link('Hacking databases', 'Exploit vulnerable databases with different attack vectors', '');
          generate_learning_path_link('Hacking Websites', 'Learn how to attack web-based targets', '');
          generate_learning_path_link('Hacking Windows', 'Hack Windows and write Windows computer viruses', '');
          generate_learning_path_link('Hacking REST APIs', 'Exploit vulnerable REST APIs', '');
      ?>
    </div> <!-- learning-path-container -->

    <?php
        $terminal_text = 'perl nikto.pl -u 127.0.0.1';
        include SHARED_PATH . 'terminal_text.php';
    ?>

    <div class="course-container top-level-container">
      <h1 class="title blue-text">Courses</h1>
      <h3 class="sub-title">SQL injection</h3>
      <?php 
          generate_course_link('SQL injection techniques', 'sql-injection');
          generate_course_link('Sqlmap', 'sql-injection'); 
          generate_course_link('Metasploit SQL injection modules', 'sql-injection');
      ?>
    </div> <!-- course-container -->

<?php include_once SHARED_PATH . 'page_footer.php'; ?>