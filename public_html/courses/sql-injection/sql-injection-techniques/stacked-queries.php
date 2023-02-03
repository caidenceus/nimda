<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Stacked queries";
    $description = "Learn how to manually exploit SQL vulnerabilities using stacked queries.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'payload-prefixes-and-suffixes.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'specify-injection-techniques.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Stacked queries overview</h1>
      <p>
        Stacked queries is a technique whereby an attacker terminates the original
        query and injects a new one. In SQL a semicolon indicates the end of a statement
        has been reached and that what follows is the beginning of a new statement.
      </p>
      <p>
        The below PHP code could be vulnerable to a stacked query injection.
      </p>

<pre class="lang-php default-code-style dark-mode-background">
$query = "SELECT * FROM employee WHERE id='" . $_GET['id'] . "'";</pre>

      <p>
        A simple example of input that could execute a stacked query attack is
        <span class="inline-code">1'; DROP TABLE employee -- </span>. This would
        result in the following SQL statements.
      </p>

<pre class="lang-php default-code-style dark-mode-background">
$query = "SELECT * FROM employee WHERE id='1'; DROP TABLE employee -- '";</pre>

      <p>
        If the RDMS executes this stacked query, it would first select all columns
        from the employee table that are associated to the id <span class="inline-code">1
        </span>, and then it would drop (delete) the entire employee table.
      </p>

      <h1 class="title toc">Arbitrary command execution</h1>
      <p>
        Suppose again that the vulnerable code is
      </p>

<pre class="lang-php default-code-style dark-mode-background">
$query = "SELECT * FROM employee WHERE id='" . $_GET['id'] . "'";</pre>

      <p>
        If this were to be running on a Microsoft SQL server instance, we could
        shut down the server with the following payload, which would generate
        the following query string.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
# Payload
1'; EXEC master..xp_cmdshell 'shutdown /s' -- 

# Resulting query string
"SELECT * FROM employee WHERE id='1'; EXEC master..xp_cmdshell 'shutdown /s' -- '";</pre>

      <p>
        <span class="inline-code">xp_cmdshell</span> is an SQL server specific
        stored procedure to execute shell commands from the database management
        session. <span class="inline-code">xp_cmdshell</span> executes commands
        in a Windows batch (cmd) shell, and <span class="inline-code">shutdown /s
        </span> is the batch command to shut down a Windows computer.
      </p>
      <p>
        Similarly, if you wanted to execute an arbitrary command on a server running
        MySQL that is integrating with the database with a language or tool that allows
        stacked queries (not PHP), you can execute arbitrary commands with the token 
        <span class="inline-code">\!</span>. An injection payload that would shut down
        a Linux server running MySQL is <span class="inline-code">
        1'; \! shutdown -n now -- </span>. This payload would result in the following
        query string.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
# Payload
1'; \! shutdown -n now --

# Resulting query string
"SELECT * FROM employee WHERE id='1'; \! shutdown -n now -- '";</pre>

      <h1 class="title toc">Give yourself a pay raise!</h1>
      <p>
        The following stacked query payload is an example that would give the
        user John Smith a 20% raise. (Assuming the database schema matches
        the queries and is vulnerable to stacked queries)
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
1'; UPDATE employee SET salary=salary*1.2 WHERE first_name='Jhon' AND last_name='Smith' -- 1</pre>

      <p>
        Notice the <span class="inline-code">1';</span> at the beginning of the payload.
        This is will input valid data into the query we are injecting to, as well as
        terminate it so that we can stack our own query. Also notice at the end of
        our stacked query payload, we comment out the rest of the SQL query with
        <span class="inline-code">-- 1</span>. It is a good idea to place a space
        after SQL comments, because some DBMS systems will not register the comments
        otherwise. The <span class="inline-code">1</span> after the SQL comment
        is simply so we can visually see that we placed a space after the comment.
      </p>
      <p>
        The PHP query string that will be executed after we inject our payload
        would look like this.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
$query = "SELECT * FROM employee WHERE id='1'; 
          UPDATE employee SET salary=salary*1.2 
          WHERE first_name='Jhon' AND last_name='Smith'";</pre>

      <p>
        Which will get all columns of the employee table associated with the row
        whose id is 1, as well as give John Smith a 20% salary raise.
      </p>
      
      <h1 class="title toc">Stacked query attack limitations</h1>
      <p>
        Because stacking queries is a powerful injection technique, there are
        often more security precautions in place to prevent it. Several databases
        and database APIs disallow query stacking. Stacked queries are not allowed
        using the SQLi API with MySQL, or on Oracle. However, Microsoft SQL server is
        a major DBMS that supports query stacking.
      </p>
      <p>
        Apart from limited DBMS support for query stacking, it is often difficult
        to extract data using stacked queries. This is because in order to extract
        data, you have to issue a <span class="inline-code">SELECT</span> statement
        and be able to see the results of the select on the webpage. However,
        programs are often only designed to handle one select statement at a time.
        If you want to extract data, it is better to use <span class="inline-code">
        UNION</span> attacks.
      </p>
      <p>
        Another limitation of using stacked queries is that in order to be successful,
        an attacker will need to know information about the database schema, such
        as database, table, and column names. Gathering this information is another
        step that must be taken in order to launch a stacked query attack.
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