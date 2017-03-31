# WpNonce
WpNonce is a static wrapper class for Wordpress wp_nonce* functions.

## Install

```
composer require alexlg89/wpnonce
```

Or just add

```
"require alexlg89/wpnonce": "0.0.1"
```
to your `compsoer.json` file and run a compposer update.

## Usage:

### Create an URL with a nonce parameter
```php
$url = 'http://mysite.com/custommers';
$action = 'add-customer';
$name = '_myNonce';
$nonceUrl = WpNonce::url($url, $action, $name);
```

Or just use the default name by skipping the last parameter.

```php
$nonceUrl = WpNonce::url($url, $action);
```

### Create a nonce field with a specific action
```php
$action = 'add-customer';
WpNonce::field($action);

```

You also can set the referer as second parameter

```php
$referer = 'http://mysite.com/dashboard';
WpNonce::field($action, $referer);
```

The third parameter alows you to just get the nonce field and skip the referer field, if set to false.

```php
WpNonce::field($action, $referer, false);
```

You can let the field function return the html as string, if  you set the fourth parameter to false.

```php
$html = WpNonce::field($action, $referer, true, false);
```

### Create a nonce with a specific action

```php
$action = 'add-customer';
$nonce = WpNonce::create($action);
```

### Check an URL for a vaild nonce
```php
$action = 'add-customer';
$name = '_myNonce';
$retval = WpNonce::checkAdminReferer($action, $name);
```

Or just use the default name by skipping the last parameter.

```php
$retval = WpNonce::checkAdminReferer($action);
```

### Check an AJAX URL for a vaild nonce
```php
$action = 'add-customer';
$queryArg = '_myNonce';
$retval = WpNonce::check_ajax_referer($action, $queryArg);
```

If the third parameter is set to false, the script won't die, if the nonce is invalid

```php
$retval = WpNonce::check_ajax_referer($action, $queryArg, false);
```

### Verify a nonce with a specific action

```php
$nonce = 'an2bf72h';
$action = 'add-customer';
$retval = WpNonce::verify($nonce, $action);
```

### Default nonce

```php
const DEFAULT_NONCE = '_wpnonce';
```