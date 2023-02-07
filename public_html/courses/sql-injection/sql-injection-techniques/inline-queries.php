<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';
    
    // Syntax highlighting
    echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'sql_highlighting.js" defer></script>';

    // Title and description are set in page_header.php
    $title = "Inline queries";
    $description = "Learn how to manually exploit SQL inline query vulnerabilities.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'error-based.php';
    $home = 'sql-injection-techniques-course-home.php#tutorials';
    $next = 'union-based.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Inline query overview</h1>
      <p>
        In the context of SQL injection, an inline query vulnerablity is a 
        scenario where you can inject pure SQL without a prefix (such as 
        <span class="inline-code">'</span>) or a suffix (such as 
        <span class="inline-code">--</span>) and the injected query executes.
        A good way to think about inline queries is if the payload <span class="inline-code">
        SELECT version()</span> or <span class="inline-code">SELECT @@version</span>
        executes without error, then the backend is vulnerable to inline query
        SQL injection.
      </p>
      
      <h1 class="title toc">Vulnerable inline query code</h1>
      <p>
        Below are two examples of code that is vulnerable to an inline query
        injection.
      </p>

<pre class="lang-php default-code-style dark-mode-background">
# Full inline query
mysqli_query($_GET['sql'])

# Restricted inline query
mysqli_query("SELECT * FROM users WHERE id=(" . $_GET['id'] . ")")</pre>

      <p>
        Notice the parentheses around <span class="inline-code">$_GET['id']</span>
        on the second line. These are important, because without them SQL will
        not allow an inline query to execute.
      </p>
      
      <h1 class="title toc">Inline query severity</h1>
      <p>
        The severity of an inline query vulnerability depends on the vulnerable
        code. For instance, in the previous example, the first line of code
        vulnerable to an inline query attack is likely to be more severe than
        the second. This is because the second is restricted to <span class="inline-code">
        SELECT</span> statements only, whereas the first allows any valid SQL to
        execute against the database (dropping tables, for example).
      </p>
      <p>
        Similarly, the severity of the second statement will depend on factors
        such as whether database errors are enabled and displayed, and if
        selected data is visible in the HTML response or not. Even if data
        is visible in the HTML response, the selected data in the inline query
        may be filtered by the parent SQL statement, and or restricted by
        column datatypes.
      </p>
      
      <h1 class="title toc">Why inline query attacks are unpopular</h1>
      <p>
        Let's talk about the two examples presented and discuss why they are
        unpopular individually. First, it does not take a cybersecurity expert
        to know that the code <span class="inline-code">mysqli_query($_GET['sql'])</span>
        is obviously a bad idea in production. Letting anyone in the world execute
        any SQL statement against your database will probably result in a databreach
        within a matter of hours.
      </p>
      <p>
        Because this code is such a bad practice, it is rarely encountered in the
        wild. Second, while <span class="inline-code">
        mysqli_query("SELECT * FROM users WHERE id=(" . $_GET['id'] . ")")</span>
        is much more common to see in production, attackers are limited to 
        injecting SELECT statements only. On top of this limitation, SELECT statements
        are only useful if we can see errors and or results in the HTML response.
        Because the SELECT statements that will work on an inline query vulnerability
        are further limited by column data types and the parent SQL stement, even
        if errors or table data are visible in the HTML response, these restrictions
        limit what we can actually do with the vulnerability.
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