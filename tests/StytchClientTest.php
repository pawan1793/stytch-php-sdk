<?php

namespace Stytch\Tests;

use PHPUnit\Framework\TestCase;
use Stytch\StytchClient;
use Stytch\Exceptions\StytchException;

class StytchClientTest extends TestCase
{
    private StytchClient $stytch;

    protected function setUp(): void
    {
        $this->stytch = new StytchClient([
            'project_id' => 'test-project-id',
            'secret' => 'test-secret-key',
            'env' => 'test'
        ]);
    }

    public function testClientInitialization()
    {
        $this->assertInstanceOf(StytchClient::class, $this->stytch);
        $this->assertInstanceOf(\Stytch\B2B\B2BClient::class, $this->stytch->b2b);
        $this->assertInstanceOf(\Stytch\Consumer\ConsumerClient::class, $this->stytch->consumer);
    }

    public function testConfigValidation()
    {
        $this->expectException(StytchException::class);
        $this->expectExceptionMessage('Project ID is required');
        
        new StytchClient([]);
    }

    public function testConfigValidationMissingSecret()
    {
        $this->expectException(StytchException::class);
        $this->expectExceptionMessage('Secret key is required');
        
        new StytchClient(['project_id' => 'test']);
    }

    public function testConfigValidationInvalidEnv()
    {
        $this->expectException(StytchException::class);
        $this->expectExceptionMessage('Environment must be either "test" or "live"');
        
        new StytchClient([
            'project_id' => 'test',
            'secret' => 'test',
            'env' => 'invalid'
        ]);
    }

    public function testGetConfig()
    {
        $config = $this->stytch->getConfig();
        
        $this->assertEquals('test-project-id', $config['project_id']);
        $this->assertEquals('test-secret-key', $config['secret']);
        $this->assertEquals('test', $config['env']);
    }

    public function testGetHttpClient()
    {
        $httpClient = $this->stytch->getHttpClient();
        $this->assertInstanceOf(\GuzzleHttp\Client::class, $httpClient);
    }

    public function testB2BOrganizationsAccess()
    {
        $this->assertInstanceOf(\Stytch\B2B\Organizations::class, $this->stytch->b2b->organizations);
    }

    public function testB2BMembersAccess()
    {
        $this->assertInstanceOf(\Stytch\B2B\Members::class, $this->stytch->b2b->members);
    }

    public function testConsumerUsersAccess()
    {
        $this->assertInstanceOf(\Stytch\Consumer\Users::class, $this->stytch->consumer->users);
    }

    public function testConsumerMagicLinksAccess()
    {
        $this->assertInstanceOf(\Stytch\Consumer\MagicLinks::class, $this->stytch->consumer->magicLinks);
    }
} 