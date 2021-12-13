<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Auteurs;
use App\Entity\Commentaires;
use App\Form\ArticlesType;
use App\Form\CommentairesType;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles_index", methods={"GET"})
     */
    public function index(ArticlesRepository $articlesRepository): Response
    {
        return $this->render('articles/index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }


    /**
     * @Route("/publies", name="articles_publies", methods={"GET"})
     */
    public function articlesPublies(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->findArticlesPubliés();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    } 


    /**
     * @Route("/publies2", name="articles_publies2", methods={"GET"})
     */
    public function articlesPubliesAuteurs(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->findPublishArticlesAuteurs();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    } 



    /**
     * @Route("/commentes", name="articles_commentes", methods={"GET"})
     */
    public function articlesCommentes(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->getArticleAvecCommentaires();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    } 

    
    /**
     * @Route("/new", name="articles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $article = new Articles();
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('articles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('articles/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articles_show", methods={"GET"})
     */
    public function show(Articles $article, Request $request): Response
    {
        $commentaires = new Commentaires();
        $commentairesForm = $this->createForm(CommentairesType::class, $commentaires);

       /* $form = $this->createFormBuilder($commentaires)
                ->add('auteur')
                ->add('contentaires', CKEditorType::class) 

                ->getForm(); */
       
        $commentairesForm->handleRequest($request);

        if($commentairesForm->isSubmitted() && $form->isValid()) {
            $commentaires->setDate(new \DateTime())
                     ->setArtcileComm($article);
            $manager->persist($commentaires);

            $manager->flush();

            return $this->redirectToRoute('articles_show',  ['id' => $article->getId()
            ]);
    }
    return $this->render('articles/show.html.twig', [
        'article' => $article,
        'commentairesForm'=> $commentairesForm->createView()
        //'articles2' => $articlesles2,
        //'commentaires '=> $commentaires ,

        ]);
    }


    /**
     * Ceci est 1 exmple 
     * Affiche en details d'un article
     * @param $id
     * @param ArticlesRepository, $articlesrepo 
     * @Route("/{id}", name="articles_affich")
    */
    public function affichage($id, ArticlesRepository $articlesrepo ) 
    {
        // Appel à Doctrine & au repository
        // $repo = $this->getDoctrine()->getRepository(Location::class);
        //Recherche de l'article avec son identifaint
        $articles = $articlesrepo->find($id);
        // Passage à Twig de tableau avec des variables à utiliser
        return $this->render('articles/affich.html.twig', [
            'article' => $articles
        ]);
    }

    /**
     * @Route("/{id}/edit", name="articles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Articles $article): Response
    {
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('articles/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articles_delete", methods={"POST"})
     */
    public function delete(Request $request, Articles $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('articles_index', [], Response::HTTP_SEE_OTHER);
    }
}
