<?php

namespace NairanOmura\NotificationApi;

class NotificationApiService extends NotificationAPI
{
    public function __construct()
    {
        parent::__construct(
            config('services.notification-api.key'),
            config('services.notification-api.secret')
        );
    }
}
