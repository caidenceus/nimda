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
 *  @brief Generate a course link as a button in five dynamic columns.
 *  
 *  @param name The name of the course to generate a link for.
 *  @param path The path within the "courses" directory where the link file lives.
 */
function generate_course_link(string $name, string $path)
{
    $clean_name = sterilize_link($name);
    $href = COURSE_PATH . "$path/$clean_name/$clean_name-course-home.php";

    echo '<div class="course">';
    echo '<a href="' . $href . '" class="course-link"><button class="course-button random-color">' . $name . '</button></a>';
    echo '</div>';
}


/**
 *  @brief Generate a tutorial link as a button.
 *  
 *  @param name The name of the tutorial to generate a link for.
 */
function tutorial_link(string $name)
{
    $href = sterilize_link($name) . '.php';
    echo '<a href="' . $href . '"><button>' . $name . '</button></a>';
}

?>