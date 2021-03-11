<?php

namespace App\Controller;

use App\Form\LinkType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(LinkType::class);

        $form->handleRequest($request);

        return $this->render('home/index.html.twig', [
            'url_form' => $form->createView(),
        ]);
    }
}
