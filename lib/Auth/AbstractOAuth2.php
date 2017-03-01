<?php

namespace Autodesk\Client\Auth;

use Autodesk\Client\ApiException;

abstract class AbstractOAuth2
{
    /**
     * @var TokenFetcher
     */
    protected $tokenFetcher;

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
     * @param TokenFetcher $tokenFetcher
     */
    public function __construct(TokenFetcher $tokenFetcher = null)
    {
        // @codeCoverageIgnoreStart
        if ($tokenFetcher === null) {
            $tokenFetcher = new TokenFetcher();
        }
        // @codeCoverageIgnoreEnd

        $this->tokenFetcher = $tokenFetcher;
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
     * @param $url
     * @param $grantType
     * @param array $additionalParams
     * @return array
     * @throws ApiException
     */
    protected function fetchAccessToken($url, $grantType, array $additionalParams = [])
    {
        $response = $this->tokenFetcher->fetch($url, $grantType, $this->scopes, $additionalParams);

        if ( ! array_key_exists('access_token', $response)) {
            throw new ApiException('Access token was not found in the response');
        }

        if ( ! array_key_exists('expires_in', $response)) {
            throw new ApiException('Expiry was not found in the response');
        }

        $this->token = $response['access_token'];
        $this->expiry = $response['expires_in'];

        return $response;
    }
}