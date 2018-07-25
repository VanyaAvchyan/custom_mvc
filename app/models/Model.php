<?php
namespace app\models;

abstract class Model {
    public $data = null;
    public function __construct()
    {
        $config = config();
        $class_name = explode('\\',static::class);
        $class_name = array_pop($class_name);
        $class_name = str_replace('Model','', $class_name);
        $this->data = json_decode(file_get_contents(ROOT_PATH.$config['DB_PATH'].'/'.strtolower($class_name).'.json'));
    }

    public function __destruct() {
        $this->data = NULL;
    }
}