# Laravel Material Dashboard PRO

[![Build Status](https://scrutinizer-ci.com/g/KielD-01/laravel-material-dashboard-pro/badges/build.png?b=main)](https://scrutinizer-ci.com/g/KielD-01/laravel-material-dashboard-pro/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/KielD-01/laravel-material-dashboard-pro/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/KielD-01/laravel-material-dashboard-pro/?branch=main)
[![Github All Releases](https://img.shields.io/github/downloads/KielD-01/laravel-material-dashboard-pro/total.svg)]()

## Installation

```bash
composer require kield01/laravel-material-dashboard-pro
```

## Configuration

To publish needed configs and resources (js, css) run:

```bash
php artisan vendor:publish --provider=KielD01\LaravelMaterialDashboardPro\Providers\CoreServiceProvider
```

## Versions compatibility

|Laravel/PHP|5.5                |5.6                |5.7             |7.x               |8.x               |
|-----------|------------------|------------------|------------------|------------------|------------------|
|5.x        |:x:|:x:|:x:|:x:|:x:|
|6.x        |:x:|:x:|:x:|:x:|:x:|
|7.x        |:x:|:x:|:x:|:heavy_check_mark:|:heavy_check_mark:|
|8.x        |:x:|:x:|:x:|:heavy_check_mark:|:heavy_check_mark:|

## Menu Building

Menu items has to be placed at the `config/mdp/menu.php`.   
Here is an example of the possible menu structure:

```php
<?php

declare(strict_types=1);

return [
    [
        'title' => 'Dashboard',
        'link' => [
            'type' => MenuItemLinkType::ROUTE,
            'route' => 'dashboard.index',
        ],
        'icon' => new MaterialIcon('dashboard'),
    ],
    [
        'title' => 'Users',
        'icon' => new FontAwesomeIcon('login'),
        'children' => [
            [
                'title' => 'Create User',
                'link' => [
                    'type' => MenuItemLinkType::URI,
                    'uri' => '/mdp/users/create',
                ],
            ]
        ]
    ],
];
```

Link type `MenuItemLinkType::ROUTE` usage strongly recommended instead of `MenuItemLinkType::URI`

## Layouts, Templates, Widgets

|*Name*|*Blade reference*|
|----|---------------|
|Dashboard|[mdp::layouts.main](./src/resources/views/layouts/main.blade.php)|
|User Sign In / Sign Up|[mdp::layouts.user.auth-v1](./src/resources/views/layouts/user/auth-v1.blade.php)|

## Demo Pages

[Dashboard](./src/resources/views/pages/dashboard/index.blade.php)  
[Sign In](./src/resources/views/pages/user/login.blade.php)     
[Sign Up](./src/resources/views/pages/user/register.blade.php)
