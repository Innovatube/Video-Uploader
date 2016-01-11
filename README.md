# trihtm/Video-Uploader

Upload video to many platforms.

## How to use

First, all platforms should be created.

```php
// Setup youtube
$youtube = new \TriHTM\UploadVideo\Platforms\YouTube($configYoutube);

// Setup Vimeo
$vimeo = new \TriHTM\UploadVideo\Platforms\Video($configVimeo);
```

When you want to upload file, create new file instance with title, privacy, description, tags...

```php
$filePath = '/data/video.mp4';
$file = new \TriHTM\UploadVideo\File($filePath);
$file->setTitle('GOTHAM Victor Zsasz intro');
$file->setPrivacy(\TriHTM\UploadVideo\File::PRIVACY_PUBLIC);
$file->setDescription('The introduction to Victor Zsasz in Gotham.');
$file->setTags(['Gotham', 'Victor Zsasz']);
```

Finally, call the Uploader and let him upload the video.

```php
$uploader = new \TriHTM\UploadVideo\Uploader;
$uploader->setPlatform($youtube);
$uploader->setFile($file);
$uploader->setAccessToken($accessToken); // You should provide accessToken to the Uploader.

$response = $uploader->upload(); // The Uploader uploads video.

var_dump($response); // Dump response.
```

## Supported Platforms

* Youtube

## License

This library is available under the MIT license. See the LICENSE file for more info.