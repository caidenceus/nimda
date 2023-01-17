<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'colors.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . CSS_PATH . 'shared.css">'; ?>
    <?php
        // Don't close the head tag here so that pages can link to additional
        // stylesheets before page_header.php, where the head tag is closed.
        // Aditionally, we want to be alble to dynamically set the contents
        // of the <title> tag and the description meta tag.
    ?>