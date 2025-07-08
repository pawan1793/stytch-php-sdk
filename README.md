# Stytch PHP SDK

Official PHP SDK for Stytch Authentication APIs. This SDK provides easy-to-use methods for integrating Stytch's authentication services into your PHP applications.

## Features

- **B2B API Support**: Complete coverage of Stytch's B2B authentication APIs
- **Consumer API Support**: Full support for consumer authentication endpoints
- **Modern PHP**: Built for PHP 7.4+ with modern features
- **Type Safety**: Full type hints and documentation
- **Error Handling**: Comprehensive error handling and exceptions
- **PSR Standards**: Follows PSR-4 autoloading and PSR-7 HTTP standards

## Installation

### Via Composer

```bash
composer require pawanmore/stytch-php-sdk
```

### Manual Installation

1. Clone this repository
2. Run `composer install`
3. Include the autoloader in your project

## Quick Start

### Initialize the SDK

```php
<?php

use Stytch\StytchClient;

// Initialize with your project credentials
$stytch = new StytchClient([
    'project_id' => 'your-project-id',
    'secret' => 'your-secret-key',
    'env' => 'test' // or 'live'
]);
```

### B2B API Examples

```php
// Create an organization
$response = $stytch->b2b->organizations->create([
    'organization_name' => 'My Company',
    'organization_slug' => 'my-company'
]);

// Create a member
$response = $stytch->b2b->members->create([
    'organization_id' => 'org_123',
    'email_address' => 'user@company.com'
]);

// Send magic link
$response = $stytch->b2b->magicLinks->send([
    'organization_id' => 'org_123',
    'email_address' => 'user@company.com'
]);
```

### Consumer API Examples

```php
// Create a user
$response = $stytch->consumer->users->create([
    'email' => 'user@example.com'
]);

// Send magic link
$response = $stytch->consumer->magicLinks->send([
    'email' => 'user@example.com'
]);

// Authenticate magic link
$response = $stytch->consumer->magicLinks->authenticate([
    'token' => 'magic_link_token'
]);
```

## API Coverage

### B2B API
- **Organizations**: Create, get, update, search, delete
- **Members**: Create, get, update, search, delete, reactivate
- **RBAC**: Get RBAC policies
- **Magic Links**: Send, authenticate, discovery
- **OAuth**: Google, Microsoft authentication
- **Session Management**: Get, authenticate, exchange, revoke
- **SSO**: SAML, OIDC connections
- **Discovery**: List organizations, create via discovery
- **Passwords**: Authenticate, reset, strength check, migrate
- **MFA**: TOTP, OTP, recovery codes
- **M2M**: Client management, access tokens
- **Email OTP**: Send, authenticate
- **Impersonation**: Authenticate tokens

### Consumer API
- **Users**: Create, get, update, search, delete
- **Magic Links**: Send, authenticate, embeddable
- **OTP**: SMS, WhatsApp, email
- **OAuth**: Multiple providers (Google, Apple, GitHub, etc.)
- **Session Management**: Get, authenticate, revoke
- **TOTP**: Create, authenticate, recovery codes
- **Crypto Wallets**: Authenticate
- **Passkeys & WebAuthn**: Register, authenticate
- **Passwords**: Authenticate, reset, strength check

## Error Handling

The SDK throws specific exceptions for different error types:

```php
try {
    $response = $stytch->consumer->users->create(['email' => 'invalid-email']);
} catch (Stytch\Exceptions\StytchException $e) {
    echo "Stytch Error: " . $e->getMessage();
} catch (Stytch\Exceptions\StytchError $e) {
    echo "API Error: " . $e->getMessage();
    echo "Error Code: " . $e->getErrorCode();
}
```

## Configuration

### Environment Variables

You can also configure the SDK using environment variables:

```bash
STYTCH_PROJECT_ID=your-project-id
STYTCH_SECRET=your-secret-key
STYTCH_ENV=test
```

### Advanced Configuration

```php
$stytch = new StytchClient([
    'project_id' => 'your-project-id',
    'secret' => 'your-secret-key',
    'env' => 'test',
    'timeout' => 30,
    'user_agent' => 'MyApp/1.0',
    'http_client' => new CustomHttpClient()
]);
```

## Testing

Run the test suite:

```bash
composer test
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests
5. Submit a pull request

## License

MIT License - see LICENSE file for details.

## Support

- Documentation: https://stytch.com/docs
- API Reference: https://stytch.com/docs/api
- Support: support@stytch.com 