<?php 

require_once 'relative_init.php';
include_once SHARED_PATH . 'head.php';

echo '<link rel="stylesheet" href="' . CSS_PATH . 'course.css">';
echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'todo_md_animation.js" defer></script>';

include_once SHARED_PATH . 'page_header.php';

$terminal_text = 'cd sqlmap';
include SHARED_PATH . 'terminal_text.php';

include_once SHARED_PATH . 'legal_disclaimer.php';

$terminal_text = 'python3 sqlmap.py -hh';
include SHARED_PATH . 'terminal_text.php';

?>

    <div class="course-top-level-container">
      <h1 class="title blue-text">Sqlmap</h1>
      <p>
        Sqlmap is an open source ethical hacking tool written in Python that is 
        used to help automate detecting and exploiting SQL vulnerabilities.
        Its features range from detecting vulnerable HTML form parameters, to 
        enumerating database users, to completely taking over a database server.      
      </p>
      <p>
        At the time of this writing, sqlmap fully supports six different 
        injection techniques, which are Boolean-based blind, 
        time-based blind, error-based, UNION query-based, stacked queries and 
        out-of-band. Each of these techniques are covered in more depth on their
        respective tutorial pages.
      </p>
    </div>
    
    <div class="course-top-level-container">
      <?php
          $tags = array(
              'Sqlmap',
              'Python',
              'Git',
              'Debian Linux',
              'Bash'
          );
          
          generate_technology_tags($tags);
      ?>
    </div>

    <div class="course-top-level-container">
      <div class="tutorial-container">
        <h1 class="title blue-text">Tutorials.md</h1>
        <?php
            echo '<p><b>## Beginner</p></b>';
            $tutorials = array(
                'Install sqlmap',
                'Sqlmap basic commands',
                'Detecting form parameters',
                'Bypassing web application firewalls',
                'Enumerating database usernames and passwords',
                'Dumping database tables',
                'Introduction to database takeover',
                'File injection',
                'Arbitrary command execution',
                'Privilege escalation'
            );
            generate_tutorial_links($tutorials);
        ?>
      </div>
      
      <div class="course-top-level-container education-content-container">
        <div class="vertical-column">
          <div class="education-content">
            <h1 class="title education-title">Labs.md</h1>
          </div>
        </div>
      </div>

<?php require_once SHARED_PATH . 'page_footer.php'; ?>