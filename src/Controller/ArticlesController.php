<?php

namespace App\Controller;

use App\Entity\Articles;
//use App\Entity\Auteurs;
use App\Entity\Commentaires;
use App\Form\ArticlesType;
use App\Form\CommentairesType;
use App\Repository\ArticlesRepository;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles", name="articles_")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ArticlesRepository $articlesRepository): Response
    {
        return $this->render('articles/index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }


    /**
     * @Route("/publies", name="publies", methods={"GET"})
     */
    public function articlesPublies(ArticlesRepository $articlesRepository): Response
        {
        $propertySearch = new PropertySearch();
        $form_search = $this->createForm(PropertySearchType::class,$propertySearch);
        $form_search->handleRequest($request);
        
        //J'initialise A tableau des articles, 
        $articles= [];
        
        if($form_search->isSubmitted() && $form_search->isValid()) {
            $title = $propertySearch->gettitle();   
                if ($title!="") 
                //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
                $articles= $this->getDoctrine()->getRepository(Article::class)->findBy(['title' => $title] );
                else   
                // si aucun nom fourni, j'affiche tous les articles
            $articles= $articlesRepository->findArticlesPubliés();
        }

        //$articles= $articlesRepository->findArticlesPubliés();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
            'form_search' => $form_search->createView(),
            //'form_search' => $form_search->createView()
        ]);
    } 


    /**
     * @Route("/publies_auteurs", name="publies_auteurs", methods={"GET"})
     */
    public function articlesPubliesAuteurs(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->findByPublishArticlesOneAuteurs();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    } 

    /**
     * @Route("/publies_one_aut", name="publies_one_aut", methods={"GET"})
     */
    public function articlesPubliesOneAuteurs(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->findByPublishArticlesOneAuteurs2();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/commentes", name="commentes", methods={"GET"})
     */
    public function articlesCommentes(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->getArticleAvecCommentaires();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    } 

    /**
     * @Route("/article__cat_info", name="cat_info", methods={"GET"})
     */
    public function articlesCatInfo(ArticlesRepository $articlesRepository): Response
    {
        $articles= $articlesRepository->findArticlesInformatique();
        
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    } 


    /**
     * @Route("/new", name="new", methods={"GET","POST"})
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
     * @Route("/{id}", name="show", methods={"GET"})
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
     * @Route("/{id}", name="affich")
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
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
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
     * @Route("/{id}", name="delete", methods={"POST"})
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
