<?php

use VenomError\Venom\Helper\Env;

if (Env::get('APP_ENV') == "production") {
    set_error_handler(function ($errno, $errstr, $errfile, $errline) {
        $error_message = "
ERROR DETECTED:
    \t|-Number of Error: $errno
    \t|-Error Message: $errstr
    \t|-File: $errfile
    \t|-Line: $errline
    ";
        error_log($error_message, 3, "./log/error.log"); // Simpan pesan kesalahan ke dalam file log
        print ("Error ($errno) Detetcted");
        die;
    });
} else {
    set_error_handler(function ($errno, $errstr, $errfile, $errline) {
        $error_message = "
ERROR DETECTED:
    \t|-Number of Error: $errno
    \t|-Error Message: $errstr
    \t|-File: $errfile
    \t|-Line: $errline
    ";
        print ($error_message);
        die;
    });
}