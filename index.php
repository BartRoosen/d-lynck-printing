<?php

require __DIR__ . '/vendor/autoload.php';

if ('/d-lynck-printing/' === $_SERVER['REQUEST_URI']) {
    header('location: /d-lynck-printing/home');
} else {
    new \Services\NavigationService($_SERVER['REQUEST_URI']);
}

