<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'token' => env(
        'MAPBOX_ACCESS_TOKEN',
        'pk.eyJ1IjoiYWxleGludmVudGlvbiIsImEiOiJja2ttZXN0dHQzN29uMnVvY3U5am13ZGt6In0._f_4UOuTHo-35LfZOVEyxw'
    ),
    ];
