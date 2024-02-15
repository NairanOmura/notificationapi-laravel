### Notification-api for Laravel

Package created to use the notification-api Service (https://www.notificationapi.com/) in Laravel projects

Official Doc for Notification Api: https://docs.notificationapi.com/

## Installation

To get the latest version of ```notificationapi-laravel``` on your project, require it from "composer":


	$ composer require nairanomura/notificationapi-laravel


Or you can add it directly in your composer.json file:

```json
{
    "require": {
        "nairanomura/notificationapi-laravel": "1.0"
    }
}
```


### Config

Register the provider directly in your app configuration file `config/app.php`:
```php
'providers' => [
	// ...
	
	NairanOmura\NotificationApi\NotificationApiServiceProvider::class,
]
```

This keys was offered by notification api after register an account

The following lines will be auto added in `config/services.php` by provider.

```php
return [
   
    ...
    ...
    /*
     * Add the Firebase API key
     */
    'notification-api' => [
        'key' => env('NOTIFICATION_API_KEY'),
        'secret' => env('NOTIFICATION_API_SECRET'),
    ]
];
```

So add the following environment variables in .env file to finish a configuration:

```dotenv
#.env
NOTIFICATION_API_KEY="clientiD"
NOTIFICATION_API_SECRET="clientSecret"
```

### Using
Use Artisan to create a notification:

```bash
php artisan make:notification SomeNotification
```

Return `[notification-api]` in the `public function via($notifiable)` method of your notification:

```php
public function via($notifiable)
{
    return ['notification-api'];
}
```

Add the method `public function toNotificationApi($notifiable)` to your notification:

```php
...

public function toNotificationApi($notifiable) 
{
    return [
        "notificationId" => "notification_example",
        "user" => [
            "id" => $notifiable->getAttribute('id'),
            "email" => $notifiable->getAttribute('email'),
        ],
        "mergeTags" => [
            "userName" => auth()->user()->name,
            "clickAction" => config('app.env')."/operation/$this->contractNumber/liquidation"
        ]
    ];
}
```
#### example of notification send
*Attention: To call notification by the user model, the User model must be "Notifiable" Trait

```php
    class User extends Authenticatable
    {
        use Notifiable;
    ...
```

```php
#notify one user
$user->notify((new SomeNotification(..)));

#notify multiple users
Notification::send($users, new SomeNotification(..);
```



### Extra: Helpers
After install and configure we can use the library calling the helper `notification_api` or class `NotificationApiService`

Example:

```php
$data = [
  "notificationId" => "order_tracking",
  "user" => [
    "id" => "example@mail.com",
    "email" => "example@mail.com",
    "number" => "+15005550006"
  ],
  "mergeTags" => [
    "item" => "Krabby Patty Burger",
    "address" => "124 Conch Street",
    "orderId" => "1234567890"
  ]
];

$result = notification_api($data);
#or
$result = (new NotificationApiService)->send($data)
```