# Redirect in Laravel to URL without slash
If your server not configured for redirect from urls with slash to url without it, you can use this method in Laravel

## Installation

- Put the file ```UrlWithoutSlash.php``` to ```app\Http\Middleware``` dirrectory.
- Edit file ```app\Http\Kernel.php```
- Write ```\App\Http\Middleware\UrlWithoutSlash::class,```. It should looks like this:
```php
protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\UrlWithoutSlash::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];
```
- Make sure that .env file has proper variable APP_URL. For example: ```APP_URL=https://your-site.com```
- Try to open in browser any URL:
```https://your-site.com/uri/```
or
```https://your-site.com/uri/?parametr=something```

They should be redirected to ```https://your-site.com/uri``` and ```https://your-site.com/uri?parametr=something``` respectively.
