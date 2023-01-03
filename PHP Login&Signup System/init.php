<?php

    // Connect to database
    
    include $_SERVER['DOCUMENT_ROOT'] .'/admin/connect.php';

    // Routes

    $CSS = '/assets/css/';
    $JS  = '/assets/js/';
    $tpl = $_SERVER['DOCUMENT_ROOT'] . '/includes/';

    include $tpl . 'functions.php';
    include $tpl . 'header.php';