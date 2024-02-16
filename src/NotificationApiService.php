<?php

namespace NairanOmura\NotificationApi;

use NotificationAPI\NotificationAPI as NotificationAPIBase;

class NotificationApiService extends NotificationAPIBase
{
    public function __construct()
    {
        parent::__construct(
            config('services.notification-api.key'),
            config('services.notification-api.secret')
        );
    }
}
