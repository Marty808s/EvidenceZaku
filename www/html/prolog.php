<?php
session_start(); // Zahájení session

define('INC', __DIR__ . '/includes');
define('TOOLS', __DIR__ . '/tools');

function setUser($username){
    $_SESSION['user'] = $username;
}


function getUser(){
    return $_SESSION['user'];
}


function isUser(){
    return isset($_SESSION['user']);
}

