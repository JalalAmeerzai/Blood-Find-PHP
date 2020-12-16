<?php
require '../include.php';
    session_start();
    unset($_SESSION['user']);
    session_destroy();
    
    echo('<script>window.location = "../website/login.php"</script>;');
    
?>