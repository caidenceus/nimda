<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Spqcify injection techniques";
    $description = "Learn how to manually specify the SQL injection technique that Sqlmap should use.";
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
      <h1 class="title toc">Injection technique overview</h1>
      <p>
        At the time of this writing, there are six SQL injection techniques
        employed by Sqlmap, which can be specified using the <span class="inline-code">
        --technique</span> command line argument. The techniques are stacked queries (S),
        union-based (U), error-based (E), inline query (Q), Boolean blind (B), 
        and time-based blind (T).
      </p>
      <p>
        Each technique comes with a set of payloads used in attempt detect and exploit
        vulnerabilities specific to that technique. Sqlmap uses all six techniques
        by default <span class="inline-code">--technique=SUEQBT</span>.
      </p>
      <p>
        Specifying  the techniques for Sqlmap to use will limit the number of payloads
        being sent to the target. Thus, reducing the runtime as well as web traffic.
        This is a useful command line option if you manually find a vulnerability
        on a website and want to use Sqlmap to exploit the vulnerability.
      </p>

      <h1 class="title toc">Stacked queries (S)</h1>
      <p>
        Stacked queries is a technique whereby an attacker terminates the original
        query and injects a new one. In SQL a semicolon indicates the end of a statement
        has been reached and that what follows is the beginning of a new statement.
      </p>
      <p>
        We will not go into detail of stacked query attacks here because this tutorial
        is aimed at teaching how to use Sqlmap to exploit SQL vulnerabilities rather
        than discussing different SQL vulnerabilities themselves.
      </p>
      <p>
        To specifically use the stacked query technique, you specify it using the
        parameter <span class="inline-code">--technique=S</span>.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--technique=S</mark></pre>

      <h1 class="title toc">Union-based (U)</h1>
      <p>
        This method involves using the SQL <span class="inline-code">UNION</span>
        keyword in order to get data from other tables in the database besides
        the table that is being queried by the SQL injection point. This is also
        used to get data from other columns of the table that the injection point
        uses that otherwise should not be viewed by the user.
      </p>
      <p>
        In order to use this technique, you must be able to see the results from
        a valid SELECT query on the website. To use a union-based attack, we
        specify the <span class="inline-code">--technique=U</span> parameter.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--technique=U</mark></pre>

      <h1 class="title toc">Error-based (E)</h1>
      <p>
        This method involves sending malformed payloads that trigger error messages from
        the database that reveal information about the schema, data, and or
        the underlying database itself. To use this method, you must be able to
        see database query errors in the response of the website.
      </p>
      <p>
        To use error-based attacks, we specify the <span class="inline-code">
        --technique=E</span> parameter.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--technique=E</mark></pre>

      <h1 class="title toc">Inline query (Q)</h1>
      <p>
        In SQL queries, you can filter data based on sub-queries called <i>inline queries</i>.
        The inline query attack method aims to exploit a vulnerability that is
        within an inline SQL query.
      </p>
      <p>
        To use inline query attacks, we specify the <span class="inline-code">
        --technique=Q</span> parameter.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--technique=Q</mark></pre>

      <h1 class="title toc">Boolean blind (B)</h1>
      <p>
        Boolean blind is an advanced technique that attempts to extract data
        by observing the state of the HTTP responses after executing syntactically 
        correct, but logically different SQL statements. To use this method, 
        you must be able to observe an identifiable change in HTTP responses.
      </p>
      <p>
        Because this method uses logic to extract data, it takes more time than 
        the previously mentioned attack methods. To use the Boolean blind method, 
        we specify the <span class="inline-code">--technique=B</span> parameter.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--technique=B</mark></pre>

      <h1 class="title toc">Time-based blind (T)</h1>
      <p>
        This method is similar to the Boolean blind method, except that instead
        of observing differences in HTTP responses, a time-based attack uses
        deliberate time delays to trigger delayed responses. A delay specified
        in the payload will indicate the existence or absence of data.
      </p>
      <p>
        To use the time-based blind method, we specify the
        <span class="inline-code">--technique=B</span> parameter.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--technique=T</mark></pre>

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
