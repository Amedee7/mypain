<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\BlogpostRepository;
use App\Repository\PeintureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PeintureRepository $peintureRepository, BlogpostRepository $blogpostRepository, UserRepository $userRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'peintures' => $peintureRepository->lastTree(),
            'blogposts' => $blogpostRepository->lastTree(),
            'peintre' => $userRepository->getPeintre(),
        ]);
    }
}
