<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiClient;
use Autodesk\Client\ApiException;
use Autodesk\Client\Configuration;

class OAuth2TwoLegged extends AbstractOAuth2
{
    /**
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
        parent::fetchAccessToken('authentication/v1/authenticate', 'client_credentials');
    }
}