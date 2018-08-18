<?php

return [

    'connection' => env('ADLDAP_CONNECTION', 'default'),
    
    // 'provider' => Adldap\Laravel\Auth\NoDatabaseUserProvider::class,
    'resolver' => Adldap\Laravel\Auth\Resolver::class,
    'importer' => Adldap\Laravel\Auth\Importer::class,
    
    'rules' => [
        Adldap\Laravel\Validation\Rules\DenyTrashed::class,
    ],
    
    'scopes' => [
        Adldap\Laravel\Scopes\UpnScope::class,
    ],
    
    'usernames' => [
     'ldap' => 'userprincipalname',
    'eloquent' => 'email',
    ],
    
    'login_fallback' => env('ADLDAP_LOGIN_FALLBACK', true),
    'password_sync' => env('ADLDAP_PASSWORD_SYNC', true),
    'windows_auth_attribute' => ['mail' => 'AUTH_USER'],
    
    'sync_attributes' => [
    'username' => 'samaccountname',
    'name' => 'cn',
    ],

];
