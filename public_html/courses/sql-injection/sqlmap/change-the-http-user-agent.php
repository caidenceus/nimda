<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Bypass Web Firewalls";
    $description = "Learn how to bypass web application firewalls with Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'finding-sql-injection-vulnerabilities.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'change-the-http-user-agent.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">The user agent HTTP header</h1>
      <p>
        Often times, web application firewalls filter based on the value of the
        user agent header, or the absence of the user agent header.
        In this tutorial, we learn how to bypass this firewall feature by
        randomizing the user agent headers sent by Sqlmap.
      </p>
      <p>
        Feel free to skip this section. Before we discuss how to change the default 
        Sqlmap user agent, we will first discuss what a user agent is and 
        why we would want to change it.
      </p>
      <p>
        From the MDN "The User-Agent request header is a characteristic string
        that lets servers and network peers identify the application, operating
        system, vendor, and/or version of the requesting."
      </p>
      <p>
        When your browser sends an HTTP request to a web server, there are several
        fields called HTTP headers that your browser will send with the request
        that contain additional context and metadata about the request. One
        of these headers is called the <span class="inline-code">User-Agent</span> header.
        This header is used to describe the software that is sending the HTTP 
        request on behalf of the user.
      </p>
      <p>
        A "normal" HTTP GET request with a "nomral" user agent header sent from
        a real user using a web browser might look something likst this.
      </p>
<pre class="lang-bash default-code-style dark-mode-background">
GET / HTTP/1.1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36</pre>

      <p>
        Note that there are many more headers, they are just excluded. As you
        can see this HTTP request was sent from a Windows computer running Google
        Chrome version 108. Web application firewalls that filter requests based
        on user agents will allow the above request through the firewall because
        it is being sent from a real user using a web browser.
      </p>
      <p>
        Sqlmap on the other hand defaults to setting the user agent to something
        like this:
      </p>
<pre class="lang-bash default-code-style dark-mode-background">
User-Agent: sqlmap/1.3.11#stable (http://sqlmap.org)</pre>
      <p>
        This user agent format makes it easy for firewalls to disallow traffic from Sqlmap by
        parsing the HTTP user agent header for the string <span class="inline-code">
        sqlmap</span>. This is why Sqlmap has an argument to randomize the user agent.
      </p>
      
      <h1 class="title toc">Randomizing the user agent header</h1>
      <p>
        The command line argument to randomize user agents sent in HTTP requests
        from Sqlmap is <span class="inline-code">&ndash;&ndash;random-agent</span>.
        When this flag is passed to Sqlmap, the program will select a random user
        agent from the file <span class="inline-text">\txt\user-agents.txt</span>
        and use that user agent for every request for the rest of the Sqlmap run.
      </p>
<pre class="lang-bash default-code-style dark-mode-background">
kali@kali:~$ python3 sqlmap.py -u http://127.0.0.1/index.php --forms --batch --random-agent
        ___
       __H__
 ___ ___[']_____ ___ ___  {1.7.1.4#dev}
|_ -| . [)]     | .'| . |
|___|_  [,]_|_|_|__,|  _|
      |_|V...       |_|   https://sqlmap.org

[!] legal disclaimer: Usage of sqlmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state and federal laws. Developers assume no liability and are not responsible for any misuse or damage caused by this program

[*] starting @ 21:02:27 /2023-01-16/

[21:02:27] [INFO] fetched random HTTP User-Agent header value
           'Mozilla/5.0 (X11; U; Linux i686; de; rv:1.9.1.8) Gecko/20100214 Ubuntu/9.10 (karmic) Firefox/3.5.8'
           from file 'C:\Users\Owner\Desktop\sqlmap-dev\data\txt\user-agents.txt'</pre>


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