<?php

declare(strict_types=1);

namespace League\Bundle\OAuth2ServerBundle\Converter;

use League\Bundle\OAuth2ServerBundle\Entity\User;
use League\OAuth2\Server\Entities\UserEntityInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class UserConverter implements UserConverterInterface
{
    /**
     * @psalm-suppress ArgumentTypeCoercion
     * @psalm-suppress DeprecatedMethod
     * @psalm-suppress UndefinedInterfaceMethod
     */
    public function toLeague(UserInterface $user): UserEntityInterface
    {
        $userEntity = new User();

        $identifier = method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : $user->getUsername();

        $userEntity->setIdentifier($identifier);

        return $userEntity;
    }
}
