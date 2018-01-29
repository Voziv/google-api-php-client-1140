# Code example for google/google-api-php-client#1140

Function documentation and type hinting does not reflect what's being returned.


### Note:
In `Google_Service_Resource::call($name, $arguments, $expectedClass)` we find code that answers our question.
If we're fetching media the raw response is returned instead of the class specified in the phpdoc.

```
// if this is a media type, we will return the raw response
// rather than using an expected class
if (isset($parameters['alt']) && $parameters['alt']['value'] == 'media') {
  $expectedClass = null;
}
```

## Running
1. `composer install`
2. Copy `settings.example.php` to `settings.php` and adjust the values.
3. Run `php index.php` 

Note:

I tested this using the following PHP version:

```
PHP 7.1.12 (cli) (built: Dec  2 2017 12:15:25) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2017 Zend Technologies
```