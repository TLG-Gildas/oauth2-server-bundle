<?php

declare(strict_types=1);

namespace League\Bundle\OAuth2ServerBundle\Tests\Fixtures;

use League\Bundle\OAuth2ServerBundle\Attribute\WithAccessTokenTTL;
use League\OAuth2\Server\Grant\AbstractGrant;
use League\OAuth2\Server\Grant\GrantTypeInterface;
use League\OAuth2\Server\ResponseTypes\ResponseTypeInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

#[WithAccessTokenTTL(accessTokenTTL: 'PT5H')]
final class FakeGrantWithAttribute extends AbstractGrant implements GrantTypeInterface
{
    public function getIdentifier(): string
    {
        return self::class;
    }

    public function respondToAccessTokenRequest(ServerRequestInterface $request, ResponseTypeInterface $responseType, \DateInterval $accessTokenTTL): ResponseTypeInterface
    {
        return new Response();
    }
}
