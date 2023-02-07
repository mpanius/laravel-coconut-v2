# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nidhalkratos/laravel-coconut-v2.svg?style=flat-square)](https://packagist.org/packages/nidhalkratos/laravel-coconut-v2)
[![Total Downloads](https://img.shields.io/packagist/dt/nidhalkratos/laravel-coconut-v2.svg?style=flat-square)](https://packagist.org/packages/nidhalkratos/laravel-coconut-v2)

A laravel wrapper package for coconut transcoding api. 
Check the official php library at `https://github.com/opencoconut/coconutphp` for more

## Installation

You can install the package via composer:

```bash
composer require nidhalkratos/laravel-coconut-v2
```

## Usage
Set these environment variables to let coconut connect to the gcs bucket
```bash
# .env
COCONUT_API_KEY=
COCONUT_GCS_BUCKET=
COCONUT_GCS_KEY=
COCONUT_GCS_SECRET=
```

The package will fire an event whenever a coconut sends a notification
and thus you need to create a listeners for the event to fire whenever the event is fired
Coconut will send webhook events to the route named coconut.callback (Created by the package)

```php
// Create a coconut instance
$coconut = app('coconut');
$coconut->notification = [
    'type' => 'http',
    'url' =>  route('coconut.callback',$this->id),
    'metadata' => true
];

//Parameters
$jobParams = [
    'input' => ['url' => $this->rawUrl()],
    'outputs' => [
        'jpg:720x' => Storage::disk('gcs')->path($this->THUMBNAIL_DIRECTORY_PATH . $this->id . '.jpg') 
    ]
];

//Create the job
$job = $coconut->job->create($jobParams);

```



### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nidhalkratos@gmail.com instead of using the issue tracker.

## Credits

-   [Nidhal Abidi](https://github.com/nidhalkratos)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
