<?php

namespace App\Infrastructure\EventListener\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTAuthenticationSuccessListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            AuthenticationSuccessEvent::class => 'onAuthenticationSuccessResponse',
        ];
    }

    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof UserInterface) {
            return;
        }

        $data['user'] = [
            'name' => $user->getNome(),
            'email' => $user->getEmail(),
        ];

        $event->setData($data);
    }
}
