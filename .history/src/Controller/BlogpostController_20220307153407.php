<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogpostController extends AbstractController
{
    #[Route('/actualites', name: 'actualites')]
    public function index(): Response
    {
        return $this->render('blogpost/actualites.html.twig', [
            'actualites' => 'BlogpostController',
        ]);
    }
}
