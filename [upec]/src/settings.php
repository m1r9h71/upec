<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header


        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'pdo' => [
            'dsn' => "mysql:host=localhost:3307;dbname=upec",
            // 'dsn' => "sqlite:".__DIR__.'/../db/persons.sqlite',
            'user' => 'root',
            'pass' => '',
        ],


    ],


];





