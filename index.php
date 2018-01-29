<?php

require_once(__DIR__ . '/vendor/autoload.php');

if (!file_exists(__DIR__ . '/settings.php'))
{
    echo "Please copy settings.php.example to settings.php and fill out your settings." . PHP_EOL;
    die;
}

$settings = require(__DIR__ . '/settings.php');

$filename = $settings['filename'];
$bucket   = $settings['bucket'];

$google_client = new Google_Client();
putenv("GOOGLE_APPLICATION_CREDENTIALS={$settings['authKeyFile']}");

$google_client->useApplicationDefaultCredentials();
$google_client->setAccessType("offline");
$google_client->setScopes(['https://www.googleapis.com/auth/devstorage.read_write']);

$google_storage_service = new Google_Service_Storage($google_client);

$metaData = $google_storage_service->objects->get($settings['bucket'], $settings['filename']);

//var_dump($metaData);
// object(Google_Service_Storage_StorageObject)#61 (38) {
// ...
// }


$fileData = $google_storage_service->objects->get($settings['bucket'], $settings['filename'], ['alt' => 'media']);

var_dump($fileData);
// object(GuzzleHttp\Psr7\Response)#45 (6) {
// ...
// }

assert($fileData instanceof Google_Service_Storage_StorageObject, 'Unexpected class returned. Expected Google_Service_Storage_StorageObject but got ' . get_class($fileData) . 'instead.');
// Warning: assert(): Unexpected class returned. Expected Google_Service_Storage_StorageObject but got GuzzleHttp\Psr7\Responseinstead.