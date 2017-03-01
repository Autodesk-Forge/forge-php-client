<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiException;

class OAuth2TwoLegged extends AbstractOAuth2
{
    /**
     * Returns application token
     * @throws ApiException
     */
    public function fetchToken()
    {
        parent::fetchAccessToken('authentication/v1/authenticate', 'client_credentials');
    }
}