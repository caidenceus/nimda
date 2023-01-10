<?php require_once 'relative_init.php'; ?>
<?php require_once SHARED_PATH . 'head.php'; ?>

<?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'course.css">'; ?>

<?php require_once SHARED_PATH . 'page_header.php'; ?>
<?php require_once SHARED_PATH . 'legal_disclaimer.php'; ?>

    <div class="top-level-container">
      <div class="course-home-container">
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
      </div> <!-- Introduction -->
    </div>

<?php require_once SHARED_PATH . 'page_footer.php'; ?>