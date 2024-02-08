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
Add the following environment variables in .env file:

* `NOTIFICATION_API_KEY`
* `NOTIFICATION_API_SECRET`

This keys was offered by notification api after register an account

### Use
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