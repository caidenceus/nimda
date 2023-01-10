<?php

require_once "init.php";


/**
 *  @brief Cast a string to lowercase and replace spaces with underscores.
 *
 *  @param link_text The text to sterilize.
 *  @return (string) The sterilized text.
 */
function sterilize_link(string $link_text)
{
    $sterilized = str_replace("_", "-", $link_text);
    $sterilized = str_replace(" ", "-", $sterilized);
    $sterilized = strtolower($sterilized);
    return $sterilized;
}


/**
 *  @brief Generate a course link as a button in five dynamic columns
 *
 *  @param name The name of the course to generate a link for.
 *  @param path The path within the "courses" directory where the link file lives.
 */
function generate_course_link(string $name, string $path)
{
    $course_path = COURSE_PATH . $path . '/' . sterilize_link($name);
    echo '<div class="course">';
    echo '<a href="' . $course_path . '.php" class="course-link"><button class="course-button random-color">' . $name . '</button></a>';
    echo '</div>';
}

?>