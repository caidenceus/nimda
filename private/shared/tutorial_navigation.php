<?php
if (!isset($previous)) { $previous = ""; }
if (!isset($home)) { $home = ""; }
if (!isset($next)) { $next = ""; }

echo '<div class="course-top-level-container tutorial-navigation">';
echo '<a href="' . $previous . '"><button class="tutorial-navigation-button red-background red-button-hover-invert">Previous</button></a>';
echo '<a href="' . $home . '"><button class="tutorial-navigation-button yellow-background yellow-button-hover-invert">Course Home</button></a>';
echo '<a href="' . $next . '"><button class="tutorial-navigation-button blue-background blue-button-hover-invert">Next</button></a>';
echo '</div>';
?>