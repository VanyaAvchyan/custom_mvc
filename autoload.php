<?php
    include 'helpers/helpers.php';
    /**
     * Loads the required classes
     *
     * @param string $name Class name
     * @return void;
     */
    function autoloader($className)
    {
        try {
            $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
            $file = ROOT_PATH . $path . '.php';
            if (!is_file($file))
                throw new \Exception ('Class '.$className.' called on line '.__FILE__.': '.__LINE__.' not found');
            require_once($file);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            exit;
        }
    }
    spl_autoload_register('autoloader');
?>