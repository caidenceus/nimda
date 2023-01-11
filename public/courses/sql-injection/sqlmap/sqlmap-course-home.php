<?php require_once 'relative_init.php'; ?>
<?php require_once SHARED_PATH . 'head.php'; ?>

<?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'course.css">'; ?>
<?php echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'waterfallColors.js" defer></script>' ?>

<?php require_once SHARED_PATH . 'page_header.php'; ?>
<?php require_once SHARED_PATH . 'legal_disclaimer.php'; ?>

    <div class="top-level-container course-home-root-container">
      <div class="course-home-container course-home-container-left">
        <h1 class="title">Sqlmap</h1>
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
        </p>
      </div> <!-- Left half -->

      <div class="course-home-container course-home-container-right">
        <?php
            $tutorials = array(
                'Install sqlmap',
                'Sqlmap basic commands',
                'Detecting form parameters',
                'Bypassing web application firewalls',
                'Enumerating database usernames and passwords',
                'Dumping database tables',
                'Introduction to database takeover',
                'File injection',
                'Arbitrary command execution',
                'Privilege escalation'
            );

            generate_tutorial_links($tutorials);
        ?>
      </div> <!-- Right half -->
    </div>

<?php require_once SHARED_PATH . 'page_footer.php'; ?>