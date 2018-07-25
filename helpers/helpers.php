<?php

/**
 * Get configs
 * 
 * @param string|null $name config key name
 */
$config = parse_ini_file('config.ini');
function config($name = null)
{
    global $config;
    if(!$name)
        return $config;
    return isset($config[$name])?$config[$name]: null;
}

/**
 * Redirecting user to another page whith status
 * $redType by default  = 302
 * @param string $path
 * @param integer $redType
 */
function redirect_to($path, $redType = false)
{
    if($redType)
        header( 'Location: '.$path, true, $redType );
    else
        header( 'Location: '.$path);
    exit;
}

/**
 * Die Dump helps you view one or more variables
 */
function dd()
{
    $args = func_get_args();
    if($args)
    {
        $print = $args[count($args) - 1] !== false;
        if(!$print)
            array_pop($args);
    }
    
    echo "<pre>";
    foreach ($args as $arg)
    {
        if($print)
            print_r ($arg);
        else
            var_dump ($arg);
        echo '<br>';
    }
    exit;
}
