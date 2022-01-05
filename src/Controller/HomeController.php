<?php

namespace App\Controller;

//use App\Entity\Articles;
//use App\Form\ArticlesType;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;

use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Entity\CategorySearch;
use App\Form\CategorySearchType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Route("/accueil", name="accueil")
     */
    public function index(ArticlesRepository $articlesRepository, Request $request): Response
    {
        $propertySearch = new PropertySearch();
        $form_search = $this->createForm(PropertySearchType::class,$propertySearch);
        $form_search->handleRequest($request);
        
        //J'initialise A tableau des articles, 
        $articles = [];
        
        if($form_search->isSubmitted() && $form_search->isValid()) {
            $title = $propertySearch->getTitle();   
                if ($title!="") 
                //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
                $articles= $articlesRepository->findBy(['title' => $title] );
                else   
                // si aucun nom fourni, j'affiche tous les articles
            // $articles= $articlesRepository->findArticlesPubliés();
            $articles = $articlesRepository->findAll();
        }

        
        //$articles= $articlesRepository->findArticlesPubliés();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        'articles' => $articles,
        'form_search' => $form_search->createView(),
        ]);
    }

     /**
     * @Route("/search", name="search_accueil")
     */
    public function search(ArticlesRepository $articlesRepository, Request $request): Response
    {
        $propertySearch = new PropertySearch();
        $form_search = $this->createForm(PropertySearchType::class,$propertySearch);
        $form_search->handleRequest($request);
        
        //J'initialise A tableau des articles, 
        $articles = [];
        
        if($form_search->isSubmitted() && $form_search->isValid()) {
            $title = $propertySearch->getTitle();   
                if ($title!="") 
                //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
                $articles= $articlesRepository->findBy(['title' => $title] );
                else   
                // si aucun nom fourni, j'affiche tous les articles
            // $articles= $articlesRepository->findArticlesPubliés();
            $articles = $articlesRepository->findAll();
        }

        //$articles= $articlesRepository->findArticlesPubliés();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        'articles' => $articles,
        'form_search' => $form_search->createView(),
        ]);
    }

    

    /**
    * @Route("/search_art_cat", name="search_artic_by_cat")
    * Method({"GET", "POST"})
    */

    public function articlesParCategorie(ArticlesRepository $articlesRepository,Request $request) {

      $categorySearch = new CategorySearch();
      $form_search = $this->createForm(CategorySearchType::class, $categorySearch);
      $form_search->handleRequest($request);

      $articles= [];

      if($form_search->isSubmitted() && $form_search->isValid()) {
        $category = $categorySearch->getCategory();
       
        if ($category!="") 
        {
          $articles= $category->getArticles();
        }
        else   
          $articles= $articlesRepository->findAll();
        }
      
      return $this->render('home/index.html.twig',[
          'form_search' => $form_search->createView(),
          'articles' => $articles]);
  }
  
  

    /**
     * @Route("/aprpos", name="home_about")
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    

    /**
     * @Route("/home/articles", name="articles_index_home", methods={"GET"})
     */
    public function articles(ArticlesRepository $articlesRepository): Response
    {
        return $this->render('home/article_index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }
}
