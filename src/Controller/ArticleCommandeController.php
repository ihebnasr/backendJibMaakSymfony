<?php

namespace App\Controller;

use App\Entity\ArticleCommande;
use App\Form\ArticleCommandeType;
use App\Repository\ArticlecommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article/commande")
 */
class ArticleCommandeController extends AbstractController
{
    /**
     * @Route("/", name="article_commande_index", methods={"GET"})
     */
    public function index(ArticlecommandeRepository $articlecommandeRepository): Response
    {
        return $this->render('article_commande/index.html.twig', [
            'article_commandes' => $articlecommandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="article_commande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $articleCommande = new ArticleCommande();
        $form = $this->createForm(ArticleCommandeType::class, $articleCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($articleCommande);
            $entityManager->flush();

            return $this->redirectToRoute('article_commande_index');
        }

        return $this->render('article_commande/new.html.twig', [
            'article_commande' => $articleCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idartcmd}", name="article_commande_show", methods={"GET"})
     */
    public function show(ArticleCommande $articleCommande): Response
    {
        return $this->render('article_commande/show.html.twig', [
            'article_commande' => $articleCommande,
        ]);
    }

    /**
     * @Route("/{idartcmd}/edit", name="article_commande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ArticleCommande $articleCommande): Response
    {
        $form = $this->createForm(ArticleCommandeType::class, $articleCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_commande_index');
        }

        return $this->render('article_commande/edit.html.twig', [
            'article_commande' => $articleCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idartcmd}", name="article_commande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ArticleCommande $articleCommande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleCommande->getIdartcmd(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($articleCommande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_commande_index');
    }
}
