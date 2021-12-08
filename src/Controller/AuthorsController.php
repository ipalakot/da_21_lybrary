<?php

namespace App\Controller;

use App\Entity\Auteurs;
use App\Form\AuteursType;
use App\Repository\AuteursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/authors")
 */
class AuthorsController extends AbstractController
{
    /**
     * @Route("/", name="authors_index", methods={"GET"})
     */
    public function index(AuteursRepository $auteursRepository): Response
    {
        return $this->render('authors/index.html.twig', [
            'auteurs' => $auteursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/inscription", name="authors_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auteur = new Auteurs();
        $form = $this->createForm(AuteursType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('authors_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('authors/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form->createView(),
        ]);
    }

    
    /**
     * Ceci est 1 exmple 
     * Affiche en details d'un Auteur avec FindBY
     * @Route("/recherche", name="search")
    */
    public function recherche(AuteursRepository $auteursrepo  ){

        $auteurs =  $auteursrepo ->findBy (array 
        (
            'noms' => 'admin',
            //'mails '=> 'test.mail.col'
        ), array ('prenoms'=>"DESC"), 10,0);

        return $this->render('authors/search.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    /**
     * Ceci est 1 exmple 
     * Affiche en details d'un Auteur avec FindOneBY
     * @Route("/recherche2", name="search")
    */
    public function recherche2(AuteursRepository $auteursrepo  ){

        $auteurs =  $auteursrepo ->findOneBy (array 
        (
            'noms' => 'admin',
            //'mails '=> 'test.mail.col'
        ));

        return $this->render('authors/search.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    /**
     * @Route("/{id}", name="authors_show", methods={"GET"})
     */
    public function show(Auteurs $auteur): Response
    {
        return $this->render('authors/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }



    /**
     * Ceci est 1 exmple 
     * Affiche en details d'un Auteur
     * @param $id
     * @param AuteursRepository, $auteursrepo 
     * @Route("/{id}", name="authors_show", methods={"GET"})
    */
    /*
        public function affichage($id, AuteursRepository $auteursrepo  ) 
        {
            // Appel à Doctrine & au repository
            // $auteursrepo = $this->getDoctrine()->getRepository(Autheur::class);
            //Recherche d'un auteur avec son identifaint
            $auteur = $auteursrepo->find($id);
            // Passage à Twig de tableau avec des variables à utiliser
        
                if (!$auteur) {
                throw $this->createNotFoundException(
                    'Desolé il y a Aucun Auteur pour ce id : '.$id
                );
            }
            return $this->render('authors/show2.html.twig', [
                'auteur' => $auteur
            ]);
        }
    */


    /**
     * @Route("/{id}/edit", name="authors_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Auteurs $auteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AuteursType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('authors_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('authors/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="authors_delete", methods={"POST"})
     */
    public function delete(Request $request, Auteurs $auteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($auteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('authors_index', [], Response::HTTP_SEE_OTHER);
    }
}
