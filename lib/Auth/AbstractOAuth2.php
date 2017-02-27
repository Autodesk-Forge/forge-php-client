<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
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
     * @var array
     */
    private $scopes = [];

    /**
     * AbstractAuth constructor.
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
}