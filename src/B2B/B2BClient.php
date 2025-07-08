<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * B2B API client
 */
class B2BClient extends BaseApiClient
{
    public Organizations $organizations;
    public Members $members;
    public RBAC $rbac;
    public MagicLinks $magicLinks;
    public OAuth $oauth;
    public Sessions $sessions;
    public SSO $sso;
    public Discovery $discovery;
    public Passwords $passwords;
    public MFA $mfa;
    public M2M $m2m;
    public EmailOTP $emailOTP;
    public Impersonation $impersonation;

    public function __construct(\GuzzleHttp\Client $httpClient, array $config)
    {
        parent::__construct($httpClient, $config);
        
        // Initialize all B2B API endpoints
        $this->organizations = new Organizations($httpClient, $config);
        $this->members = new Members($httpClient, $config);
        $this->rbac = new RBAC($httpClient, $config);
        $this->magicLinks = new MagicLinks($httpClient, $config);
        $this->oauth = new OAuth($httpClient, $config);
        $this->sessions = new Sessions($httpClient, $config);
        $this->sso = new SSO($httpClient, $config);
        $this->discovery = new Discovery($httpClient, $config);
        $this->passwords = new Passwords($httpClient, $config);
        $this->mfa = new MFA($httpClient, $config);
        $this->m2m = new M2M($httpClient, $config);
        $this->emailOTP = new EmailOTP($httpClient, $config);
        $this->impersonation = new Impersonation($httpClient, $config);
    }
} 