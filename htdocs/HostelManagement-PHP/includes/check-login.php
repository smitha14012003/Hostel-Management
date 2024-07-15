<?php
function check_login()
{
    // Check if $_SESSION['id'] is set and not empty
    if(isset($_SESSION['id']) && strlen($_SESSION['id']) == 0)
    {
        // Redirect to index.php if $_SESSION['id'] is not set or empty
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php";
        $_SESSION["id"] = "";
        header("Location: http://$host$uri/$extra");
        exit; // Exit the script after redirecting
    }
}
?>
