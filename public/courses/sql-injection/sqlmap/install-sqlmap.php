<?php
require_once 'relative_init.php';
include_once SHARED_PATH . 'head.php';

echo '<link rel="stylesheet" href="' . CSS_PATH . 'course.css">';

include_once SHARED_PATH . 'page_header.php';

$terminal_text = 'sudo apt-get install -y python3';
include SHARED_PATH . 'terminal_text.php';
include_once SHARED_PATH . 'legal_disclaimer.php';
$terminal_text = 'python3 --version';
include SHARED_PATH . 'terminal_text.php';

$home = 'sqlmap-course-home.php';
$next = 'sqlmap-basic-commands.php';
include SHARED_PATH . 'tutorial_navigation.php';
?>

    <div class="course-top-level-container">
      <h1 class="title">Sqlmap dependencies</h1>
      <p>
        The only sqlmap dependcy is Python 3.x. As long as you have Python 
        installed, sqlmap should work out of the box after installation. See the
        corresponding section for installing Python 3 for your operating system.
        However, we will also be utilizing git and pip, which are installed
        as described below.
      </p>

      <h3 class="sub-title">Debian Linux</h3>
      <p>
        Copy and paste the commands into a terminal window.
      </p>
      <pre class="prettyprint lang-bsh default-code-style">
sudo apt update
sudo apt install -y python3 python3-pip git</pre>
      <p>
        You can verify the installation of Python 3, Pip and Git with the 
        following respective commands:
      </p>
<pre class="prettyprint lang-bsh default-code-style">
python3 --version
pip3 --version
git --version</pre>
      <p>
        If each of the above commands returns some sort of software version,
        then the install was successful.
      </p>

      <h3 class="sub-title">Windows</h3>
      <p>
        <span style="color: red">IMPORTANT!</span> When installing Python 3 on
        Windows, on one of the pages of the install wizard there will be a
        checkbox "<i>Add Python to PATH</i>" make sure you check this box 
        to make your life easier!
      </p>
      <p>
        To install Python 3, and Pip3 which is installed automatically with
        Python on Windows, download the latest version of Python 3 from
        Python.org. After the download completes, run the executable and follow
        the install wizard. Be sure to check the <i>"Add Python to PATH"</i>
        checkbox when it comes up.
      </p>
<pre class="default-code-style">
<a href="https://www.python.org/downloads/" target="_blank">https://www.python.org/downloads/</a></pre>
      <p>
        To install Git, download the "standalone installer" for Windows from
        the following website. Run the executable once downloaded and follow
        the install prompts.
      </p>
<pre class="default-code-style">
<a href="https://git-scm.com/download/win" target="_blank">https://git-scm.com/download/win</a>
</pre>
      <p>
        You can verify the installation of Python 3, Pip and Git with the 
        following respective commands:
      </p>
<pre class="prettyprint lang-bsh default-code-style">
python3 --version
pip3 --version
git --version</pre>
      <p>
        If each of the above commands returns some sort of software version,
        then the install was successful.
      </p> <!-- Sqlmap dependencies -->

      <h1 class="title">Installing sqlmap</h1>
      <p>
        Sqlmap comes pre-installed on Kali-Linux. However, if you are running 
        Windows or a different Debian distribution of Linux, follow the steps
        to install sqlmap. Because we installed Python 3, Pip3, and Git, the
        steps to install Sqlmap in this section should work on both Windows and
        Linux.
      </p>
      <p>
        The reccomended way to install sqlmap is by cloning directly from the
        github repository. To do this, run the following command in a terminal
        window on Linux or a command prompt window if you are on Windows.
      </p>
<pre class="prettyprint lang-bsh default-code-style">
git clone --depth 1 https://github.com/sqlmapproject/sqlmap.git sqlmap-dev</pre>
      <p>
        To verify the install, run the following commands (should work on Windows
        and Linux).
      </p>
<pre class="prettyprint lang-bsh default-code-style">
cd sqlmap
python3 sqlmap.py -h</pre>
    </div>

<?php include SHARED_PATH . 'tutorial_navigation.php'; ?>
<?php require_once SHARED_PATH . 'page_footer.php'; ?>

<!-- References
https://sqlmap.org/
-->