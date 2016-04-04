<?php

spl_autoload_register(function ($class) {
    $prefix = 'RadeqBootstrapForm2';
    // does the class use the namespace prefix?
    if (strpos($class, $prefix) === false) {
        return;
    }

    //resolve file name
    $file = __DIR__. '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

