<?php

namespace Swagger\Client\Auth;

use Swagger\Client\ApiClient;

class ThreeLeggedClient extends AuthClient
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
     * @param $callbackUrl
     * @return string
     */
    public function createAuthUrl($callbackUrl)
    {
//        $parameters = [
//            'response_type' => 'code',
//            'client_id'     => $this->getClientId(),
//            'redirect_uri'  => $this->redirectUri,
//            'scope'         => $this->getScopes(),
//        ];
//
//        $parametersString = [];
//        foreach ($parameters as $key => $value) {
//            $parametersString[] = "{$key}={$value}";
//        }
//
//        return $this->basePath . $this->authorizationUrl . '?' . implode('&', $parametersString);
    }

    /**
     * Returns application token
     * @param $authorizationCode
     * @return mixed
     */
    public function fetchToken($authorizationCode)
    {
//        return $this->apiClient->callApi('authorize', ApiClient::$POST, [], compact('authorizationCode'), []);
    }
}