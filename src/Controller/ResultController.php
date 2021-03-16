<?php

namespace App\Controller;

use App\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    #[Route('/result/{hash}', name: 'result')]
    public function index(Request $request, Link $link): Response
    {
        return $this->render('result/index.html.twig', [
            'link' => $link,
            'schemeAndHost' => $request->getSchemeAndHttpHost(),
        ]);
    }
}
