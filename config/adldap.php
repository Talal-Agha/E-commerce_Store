<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Connections
    |--------------------------------------------------------------------------
    |
    | This array stores the connections that are added to Adldap. You can add
    | as many connections as you like.
    |
    | The key is the name of the connection you wish to use and the value is
    | an array of configuration settings.
    |
    */

    'connections' => [
 'default' => [
            'auto_connect' => false,
            'connection' => Adldap\Connections\Ldap::class,
            'schema' => Adldap\Schemas\ActiveDirectory::class,
            'connection_settings' => [
                'account_prefix' => env('ADLDAP_ACCOUNT_PREFIX', ''),
                'account_suffix' => env('ADLDAP_ACCOUNT_SUFFIX', ''),
                'domain_controllers' => explode(' ', env('ADLDAP_CONTROLLERS', '')),
                'port' => env('ADLDAP_PORT', 389),
                'timeout' => env('ADLDAP_TIMEOUT', 5),
                'base_dn' => env('ADLDAP_BASEDN', ''),
                'admin_account_prefix' => env('ADLDAP_ADMIN_ACCOUNT_PREFIX', ''),
                'admin_account_suffix' => env('ADLDAP_ADMIN_ACCOUNT_SUFFIX', ''),
                'admin_username' => env('ADLDAP_ADMIN_USERNAME', ''),
                'admin_password' => env('ADLDAP_ADMIN_PASSWORD', ''),
                'follow_referrals' => false,
                'use_ssl' => false,
                'use_tls' => false,
            ],

        ],

    ],

];