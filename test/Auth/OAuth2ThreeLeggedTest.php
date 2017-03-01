<?php

namespace Autodesk\Client;

use Autodesk\Client\Auth\OAuth2ThreeLegged;
use Autodesk\Client\Auth\TokenFetcher;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class OAuth2ThreeLeggedTest extends TestCase
{
    /**
     * @var Configuration|PHPUnit_Framework_MockObject_MockObject
     */
    private $configuration;

    /**
     * @var TokenFetcher|PHPUnit_Framework_MockObject_MockObject
     */
    private $tokenFetcher;

    /**
     * @var OAuth2ThreeLegged
     */
    private $auth;

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $this->configuration = $this->getMockBuilder(Configuration::class)
            ->setMethods(['getHost', 'getClientId', 'getRedirectUrl'])
            ->getMock();

        $this->tokenFetcher = $this->getMockBuilder(TokenFetcher::class)
            ->disableOriginalConstructor()
            ->setMethods(['fetch'])
            ->getMock();

        $this->auth = new OAuth2ThreeLegged($this->configuration, $this->tokenFetcher);
    }

    public function test_create_auth_url()
    {
        $host = 'http://testhost.com';
        $clientId = 'XXXXXX';
        $redirectUri = 'http://host.com/callback.php';
        $scopes = implode(' ', []);

        $this->configuration
            ->expects($this->once())
            ->method('getHost')
            ->willReturn($host);

        $this->configuration
            ->expects($this->once())
            ->method('getClientId')
            ->willReturn($clientId);

        $this->configuration
            ->expects($this->once())
            ->method('getRedirectUrl')
            ->willReturn($redirectUri);

        $expectedParameters = http_build_query([
            'response_type' => 'code',
            'client_id'     => $clientId,
            'redirect_uri'  => $redirectUri,
            'scope'         => $scopes,
        ]);

        $expectedUrl = "{$host}/authentication/v1/authorize?{$expectedParameters}";
        $this->assertEquals($expectedUrl, $this->auth->createAuthUrl());
    }

    public function test_fetch_token()
    {
        $authorizationCode = 'someAuthCode';
        $redirectUri = 'http://host.com/callback.php';
        $refreshToken = 'YYYY';

        $this->configuration
            ->expects($this->once())
            ->method('getRedirectUrl')
            ->willReturn($redirectUri);

        $additionalParams = [
            'code'         => $authorizationCode,
            'redirect_uri' => $redirectUri,
        ];

        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->with('authentication/v1/gettoken', 'authorization_code', [], $additionalParams)
            ->willReturn(['access_token' => 'XXXX', 'expires_in' => 100, 'refresh_token' => $refreshToken]);

        $this->auth->fetchToken($authorizationCode);
        $this->assertEquals($refreshToken, $this->auth->getRefreshToken());
    }

    public function test_refresh_token()
    {
        $refreshToken = 'someAuthCode';

        $additionalParams = [
            'refresh_token' => $refreshToken,
        ];

        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->with('authentication/v1/refreshtoken', 'refresh_token', [], $additionalParams)
            ->willReturn(['access_token' => 'XXXX', 'expires_in' => 100, 'refresh_token' => 'YYYYY']);

        $this->auth->refreshToken($refreshToken);

    }

    public function test_exception_is_thrown_when_access_token_is_not_returned_from_fetcher()
    {
        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->willReturn(['expires_in' => 1000]);

        $this->setExpectedException(ApiException::class, 'Access token was not found in the response');

        $this->auth->fetchToken('XXXX');
    }

    public function test_exception_is_thrown_when_expiry_is_not_returned_from_fetcher()
    {
        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->willReturn(['access_token' => 'XXXX']);

        $this->setExpectedException(ApiException::class, 'Expiry was not found in the response');

        $this->auth->fetchToken('XXXX');
    }

    public function test_exception_is_thrown_when_refresh_token_is_not_returned_from_fetcher()
    {
        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->willReturn(['access_token' => 'XXXX', 'expires_in' => 100]);

        $this->setExpectedException(ApiException::class, 'Refresh token was not found in the response');

        $this->auth->fetchToken('XXXX');
    }
}