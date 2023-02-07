<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';
    
    // Syntax highlighting
    echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'sql_highlighting.js" defer></script>';

    // Title and description are set in page_header.php
    $title = "Error based";
    $description = "Learn how to manually exploit SQL vulnerabilities using UNION attack.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'union-based.php';
    $home = 'sql-injection-techniques-course-home.php#tutorials';
    $next = 'inline-queries.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Error based attack overview</h1>
      <p>
        Error-based injection is an SQL injection technique that relies on error
        messages thrown by the database server to extract data or obtain information
        about the database. In some cases, attackers are able to enumerate an
        entire database using error-based injection alone.
      </p>
      <p>
        Usually, an error-based vulnerability allows an attacker to see errors thrown
        by the database in place of the data that an application is designed to display
        when a valid SQL query is made.
      </p>
      
      <h1 class="title toc">Find error-based SQL vulnerabilities</h1>
      <p>
        A web application is vulnerable to error-based SQL injection if the
        application displays SQL errors in the HTML response. To check if
        an application is vulnerable to error-based injection, we try to trigger
        an SQL error to see if it is visible in the HTML response. To do this, 
        we can use the following common payloads.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
'
ORDER BY 1
ORDER BY 2
ORDER BY 3
ORDER BY 1000
ORDER BY 1 -- 
ORDER BY 2 -- 
ORDER BY 3 -- 
ORDER BY 1000 -- 
ORDER BY 1 # 
ORDER BY 2 # 
ORDER BY 3 #
ORDER BY 1000 #</pre>

      <p>
        For example, the payload <span class="inline-code">'</span> returns the
        following error on my home web server running a vulnerable website that
        I wrote.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
You have an error in your SQL syntax; check the manual that corresponds to your
MariaDB server version for the right syntax to use near ''''' at line 1</pre>

      <p>
        The error message indicates that the server is vulnerable to error-based
        SQL injection. From the error we see that the webserver is running MariaDB,
        which is a fork of MySQL.
      </p>
      
      <h1 class="title toc">Other SQL errors</h1>
      <p>
        SQL errors can give you information about the database as well as the
        statement that is being used on the back end to query the database. For
        example, we can easily figure out how many columns are being selected
        using the absence of SQL errors in the HTML response.
      </p>
      <p>
        To see how many columns are in the select statement, we can use
        <span class="inline-code">ORDER BY x</span> statements where x is a
        natural number until we see an error in the HTML. The payload on my
        home server <span class="inline-code">' ORDER BY 3 --</span>
        returns the following error string.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
Unknown column '3' in 'order clause'</pre>

      <p>
        This error indicates that there are only two columns being selected in 
        the select statement. The payloads <span class="inline-code">' ORDER BY 1 --</span>
        and <span class="inline-code">' ORDER BY 2 --</span> did not return an error
        because 1 and 2 are valid column indexes.
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
<?php require_once SHARED_PATH . 'page_footer.php'; ?>