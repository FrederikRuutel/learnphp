<?php

// Use Composer when installed; the learning project also runs without vendor/.
if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
} else {
    spl_autoload_register(function ($class) {
        $prefix = 'App\\';
        if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
            return;
        }
        $file = __DIR__ . '/src/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
        if (is_file($file)) {
            require $file;
        }
    });
}

if (!function_exists('dump')) {
    function dump(...$values) {
        foreach ($values as $value) {
            ob_start();
            var_dump($value);
            echo '<pre>' . htmlspecialchars(ob_get_clean(), ENT_QUOTES, 'UTF-8') . '</pre>';
        }
    }
}
