<?php 
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'head.php';

    echo '<link rel="stylesheet" href="' . CSS_PATH . 'course.css">';
    echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'todo_md_animation.js" defer></script>';

    // Title and description are set in page_header.php
    $title = "Sqlmap course";
    $description = "Learn how to hack databases using Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    $terminal_text = 'cd sqlmap-dev';
    include SHARED_PATH . 'terminal_text.php';

    include_once SHARED_PATH . 'legal_disclaimer.php';

    $terminal_text = 'python3 sqlmap.py -hh';
    include SHARED_PATH . 'terminal_text.php';
?>

    <div class="course-top-level-container dark-purple-background-color preface">
      <h1 class="title white-text">Sqlmap</h1>
      <p class="course-preface-text white-text">
        SQL Injection is one of the most common attack vectors against web-based
        targets, and arguably one of the most important. With modern day computing
        and the move to hosting businesses online, there is a goldmine of vulnerable
        websites and web applications hosted on the internet today. Common among
        vulnerable websites is a vulnerability called <i>SQL injection</i>, a
        method of purposefully sending malformed input data to an application in
        order to steal database information and or compromise the underlying system.      
      </p>
      <p class="course-preface-text white-text">
        In this course we will be using Sqlmap, a popular SQL injection tool, in
        order to compromise vulnerable websites and steal data from vulnerable web
        applications and databases. The vulnerable websites will be websites that
        I wrote myself for the purpose of this tutorial, so it is completely legal
        to exploit these applications. In the labs section I will walk you through
        how to setup your own home SQL injection lab and install a LAMP server to
        run vulnerable websites on, as well as how to use Sqlmap to exploit them.
      </p>
    </div>

    <div class="course-top-level-container">
      <div class="tutorial-container" id="tutorials">
        <h1 class="title blue-text file-name-header">Tutorials.md</h1>
        <?php
            echo '<p class="tutorial-todo-level"><b>## Beginner</p></b>';
            $tutorials = array(
                'Install sqlmap',
                'Sqlmap basic commands',
                'Finding SQL injection vulnerabilities',
                'Change the HTTP user agent',
                'Stealing DBMS usernames and passwords',
                'Dumping database tables',
                'Introduction to database takeover',
                'File injection',
                'Arbitrary command execution',
                'Privilege escalation'
            );
            generate_tutorial_links($tutorials);
        ?>
      </div>
    </div>

    <div class="course-top-level-container">
      <div class="lab-container">
        <h1 class="title blue-text file-name-header">Labs.md</h1>
      </div>
    </div>
    
    <div class="course-top-level-container">
    <?php
        $tags = array(
            'Sqlmap',
            'Python3',
            'Git',
            'Debian Linux',
            'Bash'
        );
        
        generate_technology_tags($tags);
    ?>
    </div>

<?php require_once SHARED_PATH . 'page_footer.php'; ?>