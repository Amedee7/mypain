<?php

namespace App\Controller;

use App\Repository\PeintureRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PeintureController extends AbstractController
{
    #[Route('/realisations', name: 'realisations')]
    public function realisations(
        PeintureRepository $peintureRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $data =  $peintureRepository->findAll();
        $peintures= $request->paginate(
            $data,
            $request->query->getInt('page', 1),
        );
        return $this->render('peinture/realisations.html.twig', [
            'peintures' => ,
        ]);
    }
}
