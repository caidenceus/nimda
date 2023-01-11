<?php
if (!isset($previous)) { $previous = ""; }
if (!isset($home)) { $home = ""; }
if (!isset($next)) { $next = ""; }

echo '<div class="top-level-container tutorial-navigation">';
echo '<a href="' . $previous . '"><button class="tutorial-navigation-button default-text">Previous</button></a>';
echo '<a href="' . $home . '"><button class="tutorial-navigation-button default-text">Home</button></a>';
echo '<a href="' . $next . '"><button class="tutorial-navigation-button default-text">Next</button></a>';
echo '</div>';
?>