<?php

namespace Autodesk\Forge\Client\Api;

use Autodesk\Forge\Client\ApiClient;
use Autodesk\Auth\OAuth2\AbstractOAuth2;

abstract class AbstractApi
{
    /**
     * API Client
     *
     * @var ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * @var AbstractOAuth2
     */
    protected $authClient;

    /**
     * Constructor
     *
     * @param AbstractOAuth2 $authClient
     * @param ApiClient|null $apiClient The api client to use
     */
    public function __construct(AbstractOAuth2 $authClient, ApiClient $apiClient = null)
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
     * Wrapper to the callApi of the ApiClient which adds auth data
     *
     * @param string $resourcePath path to method endpoint
     * @param string $method method to call
     * @param array $queryParams parameters to be place in query URL
     * @param array $postData parameters to be placed in POST body
     * @param array $headerParams parameters to be place in request header
     * @param string $responseType expected response type of the endpoint
     * @param string $endpointPath path to method endpoint before expanding parameters
     *
     * @throws \Autodesk\Forge\Client\ApiException on a non 2xx response
     * @return mixed
     */
    protected function callApi(
        $resourcePath,
        $method,
        $queryParams,
        $postData,
        $headerParams,
        $responseType = null,
        $endpointPath = null
    ) {
        // this endpoint requires OAuth (access token)
        if ($this->authClient->hasAccessToken()) {
            $headerParams['Authorization'] = "Bearer {$this->authClient->getAccessToken()}";
        }

        return $this->apiClient->callApi($resourcePath, $method, $queryParams, $postData, $headerParams, $responseType,
            $endpointPath);
    }
}