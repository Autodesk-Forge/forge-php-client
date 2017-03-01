<?php

namespace Autodesk\Client;

use Autodesk\Client\Auth\AbstractOAuth2;
use PHPUnit\Framework\TestCase;

class AbstractOAuth2Test extends TestCase
{
    /**
     * @var AbstractOAuth2
     */
    private $auth;

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $this->auth = $this->getMockForAbstractClass(AbstractOAuth2::class);
    }

    public function test_set_scopes()
    {
        $this->auth->setScopes(['a', 'b']);
        $this->assertEquals(['a', 'b'], $this->auth->getScopes());

        $this->auth->setScopes(['a']);
        $this->assertEquals(['a'], $this->auth->getScopes());
    }

    public function test_add_scope()
    {
        $this->auth->addScope('a');

        $this->assertEquals(['a'], $this->auth->getScopes());

        $this->auth->addScope('b');

        $this->assertEquals(['a', 'b'], $this->auth->getScopes());
    }

    public function test_add_scopes()
    {
        $this->auth->addScopes(['a', 'b']);

        $this->assertEquals(['a', 'b'], $this->auth->getScopes());

        $this->auth->addScopes(['cc', 'c']);

        $this->assertEquals(['a', 'b', 'cc', 'c'], $this->auth->getScopes());
    }

    public function test_add_scope_ignores_existing_scope()
    {
        $this->auth->addScope('a');
        $this->auth->addScope('a');

        $this->assertEquals(['a'], $this->auth->getScopes());

        $this->auth->addScope('b');
        $this->auth->addScope('b');

        $this->assertEquals(['a', 'b'], $this->auth->getScopes());
    }
}