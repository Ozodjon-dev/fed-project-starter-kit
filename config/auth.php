<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Barcha autentifikatsiya tizimlari user provider ishlatadi.
    | Biz foydalanuvchilarni `login` maydoni bo‘yicha olish uchun
    | `eloquent` driveridan foydalanamiz.
    |
    | Laravel by default `email` orqali tekshiradi, shuning uchun biz
    | foydalanuvchini `login` maydoni orqali olishni sozlaymiz.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // "custom" emas, "eloquent" bo'lishi kerak
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Foydalanuvchilar uchun parolni tiklash sozlamalari.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Parolni qayta kiritishdan oldin qancha vaqt otishi kerakligini belgilaydi.
    |
    */

    'password_timeout' => 10800,

];
