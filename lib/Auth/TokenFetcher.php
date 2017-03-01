<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;
use Autodesk\Client\Configuration;

class TokenFetcher
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * TokenFetcher constructor.
     * @param Configuration|null $configuration
     * @param ApiClient|null $apiClient
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
     * @param $url
     * @param $grantType
     * @param array $scopes
     * @param array $additionalParams
     * @return array
     * @throws ApiException
     */
    public function fetch($url, $grantType, array $scopes, array $additionalParams = [])
    {
        if (count($scopes) == 0) {
            throw new ApiException('Cannot fetch token when no scopes where defined');
        }

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $body = array_merge([
            'client_id'     => $this->configuration->getClientId(),
            'client_secret' => $this->configuration->getClientSecret(),
            'grant_type'    => $grantType,
            'scope'         => implode(' ', $scopes),
        ], $additionalParams);

        $result = $this->apiClient->callApi($url, ApiClient::$POST, [], $body, $headers);

        if (count($result) !== 3) {
            throw new ApiException('Fetch token response is invalid');
        }

        list($response, $statusCode, $httpHeader) = $result;

        return json_decode(json_encode($response), true);
    }
}