<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientsType;
use App\Repository\clientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clients")
 */
class ClientsController extends AbstractController
{
    /**
     * @Route("/", name="clients_index", methods={"GET"})
     */
    public function index(clientsRepository $clientsRepository): Response
    {
        return $this->render('clients/index.html.twig', [
            'clients' => $clientsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="clients_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $client = new Clients();
        $form = $this->createForm(ClientsType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('clients_index');
        }

        return $this->render('clients/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idclient}", name="clients_show", methods={"GET"})
     */
    public function show(Clients $client): Response
    {
        return $this->render('clients/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{idclient}/edit", name="clients_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Clients $client): Response
    {
        $form = $this->createForm(ClientsType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clients_index');
        }

        return $this->render('clients/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idclient}", name="clients_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Clients $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getIdclient(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clients_index');
    }
}
