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
        For example, let's say we found a website that passes around an id as an URL 
        parameter. Let's suppose that at some point the website URL looks
        something like this <span class="inline-code">
        http://127.0.0.1/index.php?id=SIL-1234567890</span>. Now, after a few
        more clicks, we observe the URL has changed to <span class="inline-code">
        http://127.0.0.1/index.php?id=SIL-987654321</span>. Notice that the
        beginning of the <span class="inline-code">id</span> in both URL parameters
        is <span class="inline-code">SIL-</span>.
      </p>
      <p>
        Because part of the <span class="inline-code">id</span> parameter is
        constant, this could be an application that only processes the id field
        if the prefix <span class="inline-code">SIL-</span> is present in the string.
        If this is the case, Sqlmap will not be able to detect the vulnerable
        injection point without a little bit of customization.
      </p>

      <h1 class="title toc">Injection point prefixes</h1>
      <p>
        If a SQL injection vulberable application checks that data is in a
        particular format before executing database transactions, Sqlmap may miss
        the vulnerability. In the below example, Sqlmap is run against a vulnerable
        website with the highest payload and risk and levels, but misses the vulnerability
        because the website expects data to be prefixed with <span class="inline-code">
        SIL-</span>, which Sqlmap does not use in its payloads.
      </p>
<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u http://127.0.0.1/index.php --forms --batch <mark>--level=5 --risk=5</mark>

[19:05:57] <mark>[ERROR] all tested parameters do not appear to be injectable.</mark>
           If you suspect that there is some kind of protection mechanism involved
           (e.g. WAF) maybe you could try to use option '--tamper' (e.g. '--tamper=space2comment'),
           skipping to the next target
[19:05:57] [WARNING] HTTP error codes detected during run:
400 (Bad Request) - 8709 times</pre>

      <p>
        PHP code that avoid can avoid being detected by Sqlmap may look like the
        code shown below.
      </p>

<pre class="lang-php default-code-style dark-mode-background">
$id = $_GET['id'];

// Database is not queried if the prefix is not SIL-
if (preg_match('/SIL-/', $id)){
    /* Application code */
}</pre>
    
      <p>
        The above code uses a regular expression to check that the URL parameter
        <span class="inline-code">id</span> begins with the character string
        <span class="inline-code">SIL-</span>. Websites like this often pass
        around data as URL parameters that are formatted with a prefix or suffix,
        such as <span class="inline-code">SIL-</span>, as a way of validating
        data was sent by the application and not a user.
      </p>
      <p>
        Although this is not explicitly a way to avoid SQL injection attacks, it
        does hinder our ability to find and exploit SQL vulnerabilities. If you
        know the prefix that the application code is expecting, you can use that
        prefix in Sqlmap's payloads by adding it to the URL paramter inside of
        Sqlmap's <span class="inline-code">-u</span> parameter. In the code above,
        we can bypass the <span class="inline-code">preg_match</span> conditional
        statement by using the Sqlmap URL<span class="inline-code">-u 
        "http://127.0.0.1/index.php?id=SIL-"</span>.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python3 sqlmap.py -u "http://127.0.0.1/index.php<mark>?id=SIL-</mark>" -p "id"

GET parameter 'id' is vulnerable. Do you want to keep testing the others (if any)? [y/N] N
sqlmap identified the following injection point(s) with a total of 92 HTTP(s) requests:
---
Parameter: id (GET)
    Type: time-based blind
    Title: MySQL >= 5.0.12 AND time-based blind (query SLEEP)
    Payload: <mark>id=SIL-</mark>' AND (SELECT 5846 FROM (SELECT(SLEEP(5)))UAYW) AND 'IdBm'='IdBm
---</pre>

      <p>
        We can see that Sqlmap is now able to find an injection point because
        our payload is prefixed with <span class="inline-code">SIL-</span>, which
        is what the application code is expecting. The argument <span class="inline-code">
        -p "id"</span> tells Sqlmap to only test the id parameter.
      </p>
      <p>
        The highlighted part of the URL is known as the <i>query</i>. The query
        of a URL is the part that comes after the question mark and before an optional
        pound sign (#), which optionally identifies a resource. In this URL query,
        <span class="inline-code">id</span> is a URL parameter, and <span class="inline-code">
        SIL-</span> is the value of the URL parameter <span class="inline-code">id</span>.
        When data is sent in URL parameters like this the application receives
        the data in the form of a GET request.
      </p>

      <h1 class="title toc">The --prefix and --sufix arguments</h1>
      <p>
        Suppose we wanted to exploit the below PHP code.
      </p>

<pre class="lang-php default-code-style dark-mode-background">
$query = "SELECT * FROM users WHERE id=('" . $_GET['id'] . "')";</pre>

      <p>
        For this example, Sqlmap would probably be able to detect the boundaries
        without us explicitally passing the <span class="inline-code">--prefix</span>
        and <span class="inline-code">--suffix</span> arguments. But for the sake
        of demonstration, we are going to exploit this code using prefixes and
        suffixes. Consider the following command.
      </p>

<pre class="lang-bash default-code-style dark-mode-background">
python sqlmap.py -u "http://127.0.0.1/index.php?id=1" <mark>--prefix "')" --suffix "AND (1 = 1"
<pre>

      <p>
        Using the previous query code, this command will result in the following query.
      </p>

<pre class="lang-php default-code-style dark-mode-background">
$query = "SELECT * FROM users WHERE id=('1<mark>')</mark> &lt;PAYLOAD&gt; <mark>AND (13 = 13)</mark></pre>

      <p>
        The highlighted parts of the query are the prefix and suffix that we are
        using respectively before and after every Sqlmap payload. <i>PAYLOAD</i>
        is the payload used by Sqlmap to detect and exploit Sqlinjection
        vulnerabilities.
      </p>
      <p>
        Using the prefix and suffix arguments for this simple of an example is
        usually unneccessary because Sqlmap can detect boundaries in cases like
        this. But there are instances where Sqlmap will not be able to detect
        injection points becaues of how the SQL query is formatted in the code.
        In these cases, you may have to come up with creative prefixes and
        suffexes on your own.
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