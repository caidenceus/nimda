<?php require_once 'relative_init.php'; ?>
<?php require_once SHARED_PATH . 'head.php'; ?>

<?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'course.css">'; ?>

<?php require_once SHARED_PATH . 'page_header.php'; ?>
<?php require_once SHARED_PATH . 'legal_disclaimer.php'; ?>

    <div class="course-top-level-container">
      <h1 class="title">Introduction</h1>
      <p class="course-text">
        Sqlmap is an open source ethical hacking tool written in Python that is 
        used to help automate detecting and exploiting SQL vulnerabilities.
        Its features range from detecting vulnerable HTML form parameters, to 
        enumerating database users, to completely taking over a database server.      
      </p>
      <p class="course-text">
        At the time of this writing, sqlmap fully supports six different 
        injection techniques, which are Boolean-based blind, 
        time-based blind, error-based, UNION query-based, stacked queries and 
        out-of-band. Each of these techniques are covered in more depth on their
        respective tutorial pages.
      </p> <!-- Introduction -->
      
      <h1 class="title">Sqlmap dependencies</h1>
      <p class="course-text">
        The only sqlmap dependcy is Python 3.x. As long as you have Python 
        installed, sqlmap should work out of the box after installation. See the
        corresponding section for installing Python 3 for your operating system.
        However, we will also be utilizing git and pip, which are installed
        as described below.
      </p>

      <h3 class="sub-title">Debian Linux</h3>
      <p class="course-text">
        Copy and paste the commands into a terminal window.
      </p>
      <pre>
        <code class="course-text">
          sudo apt update
          sudo apt install -y python3 python3-pip git</code>
      </pre>
      <p class="course-text">
        You can verify the installation of Python 3, Pip and Git with the 
        following respective commands:
      </p>
      <pre>
        <code class="course-text">
          python3 --version
          pip3 --version
          git --version</code>
      </pre>
      <p class="course-text">
        If each of the above commands returns some sort of software version,
        then the install was successful.
      </p>

      <h3 class="sub-title">Windows</h3>
      <p class="course-text">
        <span style="color: red">IMPORTANT!</span> When installing Python 3 on
        Windows, on one of the pages of the install wizard there will be a
        checkbox "<i>Add Python to PATH</i>" make sure you check this box 
        to make your life easier!
      </p>
      <p class="course-text">
        To install Python 3, and Pip3 which is installed automatically with
        Python on Windows, download the latest version of Python 3 from
        Python.org. After the download completes, run the executable and follow
        the install wizard. Be sure to check the <i>"Add Python to PATH"</i>
        checkbox when it comes up.
      </p>
      <pre class="course-text">
        <code><a href="https://www.python.org/downloads/" target="_blank">https://www.python.org/downloads/</a></code>
      </pre>
      <p class="course-text">
        To install Git, download the "standalone installer" for Windows from
        the following website. Run the executable once downloaded and follow
        the install prompts.
      </p>
      <pre class="course-text">
        <code><a href="https://git-scm.com/download/win" target="_blank">https://git-scm.com/download/win</a></code>
      </pre>
      <p class="course-text">
        You can verify the installation of Python 3, Pip and Git with the 
        following respective commands:
      </p>
      <pre>
        <code class="course-text">
          python3 --version
          pip3 --version
          git --version</code>
      </pre>
      <p class="course-text">
        If each of the above commands returns some sort of software version,
        then the install was successful.
      </p> <!-- Sqlmap dependencies -->

      <h1 class="title">Installing sqlmap</h1>
      <p class="course-text">
        Sqlmap comes pre-installed on Kali-Linux. However, if you are running 
        Windows or a different Debian distribution of Linux, follow the steps
        to install sqlmap.
      </p>
      <h3 class="sub-title">Debian Linux</h3>
      
    </div>

<?php require_once SHARED_PATH . 'page_footer.php'; ?>

<!-- References
https://sqlmap.org/
-->