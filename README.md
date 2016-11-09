# RedeyeStormpathBundle

This bundle integrates Stormpath into Symfony.

## Installation via Composer

    composer require redeye/stormpath-bundle

## Configuration
Register the bundle:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Redeye\StormpathBundle\RedeyeStormpathBundle(),
    );
    // ...
}
```

Get your `stormpath.properties` file and drop it somewhere convenient, like `app/config/`.

Use this as a sample minimal bundle configuration:

```yaml
# app/config/config.yml
redeye_stormpath:
    client:
        api_key_file: %kernel.root_dir%/config/stormpath.properties
```

Whereas this would be a more complete configuration:

```yaml
# app/config/config.yml
redeye_stormpath:
    client:
        api_key_file: %kernel.root_dir%/config/stormpath.properties
        cache:
            type: redis # or array, memcached, null, service
            redis:
                host: 127.0.0.1
                port: 6379
            memcached:
            	- { host: 127.0.0.1, port: 11211, weight: 1 }
            service: your_own_psr_6_cache
            ttl: 60
            tti: 120
        tentant_href: https://api.stormpath.com/v1/tenants/123abc
        default_application_href: https://api.stormpath.com/v1/applications/124abd
    resource_registries:
        groups:
            mygroup: https://api.stormpath.com/v1/groups/111aaa

```

## Usage

The bundle comes with a Stormpath user provider and two Stormpath authenticators, one for HTTP Basic and one for Form login.

Here's an example security.yml using the form login:

```yaml
# app/config/security.yml
security:
    encoders:
        Symfony\Component\Security\Core\User\User: plaintext

    providers:
        stormpath:
            id: redeye_stormpath.security.user_provider

    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            pattern: ^/
            anonymous: true
            stormpath_form_login:
                login_path: login
                check_path: login_check
            logout:
                path: logout
                target: /

    access_control:
        - { path: ^/login, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/, role: ROLE_ADMIN }
```

## Nice to haves

This bundle features a few nice-to-haves:

* Setting the `tenant_href` config setting saves a Stormpath API call per request
* Setting either `default_application_name` or `default_application_href` saves another Stormpath API call per request
* Resource registries allow you to refer to Stormpath groups and directories by a chosen name rather than a long ID. To dereference, get the appropriate service (`redeye_stormpath.resource_registry.group_href` or `redeye_stormpath.resource_registry.directory_href`) and call e.g. `$href = $registry->get('mygroup');` to get the appropriate href.
* Setting a custom data property named "role" on an application, a directory or a group, all users in that application/directory/group will get that role.

## Not yet implemented

There's still a bunch of things not yet implemented in the bundle. These include (but the list is not exhaustive):

* Social login
* ID Sites (for SSO)
* SAML
* Token Auth
* MFA
* Active Directory

We do accept pull requests, if you need one of these features and feel up to implement it.
