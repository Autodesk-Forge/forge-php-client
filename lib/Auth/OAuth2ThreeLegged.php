<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;
use Autodesk\Client\Configuration;

class OAuth2ThreeLegged extends AbstractOAuth2
{
    /**
     * @var string
     */
    private $refreshToken;

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
        $additionalParams = [
            'code'         => $authorizationCode,
            'redirect_uri' => $this->configuration->getRedirectUrl(),
        ];

        $response = parent::fetchAccessToken('authentication/v1/gettoken', 'authorization_code', $additionalParams);

        $this->refreshToken = $response->refresh_token;
    }

    /**
     * @param $refreshToken
     * @throws ApiException
     */
    public function refreshToken($refreshToken)
    {
        $additionalParams = [
            'refresh_token' => $refreshToken,
        ];

        $response = parent::fetchAccessToken('authentication/v1/refreshtoken', 'refresh_token', $additionalParams);

        $this->refreshToken = $response->refresh_token;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}