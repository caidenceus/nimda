<?php
if (!isset($terminal_text)) { $terminal_text = "sudo apt -y install kali-root-login"; }

// We need two divs for the animation. The first is to set the background color
// of the entier width of the screen to black. The second is an inline-block div
// so that the cursor ends at the end of the text
echo '<div class="top-level-container terminal-text-container">';
echo '<div class="terminal-prompt"><p>kali@kali:~$ </p></div>';
echo '<div class="terminal-text"><p>' . $terminal_text . '</p></div>';
echo '</div>';
?>