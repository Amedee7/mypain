<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'portfolio')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('portfolio/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}
