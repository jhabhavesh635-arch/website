<?php
session_start();

// unset all session variables
$_SESSION = [];

// destroy session
session_destroy();

// optional: prevent back button access
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// redirect to login
header("Location: login.php");
exit();
?>
<?php
session_start();
session_destroy();

header("Location: login.php");
exit();
?>