<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';
    
    // Title and description are set in page_header.php
    $title = "Finding SQL vulnerabilities";
    $description = "How to find vulnerable SQL injection points with Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'sqlmap-basic-commands.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'change-the-http-user-agent.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">SQL vulnerability</h1>
      <p>
        The first step to exploiting an SQL injectable website is finding an
        entry point for our SQL injection attacks. Many of the most basic Sqlmap
        commands default to finding SQL injection vulnerabilities. We will
        specifically be looking at how to find SQL injection entry points interactively,
        and how to tell Sqlmap to find vulnerabilities for us.
      </p>
      <p>
        The commands discussed in this section will find SQL injection vulnerabilities,
        but will not exploit them beyond gathering reconnaissance about the database
        and website in question.
      </p>
      
      <h1 class="title toc">Sqlmap interactive mode</h1>
      <p>
        The default behavior of all Sqlmap commands is to run in <i>interactive mode</i>.
        This means that throughout execution Sqlmap will prompt you with questions
        about how the program should run as you will see below.
      </p>
      <p>
        The simplest interactive Sqlmap command to run is <span class="inline-code">
        python3 sqlmap.py -u target_url?target_parameter=value</span>,
        where <span class="inline-code">target_url</span> is the full URL of
        website to attack, <span class="inline-code">target_parameter</span>
        is the parameter to test for SQL vulnerabilities, and <span class="inline-code">value</span>
        is the parameter value to initially pass to <span class="inline-code">target_parameter</span>.
        Below we use the <span class="inline-code">&ndash;&ndash;forms</span> command line flag.
        This tells Sqlmap to scrape the website for forms for us.
      </p>
      <p>
        This below command will search the webpage <span class="inline-code">
        index.php</span> for SQL injection vulnerabilities, and ask us questions
        about how the script should proceed to execute as it discovers new information
        about the webpage.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/index.php --forms

        ___
       __H__
 ___ ___[,]_____ ___ ___  {1.7.1.4#dev}
|_ -| . [,]     | .'| . |
|___|_  [.]_|_|_|__,|  _|
      |_|V...       |_|   https://sqlmap.org

[!] legal disclaimer: Usage of sqlmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state and federal laws. Developers assume no liability and are not responsible for any misuse or damage caused by this program

[*] starting @ 21:37:27 /2023-01-14/

[21:37:27] [INFO] testing connection to the target URL
[21:37:28] [INFO] searching for forms
[1/1] Form:
POST http://127.0.0.1/index.php
POST data: filter=
do you want to test this form? [Y/n/q]
>

Edit POST data [default: filter=] (Warning: blank fields detected):

do you want to fill blank fields with random values? [Y/n]</pre>

      <p>
        In the above example, we are using SQL map to test the website
        <span class="inline-code">http://127.0.0.1/index.php</span>. Again, the
        <span class="inline-code">&ndash;&ndash;forms</span> command line flag tells Sqlmap
        to scrape the URL HTML for forms for us, so we don't have to specify
        a target parameter.
      </p>

      <h1 class="title toc">Sqlmap batch mode</h1>
      <p>
        If run in batch mode, Sqlmap will not prompt you with questions as to how
        the script should proceed, and it will assume default behavior for all prompts.
        Batch mode is activated with the <span class="inline-code">&ndash;&ndash;batch</span>
        command line flag.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/index.php --forms --batch</pre>
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