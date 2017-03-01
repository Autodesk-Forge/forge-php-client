<?php

namespace Autodesk\Client;

use Autodesk\Client\Auth\OAuth2TwoLegged;
use Autodesk\Client\Auth\TokenFetcher;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class OAuth2TwoLeggedTest extends TestCase
{
    /**
     * @var TokenFetcher|PHPUnit_Framework_MockObject_MockObject
     */
    private $tokenFetcher;

    /**
     * @var OAuth2TwoLegged
     */
    private $auth;

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $this->tokenFetcher = $this->getMockBuilder(TokenFetcher::class)
            ->disableOriginalConstructor()
            ->setMethods(['fetch'])
            ->getMock();

        $this->auth = new OAuth2TwoLegged($this->tokenFetcher);
    }

    public function test_fetch_token()
    {
        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->with('authentication/v1/authenticate', 'client_credentials', [])
            ->willReturn(['access_token' => 'XXXX', 'expires_in' => 1000]);

        $this->auth->fetchToken();
    }

    public function test_exception_is_thrown_when_access_token_is_not_returned_from_fetcher()
    {
        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->willReturn(['expires_in' => 1000]);

        $this->setExpectedException(ApiException::class, 'Access token was not found in the response');

        $this->auth->fetchToken();
    }

    public function test_exception_is_thrown_when_expiry_is_not_returned_from_fetcher()
    {
        $this->tokenFetcher
            ->expects($this->once())
            ->method('fetch')
            ->willReturn(['access_token' => 'XXXX']);

        $this->setExpectedException(ApiException::class, 'Expiry was not found in the response');

        $this->auth->fetchToken();
    }
}