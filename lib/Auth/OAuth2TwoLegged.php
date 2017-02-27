<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;
use Autodesk\Client\Configuration;

class OAuth2TwoLegged extends AbstractOAuth2
{
    /**
     * TwoLegged constructor.
     * @param Configuration $configuration
     * @param ApiClient $apiClient
     */
    public function __construct(Configuration $configuration = null, ApiClient $apiClient = null)
    {
        parent::__construct($configuration, $apiClient);
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
            'client_id'     => $this->configuration->getClientId(),
            'client_secret' => $this->configuration->getClientSecret(),
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