<?php
    
    // URL of current page.
    global $URL;
    
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') $URL = "https";
    else $URL = "http";

    $URL .= "://";
    $URL .= $_SERVER['HTTP_HOST'];

    // Error message disable / enable 

    error_reporting(0);
    ini_set('display_errors', 0); 


?>