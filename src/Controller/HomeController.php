<?php

namespace App\Controller;

use App\Entity\Link;
use App\Form\LinkType;
use App\Repository\LinkRepository;
use App\Service\LinkHashGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, LinkHashGenerator $hashGenerator, LinkRepository $repo): Response
    {
        $link = new Link();
        $form = $this->createForm(LinkType::class, $link);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $url = $form->getData()->getUrl();

            // check if the link exists
            if ($existingLink = $repo->findOneBy(['url' => $url])) {
                $link = $existingLink;
            } else {
                $link->setHash($hashGenerator->generate());
                $em = $this->getDoctrine()->getManager();
                $em->persist($link);
                $em->flush();
            }

            return $this->redirectToRoute('result', ['hash' => $link->getHash()]);
        }

        return $this->render('home/index.html.twig', [
            'url_form' => $form->createView(),
        ]);
    }
}
