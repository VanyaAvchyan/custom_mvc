<?php
/**
 * Main file
 */
define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
session_start();
    include 'autoload.php';
    /**
     * The main class through which the system logs on
     */
    \app\Application::getInstance()->render();
?>