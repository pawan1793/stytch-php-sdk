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
    // B2B Organizations
    echo "=== B2B Organizations ===\n";
    
    // Create an organization
    $orgResponse = $stytch->b2b->organizations->create([
        'organization_name' => 'Acme Corp',
        'organization_slug' => 'acme-corp'
    ]);
    echo "Created organization: " . $orgResponse['organization']['organization_id'] . "\n";
    
    $organizationId = $orgResponse['organization']['organization_id'];
    
    // Get organization
    $org = $stytch->b2b->organizations->getOrganization($organizationId);
    echo "Organization name: " . $org['organization']['organization_name'] . "\n";
    
    // Update organization
    $updatedOrg = $stytch->b2b->organizations->update($organizationId, [
        'organization_name' => 'Acme Corporation Updated'
    ]);
    echo "Updated organization: " . $updatedOrg['organization']['organization_name'] . "\n";
    
    // B2B Members
    echo "\n=== B2B Members ===\n";
    
    // Create a member
    $memberResponse = $stytch->b2b->members->create($organizationId, [
        'email_address' => 'john.doe@acme.com',
        'name' => 'John Doe'
    ]);
    echo "Created member: " . $memberResponse['member']['member_id'] . "\n";
    
    $memberId = $memberResponse['member']['member_id'];
    
    // Get member
    $member = $stytch->b2b->members->getMember($organizationId, $memberId);
    echo "Member email: " . $member['member']['email_address'] . "\n";
    
    // B2B Magic Links
    echo "\n=== B2B Magic Links ===\n";
    
    // Send magic link
    $magicLinkResponse = $stytch->b2b->magicLinks->send([
        'organization_id' => $organizationId,
        'email_address' => 'john.doe@acme.com',
        'login_redirect_url' => 'https://app.acme.com/login',
        'signup_redirect_url' => 'https://app.acme.com/signup'
    ]);
    echo "Sent magic link to: " . $magicLinkResponse['email_id'] . "\n";
    
    // B2B OAuth
    echo "\n=== B2B OAuth ===\n";
    
    // Start Google OAuth
    $oauthResponse = $stytch->b2b->oauth->loginWithGoogle([
        'organization_id' => $organizationId,
        'login_redirect_url' => 'https://app.acme.com/oauth/callback',
        'signup_redirect_url' => 'https://app.acme.com/oauth/callback'
    ]);
    echo "OAuth URL: " . $oauthResponse['url'] . "\n";
    
    // B2B Sessions
    echo "\n=== B2B Sessions ===\n";
    
    // Get JWKs
    $jwks = $stytch->b2b->sessions->getJWKs();
    echo "Retrieved JWKs\n";
    
    // B2B Passwords
    echo "\n=== B2B Passwords ===\n";
    
    // Authenticate password
    $passwordResponse = $stytch->b2b->passwords->authenticate([
        'organization_id' => $organizationId,
        'email_address' => 'john.doe@acme.com',
        'password' => 'securepassword123'
    ]);
    echo "Password authentication successful\n";
    
    // B2B MFA
    echo "\n=== B2B MFA ===\n";
    
    // Create TOTP
    $totpResponse = $stytch->b2b->mfa->createTOTP([
        'organization_id' => $organizationId,
        'member_id' => $memberId
    ]);
    echo "Created TOTP: " . $totpResponse['totp_id'] . "\n";
    
    // B2B M2M
    echo "\n=== B2B M2M ===\n";
    
    // Create M2M client
    $m2mResponse = $stytch->b2b->m2m->createClient([
        'organization_id' => $organizationId,
        'client_name' => 'API Client',
        'client_description' => 'M2M API client for integrations'
    ]);
    echo "Created M2M client: " . $m2mResponse['client']['client_id'] . "\n";
    
    // B2B Email OTP
    echo "\n=== B2B Email OTP ===\n";
    
    // Send email OTP
    $emailOtpResponse = $stytch->b2b->emailOTP->send([
        'organization_id' => $organizationId,
        'email_address' => 'john.doe@acme.com'
    ]);
    echo "Sent email OTP to: " . $emailOtpResponse['email_id'] . "\n";
    
    // Cleanup - Delete member and organization
    echo "\n=== Cleanup ===\n";
    
    $stytch->b2b->members->deleteMember($organizationId, $memberId);
    echo "Deleted member\n";
    
    $stytch->b2b->organizations->deleteOrganization($organizationId);
    echo "Deleted organization\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 