# Creative Tim's Material Dashboard Laravel 5

This package provides an easy way to quickly set up [Material Dashboard](https://www.creative-tim.com/product/material-dashboard) with Laravel 5. It has no requirements and dependencies besides Laravel, so you can start building your admin panel immediately. The package just provides a Blade template that you can extend and advanced menu configuration possibilities. A replacement for the `make:auth` Artisan command that uses Material Dashboard styled views instead of the default Laravel ones is also included.

1. [Installation](#1-installation)
2. [Updating](#2-updating)
3. [Usage](#3-usage)
4. [Configuration](#5-configuration)
   1. [Menu](#51-menu)
5. [Issues, Questions and Pull Requests](#8-issues-questions-and-pull-requests)

## 1. Installation

1. Require the package using composer:

    ```
    composer require agjmills/laravel-material-dashboard
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    > Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider

    ```php
    Agjmills\LaravelMaterialDashboard\MaterialDashboardServiceProvider::class,
    ```

3. Publish the public assets:

    ```
    php artisan vendor:publish --provider="Agjmills\\MaterialDashboard\\ServiceProvider" --tag=assets
    ```
    
4. Publish the configuration:

    ```
    php artisan vendor:publish --provider="Agjmills\\MaterialDashboard\\ServiceProvider" --tag=config
    ```

## 2. Updating

1. To update this package, first update the composer package:

    ```
    composer update agjmills/laravel-material-dashboard
    ```

2. Then, publish the public assets with the `--force` flag to overwrite existing files

    ```
    php artisan vendor:publish --provider="Agjmills\\LaravelMaterialDashboard\\ServiceProvider" --tag=assets --force
    ```

## 3. Usage

To use the template, create a blade file and extend the layout with `@extends('MaterialDashboard::dashboard')`.
This template yields the following sections:

- `title`: for in the `<title>` tag
- `content_header`: title of the page, above the content
- `content`: all of the page's content
- `css`: extra stylesheets (located in `<head>`)
- `js`: extra javascript (just before `</body>`)

All sections are in fact optional. Your blade template could look like the following.

```html
@extends('MaterialDashboard::admin')

@section('title', 'Dashboard')

@section('content_header')
    Dashboard
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
```

Note that in Laravel 5.2 or higher you can also use `@stack` directive for `css` and `javascript`:

```html
{{-- resources/views/admin/dashboard.blade.php --}}

@push('css')

@push('js')
```

You now just return this view from your controller, as usual. Check out [AdminLTE](https://almsaeedstudio.com) to find out how to build beautiful content for your admin panel.

If you wish to use a Material Dashboard theme for unauthenticated views, you can extend the unauthenticated view:

```html
@extends('MaterialDashboard::unauthenticated')
```

This is useful when paired with Laravel's ```php artisan make:auth``` 

## 4. Configuration

First, publish the configuration file:

```
php artisan vendor:publish --provider="Agjmills\\MaterialDashboard\\ServiceProvider" --tag=config
```

Now, edit `config/laravel-material-dashboard.php` to configure the dashboard url, logo, navigation bar background image and menu. All configuration options are explained in the comments. However, I want to shed some light on the `menu` configuration.

### 4.1 Menu

You can configure your menu as follows:

```php
'menu' => [
        [
            'route' => 'admin.dashboard',
            'icon' => 'fa-tachometer',
            'text' => 'Dashboard',
        ],
        [
            'text' => 'Content Management',
            'links' => [
                [
                    'link' => '#',
                    'icon' => 'fa-file-text',
                    'text' => 'Can only see this if you can manage users',
                    'permissions' => [
                        'action' => 'manage',
                        'resource' => \App\User::class,
                    ],
                ],
                [
                    'route' => 'admin.users.edit',
                    'parameters' => 1,
                    'icon' => 'fa-file-text',
                    'text' => 'This will edit user id 1',
                ],
            ],
        ],
    ],
```

Without providing a link or route, a menu item can act as a menu header to separate the items.
With an array, you specify a menu item. `text` and `link` or `route` are required attributes.
The `icon` is optional, and he available icons that you can use are those from 
[Font Awesome](https://fontawesome.com/v4.7.0/icons/).
Just specify the name of the icon and it will appear in front of your menu item.

Use the `permissions` option if you want conditionally show the menu item. This integrates with Laravel's `Gate` 
functionality. 

```php
'permissions' => [
    'action' => 'manage',
    'resource' => \App\User::class,
],
```

This is the equivalent of:
```php
@can ('manage', \App\User::class)
```

## 5. Issues, Questions and Pull Requests

You can report issues and ask questions in the [issues section](https://github.com/agjmills/laravel-material-dashboard/issues). Please start your issue with `ISSUE: ` and your question with `QUESTION: `

If you have a question, check the closed issues first.

To submit a Pull Request, please fork this repository, create a new branch and commit your new/updated code in there. Then open a Pull Request from your new branch. Refer to [this guide](https://help.github.com/articles/about-pull-requests/) for more info.

