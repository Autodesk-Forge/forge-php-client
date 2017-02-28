<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;
use Autodesk\Client\Configuration;

abstract class AbstractOAuth2
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * @var string
     */
    private $token;

    /**
     * @var int
     */
    private $expiry;

    /**
     * @var array
     */
    private $scopes = [];

    /**
     * @param Configuration $configuration
     * @param ApiClient $apiClient
     */
    public function __construct(Configuration $configuration = null, ApiClient $apiClient = null)
    {
        if ($configuration === null) {
            $configuration = Configuration::getDefaultConfiguration();
        }

        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->configuration = $configuration;
        $this->apiClient = $apiClient;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param $name
     */
    public function addScope($name)
    {
        if (in_array($name, $this->scopes)) {
            return;
        }

        $this->scopes[] = $name;
    }

    /**
     * @param array $scopes
     */
    public function addScopes(array $scopes)
    {
        foreach ($scopes as $scope) {
            $this->addScope($scope);
        }
    }

    /**
     * @return int
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * @param array $scopes
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * @return bool
     */
    public function hasAccessToken()
    {
        return $this->token !== null;
    }

    /**
     * @return array
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Returns application token
     * @param $url
     * @param $grantType
     * @param array $additionalParams
     * @throws ApiException
     */
    protected function fetchAccessToken($url, $grantType, array $additionalParams = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $scopes = $this->getScopes();

        if (count($scopes) == 0) {
            throw new ApiException('Cannot fetch token when no scopes where defined');
        }

        $body = array_merge([
            'client_id'     => $this->configuration->getClientId(),
            'client_secret' => $this->configuration->getClientSecret(),
            'grant_type'    => $grantType,
            'scope'         => implode(' ', $scopes),
        ], $additionalParams);

        list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($url, ApiClient::$POST, [], $body,
            $headers);

        if ( ! isset($response->access_token)) {
            throw new ApiException('Auth response does not contain access_token');
        }

        $this->token = $response->access_token;
        $this->expiry = $response->expires_in;

        return $response;
    }
}