<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Union based";
    $description = "Learn how to manually exploit SQL vulnerabilities using UNION attack.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'stacked-queries.php';
    $home = 'sql-injection-techniques-course-home.php#tutorials';
    $next = 'union-based.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Union based attack overview</h1>
      <p>
        A SQL Union-based attack is a method where the attacker uses the
        <span class="inline-code">UNION</span> keyword in order to extract
        data from other tables in the database. Note that this is only possible
        if there is an injection point and the website returns the results
        of the SQL queries in the response.
      </p>
      <p>
        Aditionally, there are two more requirements for a successful union attack.
      </p>
      <ul>
        <li>The UNION statement must contain the same number of columns as the original SELECT statement</li>
        <li>The data types in the UNION statement must be compatible with those in the SELECT statement</li>
      </ul>
      <p>
        This means, for example, that if the select statemtn we are injecting to
        returns three columns of data of type <span class="inline-code">VARCHAR(20)
        </span>, then we can only extract three columns at a time that are data
        types that are compatible with <span class="inline-code">VARCHAR(20)</span>;
        for instance, <span class="inline-code">CHAR(n)</span> where n &leq; 20.
      </p>

    </div>

    <?php include SHARED_PATH . 'tutorial_navigation.php'; ?>
    <div class="course-top-level-container">
    <?php
        $tags = array(
            'Sqlmap',
            'Python3',
            'Debian Linux',
            'Bash'
        );
        
        generate_technology_tags($tags);
    ?>
    </div>

<?php require_once SHARED_PATH . 'page_footer.php'; ?>