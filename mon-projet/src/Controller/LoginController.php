<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/login', name: 'login', methods: ['POST', 'OPTIONS'])]
public function login(Request $request): JsonResponse
{
    // Handle preflight requests
    if ($request->isMethod('OPTIONS')) {
        $response = new JsonResponse();
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:5174');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        // Cache disabling is optional but shown here
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }

    // Handle the main POST login
    $data = json_decode($request->getContent(), true);
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';

    // Your authentication logic
    // ...

    if (!$user || $user->getPassword() !== $password) {
        $response = new JsonResponse(
            ['status' => 'error', 'message' => 'Invalid credentials'],
            JsonResponse::HTTP_UNAUTHORIZED
        );
        // Add the same CORS headers
       

        return $response;
    }

    $response = new JsonResponse(['status' => 'success', 'message' => 'Login successful']);
    $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:5174');
    $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
    $response->headers->set('Access-Control-Allow-Credentials', 'true');

    return $response;
}

}
