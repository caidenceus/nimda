<?php
    ob_start();  // Enable output buffering

    define("PRIVATE_PATH", dirname(__FILE__) . "/");
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . "/public_html/");
    define("SHARED_PATH", PRIVATE_PATH . "/shared/");

    // Page links:
    //     Production: http://usg.ezp.mybluehost.me/
    //     Dev:        http://192.168.1.75/public_html/
    define("HTTP_PUBLIC", "http://192.168.1.75/public_html/");
    define("TUTORIAL_LINK", HTTP_PUBLIC . "index.php#tutorials");
    define("UDEMY_LINK", "https://www.udemy.com/");
    define("BUY_ME_A_COFFEE_LINK", "https://www.buymeacoffee.com/");

    // TODO: Change from dev location
    define("CSS_PATH", HTTP_PUBLIC . "css/");
    define("JAVASCRIPT_PATH", HTTP_PUBLIC . "javascript/");
    define("COURSE_PATH", HTTP_PUBLIC . "courses/");
?>