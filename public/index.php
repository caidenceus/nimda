<?php 
require_once '../private/init.php';
include_once PRIVATE_PATH . 'generatable.php';
include_once SHARED_PATH . 'head.php';

echo '<link rel="stylesheet" href="' . CSS_PATH . 'index.css">';

include_once SHARED_PATH . 'page_header.php';
include SHARED_PATH . 'terminal_text.php';
include_once SHARED_PATH . 'legal_disclaimer.php';

$terminal_text = 'cd learning-paths';
include SHARED_PATH . 'terminal_text.php';
?>

    <div class="learning-path-container top-level-container">
<?php
generate_learning_path_link('Hacking Windows', 'Hack Windows and write Windows computer viruses', '');
generate_learning_path_link('Hacking Rest APIs', 'Exploit vulnerable Rest APIs', '');
generate_learning_path_link('Metasploit and Meterpreter', 'Hack like a pro with the Metasploit framework', '');
generate_learning_path_link('Hacking databases', 'Learn how to hack databases using SQL injection', '');
?>
    </div> <!-- learning-path-container -->

<?php
$terminal_text = 'cd courses';
include SHARED_PATH . 'terminal_text.php';
?>

    <div class="course-container top-level-container">
      <h3 class="sub-title">SQL injection</h3>
<?php 
generate_course_link('SQL injection techniques', 'sql-injection');
generate_course_link('Sqlmap', 'sql-injection'); 
?>
    </div> <!-- course-container -->

<?php include_once SHARED_PATH . 'page_footer.php'; ?>