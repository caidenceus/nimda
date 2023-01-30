<?php
    require_once 'relative_init.php';
    include_once SHARED_PATH . 'course_header.php';

     // Title and description are set in page_header.php
    $title = "Payload prefixes and suffixes";
    $description = "Learn how to bypass web application firewalls with Sqlmap.";
    include_once SHARED_PATH . 'page_header.php';

    // Legal disclaimer and terminal animations
    $terminal_text = 'sudo apt-get install -y python3';
    include SHARED_PATH . 'terminal_text.php';
    include_once SHARED_PATH . 'legal_disclaimer.php';
    $terminal_text = 'python3 --version';
    include SHARED_PATH . 'terminal_text.php';

    // Tutorial navigation buttons
    $previous = 'steal-database-table-data.php';
    $home = 'sqlmap-course-home.php#tutorials';
    $next = 'payload-prefixes-and-suffixes.php';
    include SHARED_PATH . 'tutorial_navigation.php';

    // Table of contents
    include SHARED_PATH . 'table_of_contents.php';
?>

    <div class="course-top-level-container">
      <h1 class="title toc">Why use prefixes and suffixes</h1>
      <p>
        Sometimes injection points on vulnerable applications will expect
        data to be either prefixed or suffixed with a set of characters to
        validate the data, and or avoid detection from SQL injection tools.
      </p>
      <p>  
        For example, let's say we found a website passes that around an id as an URL 
        parameter. Let's suppose that at some point the website URL looks
        something like this <span class="inline-code">
        http://127.0.0.1/index.php?id=HTS-1234567890</span>. Now, after a few
        more clicks, we observe the URL has changed to <span class="inline-code">
        http://127.0.0.1/index.php?id=HTS-987654321</span>. Notice that the
        beginning of both <span class="inline-code">id</span> URL parameters
        is the same, namely <span class="inline-code">HTS-</span>.
      </p>
      <p>
        Because part of the <span class="inline-code">id</span> parameter is
        constant, this could be an application that only processes the id field
        if the prefix <span class="inline-code">HTS-</span> is present in the string.
        If this is the case, Sqlmap will not be able to detect the vulnerable
        injection point without a little bit of customization.
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