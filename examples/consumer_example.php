<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Stytch\StytchClient;

// Initialize the Stytch client
$stytch = new StytchClient([
    'project_id' => 'your-project-id',
    'secret' => 'your-secret-key',
    'env' => 'test' // or 'live'
]);

try {
    // Consumer Users
    echo "=== Consumer Users ===\n";
    
    // Create a user
    $userResponse = $stytch->consumer->users->create([
        'email' => 'user@example.com',
        'name' => 'John Doe'
    ]);
    echo "Created user: " . $userResponse['user_id'] . "\n";
    
    $userId = $userResponse['user_id'];
    
    // Get user
    $user = $stytch->consumer->users->getUser($userId);
    echo "User email: " . $user['emails'][0]['email'] . "\n";
    
    // Update user
    $updatedUser = $stytch->consumer->users->update($userId, [
        'name' => 'John Smith'
    ]);
    echo "Updated user name: " . $updatedUser['name'] . "\n";
    
    // Consumer Magic Links
    echo "\n=== Consumer Magic Links ===\n";
    
    // Send magic link
    $magicLinkResponse = $stytch->consumer->magicLinks->send([
        'email' => 'user@example.com',
        'login_redirect_url' => 'https://app.example.com/login',
        'signup_redirect_url' => 'https://app.example.com/signup'
    ]);
    echo "Sent magic link to: " . $magicLinkResponse['email_id'] . "\n";
    
    // Login or create user
    $loginResponse = $stytch->consumer->magicLinks->loginOrCreate([
        'email' => 'newuser@example.com',
        'login_redirect_url' => 'https://app.example.com/login',
        'signup_redirect_url' => 'https://app.example.com/signup'
    ]);
    echo "Login or create response: " . $loginResponse['email_id'] . "\n";
    
    // Consumer OTP
    echo "\n=== Consumer OTP ===\n";
    
    // Send SMS OTP
    $smsOtpResponse = $stytch->consumer->otp->sendSMS([
        'phone_number' => '+1234567890'
    ]);
    echo "Sent SMS OTP to: " . $smsOtpResponse['phone_id'] . "\n";
    
    // Send WhatsApp OTP
    $whatsappOtpResponse = $stytch->consumer->otp->sendWhatsApp([
        'phone_number' => '+1234567890'
    ]);
    echo "Sent WhatsApp OTP to: " . $whatsappOtpResponse['phone_id'] . "\n";
    
    // Send Email OTP
    $emailOtpResponse = $stytch->consumer->otp->sendEmail([
        'email' => 'user@example.com'
    ]);
    echo "Sent Email OTP to: " . $emailOtpResponse['email_id'] . "\n";
    
    // Consumer OAuth
    echo "\n=== Consumer OAuth ===\n";
    
    // Start Google OAuth
    $googleOauthResponse = $stytch->consumer->oauth->google([
        'login_redirect_url' => 'https://app.example.com/oauth/callback',
        'signup_redirect_url' => 'https://app.example.com/oauth/callback'
    ]);
    echo "Google OAuth URL: " . $googleOauthResponse['url'] . "\n";
    
    // Start GitHub OAuth
    $githubOauthResponse = $stytch->consumer->oauth->github([
        'login_redirect_url' => 'https://app.example.com/oauth/callback',
        'signup_redirect_url' => 'https://app.example.com/oauth/callback'
    ]);
    echo "GitHub OAuth URL: " . $githubOauthResponse['url'] . "\n";
    
    // Consumer Sessions
    echo "\n=== Consumer Sessions ===\n";
    
    // Get JWKs
    $jwks = $stytch->consumer->sessions->getJWKs();
    echo "Retrieved JWKs\n";
    
    // Get sessions
    $sessions = $stytch->consumer->sessions->getSessions([
        'user_id' => $userId
    ]);
    echo "Retrieved sessions for user\n";
    
    // Consumer TOTP
    echo "\n=== Consumer TOTP ===\n";
    
    // Create TOTP
    $totpResponse = $stytch->consumer->totp->create([
        'user_id' => $userId
    ]);
    echo "Created TOTP: " . $totpResponse['totp_id'] . "\n";
    
    // Get recovery codes
    $recoveryCodesResponse = $stytch->consumer->totp->getRecoveryCodes([
        'user_id' => $userId
    ]);
    echo "Retrieved recovery codes\n";
    
    // Consumer Crypto Wallets
    echo "\n=== Consumer Crypto Wallets ===\n";
    
    // Start crypto wallet authentication
    $cryptoStartResponse = $stytch->consumer->cryptoWallets->authenticateStart([
        'user_id' => $userId,
        'domain' => 'example.com'
    ]);
    echo "Started crypto wallet authentication\n";
    
    // Consumer Passkeys
    echo "\n=== Consumer Passkeys ===\n";
    
    // Start WebAuthn registration
    $webauthnStartResponse = $stytch->consumer->passkeys->registerStart([
        'user_id' => $userId,
        'domain' => 'example.com'
    ]);
    echo "Started WebAuthn registration\n";
    
    // Consumer Passwords
    echo "\n=== Consumer Passwords ===\n";
    
    // Authenticate password
    $passwordResponse = $stytch->consumer->passwords->authenticate([
        'email' => 'user@example.com',
        'password' => 'securepassword123'
    ]);
    echo "Password authentication successful\n";
    
    // Password strength check
    $strengthResponse = $stytch->consumer->passwords->strengthCheck([
        'password' => 'securepassword123'
    ]);
    echo "Password strength score: " . $strengthResponse['score'] . "\n";
    
    // Password reset by email start
    $resetStartResponse = $stytch->consumer->passwords->resetByEmailStart([
        'email' => 'user@example.com',
        'login_redirect_url' => 'https://app.example.com/reset'
    ]);
    echo "Started password reset process\n";
    
    // Cleanup - Delete user
    echo "\n=== Cleanup ===\n";
    
    $stytch->consumer->users->deleteUser($userId);
    echo "Deleted user\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 