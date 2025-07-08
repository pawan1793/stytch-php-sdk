<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Consumer API client
 */
class ConsumerClient extends BaseApiClient
{
    public Users $users;
    public MagicLinks $magicLinks;
    public OTP $otp;
    public OAuth $oauth;
    public Sessions $sessions;
    public TOTP $totp;
    public CryptoWallets $cryptoWallets;
    public Passkeys $passkeys;
    public Passwords $passwords;

    public function __construct(\GuzzleHttp\Client $httpClient, array $config)
    {
        parent::__construct($httpClient, $config);
        
        // Initialize all Consumer API endpoints
        $this->users = new Users($httpClient, $config);
        $this->magicLinks = new MagicLinks($httpClient, $config);
        $this->otp = new OTP($httpClient, $config);
        $this->oauth = new OAuth($httpClient, $config);
        $this->sessions = new Sessions($httpClient, $config);
        $this->totp = new TOTP($httpClient, $config);
        $this->cryptoWallets = new CryptoWallets($httpClient, $config);
        $this->passkeys = new Passkeys($httpClient, $config);
        $this->passwords = new Passwords($httpClient, $config);
    }
} 