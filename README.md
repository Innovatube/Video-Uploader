# Innovatube/Video-Uploader

Upload video to many platforms.

## How to use

First, all platforms should be created.

```php
// Setup youtube
$youtube = new \Innovatube\UploadVideo\Platforms\YouTube($configYoutube);

// Setup Vimeo
$vimeo = new \Innovatube\UploadVideo\Platforms\Vimeo($configVimeo);
```

When you want to upload file, create new file instance with title, privacy, description, tags...

```php
$filePath = 'video.mp4';
$file = new \Innovatube\UploadVideo\File($filePath);
$file->setTitle('GOTHAM Victor Zsasz intro');
$file->setPrivacy(\Innovatube\UploadVideo\File::PRIVACY_PUBLIC);
$file->setDescription('The introduction to Victor Zsasz in Gotham.');
$file->setTags(['Gotham', 'Victor Zsasz']);
```

Finally, call the Uploader and let him upload the video.

```php
$uploader = new \Innovatube\UploadVideo\Uploader;
$uploader->setPlatform($youtube);
$uploader->setFile($file);
$uploader->setAccessToken($accessToken); // You must provide accessToken for the Uploader.

$response = $uploader->upload(); // The Uploader uploads video.

if ($response->success()) {
    echo 'Success';
} else {
    echo 'Error '. $response->getMessage();
}
```

## Supported Platforms

* Youtube

## License

This library is available under the MIT license. See the LICENSE file for more info.