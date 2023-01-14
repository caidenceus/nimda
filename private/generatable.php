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
 *  @brief Generate a learning path link as a button in two dynamic columns.
 *  
 *  @param title The title of the learning path to generate a link for.
 *  @param tagline The tagline displayed underneath the course title.
 *  @param landing_href The path of the learning path landing page.
 */
function generate_learning_path_link(string $title, string $tagline, string $landing_href)
{
    echo '<div class="learning-path">';
    echo '<a href="' . $landing_href . '"><button>';
    echo '<p class="learning-path-subtitle bold">Learning Path</p>';
    echo '<h2 class="blue-text">' . $title . '</h2>';
    echo '<p>' . $tagline . '</p>';
    echo '</button></a>';
    echo '</div>';
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
    echo '<a href="' . $href . '" class="course-link"><button>';
    echo '<p class="learning-path-subtitle bold">Course</p>';
    echo '<h2 class="blue-text">' . $name . '</h2>';
    echo '</button></a>';
    echo '</div>';
}


/**
 *  @brief Function to generate the color waterfall for tutorial links.
 *
 *  @param $tutorial_name_array Array of tutorial names to generate links for.
 */
function generate_tutorial_links(array $tutorial_name_array)
{
    foreach($tutorial_name_array as $tutorial) {
        $href = sterilize_link($tutorial) . '.php';
        echo '<a href="' . $href . '"><button class="todo-button-animation tutorial-button">[ ] ' . $tutorial . '</button></a>';
    }
}


/**
 *  @brief Function to generate technology tags on course and tutorial pages.
 *
 *  @param $tags Array of tutorial names to generate links for.
 */
function generate_technology_tags(array $tags)
{
    echo '<div class="technology-tag-container">';
    echo '<h1 class="title">Technologies in this Course</h1>';

    foreach($tags as $tag) {
        echo '<div class="technology-tag"><h2 class="blue-background tag">' . $tag . '</h2></div>';
    }

    echo '</div>';
}

?>