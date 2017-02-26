<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;

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
     * TwoLegged constructor.
     * @param $clientId
     * @param $clientSecret
     * @param ApiClient $apiClient
     */
    public function __construct($clientId, $clientSecret, ApiClient $apiClient = null)
    {
        parent::__construct($clientId, $clientSecret, $apiClient);
    }

    /**
     * @param $callbackUrl
     * @return string
     */
    public function createAuthUrl($callbackUrl)
    {
        $basePath = $this->apiClient->getConfig()->getHost();

        $parameters = [
            'response_type' => 'code',
            'client_id'     => $this->getClientId(),
            'redirect_uri'  => $callbackUrl,
            'scope'         => implode(' ', $this->getScopes()),
        ];

        $parametersString = [];
        foreach ($parameters as $key => $value) {
            $parametersString[] = "{$key}={$value}";
        }

        return "{$basePath}/authentication/v1/authorize?" . implode('&', $parametersString);
    }

    /**
     * Returns application token
     * @param $authorizationCode
     * @param $callbackUrl
     * @throws ApiException
     */
    public function fetchToken($authorizationCode, $callbackUrl)
    {
        $url = 'authentication/v1/gettoken';
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $body = [
            'client_id'         => $this->getClientId(),
            'client_secret'     => $this->getClientSecret(),
            'grant_type'        => 'authorization_code',
            'scope'             => implode(' ', $this->getScopes()),
            'code'              => $authorizationCode,
            'redirect_uri'      => $callbackUrl,
        ];

        list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($url, ApiClient::$POST, [], $body, $headers);

        if ( ! isset($response->access_token)) {
            throw new ApiException('Three legged auth response does not contain access_token');
        }

        $this->setToken($response->access_token);
        $this->refreshToken = $response->refresh_token;
        $this->expiry = $response->expires_in;
    }

    public function refreshToken($refreshToken)
    {
        $url = 'authentication/v1/refreshtoken';
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $body = [
            'client_id'         => $this->getClientId(),
            'client_secret'     => $this->getClientSecret(),
            'grant_type'        => 'refresh_token',
            'refresh_token'     => $refreshToken,
            'scope'             => implode(' ', $this->getScopes()),
        ];

        list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($url, ApiClient::$POST, [], $body, $headers);

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