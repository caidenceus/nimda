<?php
    if (! isset($title)) { $title = ''; }
    // Table of contents for course pages.
    // Within shared.css, we set the display as hidden, then use JavaScript to
    // parse the document for h1 HTML tags and generate the table of contents
    // links and set the display to block.
    //
    // CSS is found in course.css and depends on table_of_contents.js

    echo '<div class="course-top-level-container">';
    echo '<h1 class="title">' . $title . '</h1>';
    echo '<div id="table-of-contents"></div>';
    echo '</div>';
?>