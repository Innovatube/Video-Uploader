<?php

// Show all errors for debug.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../vendor/autoload.php');

// Config
$configPlatform = [
    'clientId' => '524638364880-ug5cm5r093un2tv25otipajud9hm584h.apps.googleusercontent.com',
    'clientSecret' => 'mdFvPn5DMxFLtsXmZdUWZr6t',
    'scopes' => 'https://www.googleapis.com/auth/youtube',
];

$accessToken = '{"access_token":"ya29.ZgL9F-jd0WeZDkZlYEk2SHVXGvNdGuQTD_yK-2XgqHp2rLTWJt1Phineue9kbjlifOBz","token_type":"Bearer","expires_in":3600,"created":1452504521}';
$filePath = __DIR__ .'/video.mp4';
// End config

// Hiring the Uploader
$uploader = new \TriHTM\UploadVideo\Uploader;

// Set file
$file = new \TriHTM\UploadVideo\File($filePath);
$file->setTitle('GOTHAM Victor Zsasz intro');
$file->setPrivacy(\TriHTM\UploadVideo\File::PRIVACY_PUBLIC);
$file->setDescription('The introduction to Victor Zsasz in Gotham.');
$file->setTags(['Gotham', 'Victor Zsasz']);

// Set platform
$platform = new \TriHTM\UploadVideo\Platforms\YouTube($configPlatform);

// The Uploader uploads video
$uploader->setPlatform($platform);
$uploader->setFile($file);
$uploader->setAccessToken($accessToken);

$response = $uploader->upload();

var_dump($response);

exit;