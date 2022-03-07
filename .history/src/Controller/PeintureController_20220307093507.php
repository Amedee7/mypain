<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    #[Route('/realisations', name: 'realisations')]
    public function realisations(): Response
    {
        return $this->render('peinture/realisations.html.twig', [
            'peintures' => 'PeintureController',
        ]);
    }
}
