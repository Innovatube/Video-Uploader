<?php

namespace Innovatube\UploadVideo\Tests;

class File extends Base
{
    public function testFile()
    {
        $filePath = __DIR__ .'/video.mp4';

        // Test path
        $file = new \Innovatube\UploadVideo\File($filePath);
        $this->assertEquals($filePath, $file->getPath());

        // Test filesize
        $this->assertEquals(5176820, $file->getFileSize());

        // Test title
        $title = 'GOTHAM Victor Zsasz intro';
        $file->setTitle($title);
        $this->assertEquals($title, $file->getTitle());

        // Test privacy
        $privacy = \Innovatube\UploadVideo\File::PRIVACY_PUBLIC;
        $file->setPrivacy($privacy);
        $this->assertEquals($privacy, $file->getPrivacy());

        // Test description
        $description = 'The introduction to Victor Zsasz in Gotham.';
        $file->setDescription($description);
        $this->assertEquals($description, $file->getDescription());

        // Test tags
        $tags = ['Gotham', 'Victor Zsasz'];
        $file->setTags($tags);
        $this->assertEquals($tags, $file->getTags());

        // Test MIME
        $this->assertEquals('video/mp4', $file->getMIME());
    }
}