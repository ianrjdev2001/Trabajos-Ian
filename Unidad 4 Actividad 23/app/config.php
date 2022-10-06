<?php
    session_start();
    if(!isset($_SESSION['global_token']))
    {
        $_SESSION['global_token'] = md5(uniqid(mt_rand(),true));
    }

?>