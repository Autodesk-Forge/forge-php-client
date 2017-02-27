<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;
use Autodesk\Client\Configuration;

class ThreeLeggedClient extends AuthClient
{
    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @var int
     */
    private $expiry;

    /**
     * @param Configuration $configuration
     * @param ApiClient $apiClient
     */
    public function __construct(Configuration $configuration = null, ApiClient $apiClient = null)
    {
        parent::__construct($configuration, $apiClient);
    }

    /**
     * @return string
     */
    public function createAuthUrl()
    {
        $host = $this->configuration->getHost();
        $parameters = http_build_query([
            'response_type' => 'code',
            'client_id'     => $this->configuration->getClientId(),
            'redirect_uri'  => $this->configuration->getRedirectUrl(),
            'scope'         => implode(' ', $this->getScopes()),
        ]);

        return "{$host}/authentication/v1/authorize?{$parameters}";
    }

    /**
     * Returns application token
     * @param $authorizationCode
     * @throws ApiException
     */
    public function fetchToken($authorizationCode)
    {
        $url = 'authentication/v1/gettoken';
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $body = [
            'client_id'     => $this->configuration->getClientId(),
            'client_secret' => $this->configuration->getClientSecret(),
            'grant_type'    => 'authorization_code',
            'scope'         => implode(' ', $this->getScopes()),
            'code'          => $authorizationCode,
            'redirect_uri'  => $this->configuration->getRedirectUrl(),
        ];

        list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($url, ApiClient::$POST, [], $body,
            $headers);

        if ( ! isset($response->access_token)) {
            throw new ApiException('Three legged auth response does not contain access_token');
        }

        $this->setToken($response->access_token);
        $this->refreshToken = $response->refresh_token;
        $this->expiry = $response->expires_in;
    }

    /**
     * @param $refreshToken
     * @throws ApiException
     */
    public function refreshToken($refreshToken)
    {
        $url = 'authentication/v1/refreshtoken';
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $body = [
            'client_id'     => $this->configuration->getClientId(),
            'client_secret' => $this->configuration->getClientSecret(),
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refreshToken,
            'scope'         => implode(' ', $this->getScopes()),
        ];

        list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($url, ApiClient::$POST, [], $body,
            $headers);

        if ( ! isset($response->access_token)) {
            throw new ApiException('Three legged auth response does not contain access_token');
        }

        $this->setToken($response->access_token);
        $this->refreshToken = $response->refresh_token;
        $this->expiry = $response->expires_in;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @return int
     */
    public function getExpiry()
    {
        return $this->expiry;
    }
}