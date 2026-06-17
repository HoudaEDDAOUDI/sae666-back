<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\Authenticator\TokenAuthenticator;
use App\Security\Tokens;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class LoginController extends AbstractController
{
    #[Route('/api/login_check', name: 'api_login', methods: ['POST'])]
    public function index(#[CurrentUser] ?User $user, TokenAuthenticator $tokenAuthenticator, Tokens $tokens, Request $request): Response
    {
        if (null === $user) {
            return $tokenAuthenticator->onAuthenticationFailure($request, new AuthenticationException());
        }

        return $this->json(['token' => $tokens->generateTokenForUser($user->getEmail()), 'user' => $user->getUserIdentifier()]);
    }
}
