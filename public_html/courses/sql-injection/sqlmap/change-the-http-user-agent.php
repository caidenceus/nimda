<?php
    require_once 'relative_init.php';
    require_once SHARED_PATH . 'course_header.php';

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
        Before we discuss how to change the default Sqlmap user agent, it is
        important to understand what a user agent is and why we would want to
        change it.
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
        Note that I excluded all headers except for the user agent header. As you
        can see, this HTTP request was sent from a Windows computer running Google
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
        Which makes it easy for firewalls to disallow traffic from Sqlmap by
        parsing the HTTP user agent header for the string <span class="inline-code">
        sqlmap</span>.
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