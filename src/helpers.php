<?php

use NairanOmura\NotificationApi\NotificationApiService;

if (! function_exists('notification_api')) {
    function notification_api(array $data): bool
    {
        return (new NotificationApiService)->send($data);
    }
}
