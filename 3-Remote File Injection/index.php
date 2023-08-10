<?php
if(isset($_GET['page'])) {
    $allowed = array('tips.txt'); 
    $page = $_GET['page'];
    if(in_array($page,$allowed)) {
        include($page);
    } else {
        echo 'not allowed page';
    }
}