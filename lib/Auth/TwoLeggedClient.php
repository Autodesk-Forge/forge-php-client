<?php

namespace Swagger\Client\Auth;

use Swagger\Client\ApiClient;

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
     *
     * @return string
     */
    public function fetchToken()
    {
        return $this->apiClient->callApi('authorize', ApiClient::$POST, [], [], []);
    }
}