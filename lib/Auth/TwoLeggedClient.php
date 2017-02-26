<?php

namespace Swagger\Client\Auth;

use Swagger\Client\ApiClient;
use Swagger\Client\ApiException;

class TwoLeggedClient extends AuthClient
{
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
     * Returns application token
     * @throws ApiException
     */
    public function fetchToken()
    {
        $url = 'authentication/v1/authenticate';
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $body = [
            'client_id'     => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'grant_type'    => 'client_credentials',
            'scope'         => implode(' ', $this->getScopes()),
        ];

        list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($url, ApiClient::$POST, [], $body, $headers);

        if ( ! isset($response->access_token)) {
            throw new ApiException('Two legged auth response does not contain access_token');
        }

        $this->setToken($response->access_token);
    }
}