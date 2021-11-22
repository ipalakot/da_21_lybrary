<?php

namespace App\Controller;

//use App\Entity\Articles;
//use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
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
