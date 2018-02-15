
<?php
//require "../config/config.ini";
//$config = parse_ini_file("../config/config.ini");
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
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        //Database connection settings
        'dbConnection' => [
            'hostName' => $config["hostName"],
            'userName' => $config["userName"],
            'password' => $config["password"],
            'dbName' => $config["dbName"]
        ]
    ]
];
