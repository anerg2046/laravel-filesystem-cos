# Laravel filesystem COS 

[Tencent Cloud COS](https://cloud.tencent.com/product/cos) storage for Laravel

# Requirement

- PHP >= 7.1

# Installation

```shell
$ composer require "dscmall/laravel-filesystem-cos" -vvv
```

# Configuration

1. Add a new disk to your `config/filesystems.php` config:
 ```php
 <?php

 return [
    'disks' => [
        //...
        'cos' => [
         'driver' => 'cos',
        'region'          => env('COS_REGION', 'ap-guangzhou'),
        'credentials'     => [
            'appId'     => env('COS_APP_ID'),
            'secretId'  => env('COS_SECRET_ID'),
            'secretKey' => env('COS_SECRET_KEY'),
        ],
        'timeout'         => env('COS_TIMEOUT', 60),
        'connect_timeout' => env('COS_CONNECT_TIMEOUT', 60),
        'bucket'          => env('COS_BUCKET'),
        'cdn'             => env('COS_CDN'),
        'scheme'          => env('COS_SCHEME', 'https'),
        'read_from_cdn'   => env('COS_READ_FROM_CDN', false),
        ],
        //...
     ]
 ];
 ```

# Usage

```php
$disk = Storage::disk('cos');

// create a file
$disk->put('avatars/filename.jpg', $fileContents);

// check if a file exists
$exists = $disk->has('file.jpg');

// get timestamp
$time = $disk->lastModified('file1.jpg');
$time = $disk->getTimestamp('file1.jpg');

// copy a file
$disk->copy('old/file1.jpg', 'new/file1.jpg');

// move a file
$disk->move('old/file1.jpg', 'new/file1.jpg');

// get file contents
$contents = $disk->read('folder/my_file.txt');

// fetch url content
$file = $disk->fetch('folder/save_as.txt', $fromUrl);

// get file url
$url = $disk->getUrl('folder/my_file.txt');
```

[Full API documentation.](http://flysystem.thephpleague.com/api/)

# License

MIT
