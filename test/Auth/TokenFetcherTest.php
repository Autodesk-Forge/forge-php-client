<?php

namespace Autodesk\Client;

use Autodesk\Client\Auth\TokenFetcher;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class TokenFetcherTest extends TestCase
{
    /**
     * @var Configuration|PHPUnit_Framework_MockObject_MockObject
     */
    private $configuration;

    /**
     * @var ApiClient|PHPUnit_Framework_MockObject_MockObject
     */
    private $apiClient;

    /**
     * @var TokenFetcher
     */
    private $tokenFetcher;

    public function setUp()
    {
        $this->configuration = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiClient = $this->getMockBuilder(ApiClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->tokenFetcher = new TokenFetcher($this->configuration, $this->apiClient);
    }

    public function test_exception_thrown_when_calling_fetch_without_scopes()
    {
        $this->setExpectedException(ApiException::class, 'Cannot fetch token when no scopes where defined');

        $this->tokenFetcher->fetch('url', 'grantType', [], []);
    }

    public function test_exception_is_thrown_when_api_client_returns_invalid_response()
    {
        $this->apiClient
            ->expects($this->once())
            ->method('callApi')
            ->willReturn(55);

        $this->setExpectedException(ApiException::class, 'Fetch token response is invalid');
        $this->tokenFetcher->fetch('url', 'grantType', ['one scope']);
    }

    public function test_call_to_api_client()
    {
        $url = 'url';
        $grantType = 'grantType';
        $scopes = ['scopeOne'];
        $additionalParams = [
            'additionalParameter' => 'additionalValue',
        ];

        $expectedHeaders = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $expectedBody = [
            'client_id'           => $this->configuration->getClientId(),
            'client_secret'       => $this->configuration->getClientSecret(),
            'grant_type'          => $grantType,
            'scope'               => implode(' ', $scopes),
            'additionalParameter' => 'additionalValue',
        ];

        $this->apiClient
            ->expects($this->once())
            ->method('callApi')
            ->with($url, ApiClient::$POST, [], $expectedBody, $expectedHeaders)
            ->willReturn([['response'], 200, ['headers']]);

        $result = $this->tokenFetcher->fetch($url, $grantType, $scopes, $additionalParams);
        $this->assertEquals(['response'], $result);
    }
}