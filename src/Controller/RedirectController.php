<?php

namespace App\Controller;

use App\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
    #[Route('/l/{hash}', name: 'redirect')]
    public function index(Link $link): Response
    {
        return $this->redirect($link->getUrl());
    }
}
