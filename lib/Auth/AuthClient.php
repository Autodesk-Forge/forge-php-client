<?php

namespace Swagger\Client\Auth;

use Swagger\Client\ApiClient;

abstract class AuthClient
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $token;

    /**
     * @var array
     */
    private $scopes = [];

    /**
     * AbstractAuth constructor.
     * @param $clientId
     * @param $clientSecret
     * @param ApiClient $apiClient
     */
    public function __construct($clientId, $clientSecret, ApiClient $apiClient)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getToken()
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
     * @return bool
     */
    public function hasToken()
    {
        return $this->token !== null;
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
     * @param array $scopes
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;
    }
}