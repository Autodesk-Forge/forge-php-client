<?php

namespace Swagger\Client\Api;

use Swagger\Client\ApiClient;
use Swagger\Client\Auth\AuthClient;

abstract class AbstractApi
{
    /**
     * API Client
     *
     * @var ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * @var AuthClient
     */
    protected $authClient;

    /**
     * Constructor
     *
     * @param AuthClient $authClient
     * @param ApiClient|null $apiClient The api client to use
     */
    public function __construct(AuthClient $authClient, ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
        $this->authClient = $authClient;
    }

    /**
     * Get API client
     *
     * @return ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param ApiClient $apiClient set the API client
     *
     * @return self
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * @return string
     */
    protected function getAuthHeader()
    {
        $token = $this->authClient->getAccessToken();

        if ($token === null) {
            // TODO: throw good exception
            throw new \InvalidArgumentException('token not exists');
        }

        return 'Bearer ' . $token;
    }
}