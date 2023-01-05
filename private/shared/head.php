<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <?php echo '<script type="text/javascript" src="' . JAVASCRIPT_PATH . 'randomColors.js" defer></script>' ?>
    <?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'shared.css">'; ?>
    <?php
        // Don't close the head tag here so that pages can link to additional
        // stylesheets before page_header.php, where the head tag is closed.
    ?>