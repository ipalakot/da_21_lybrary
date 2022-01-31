<?php

namespace App\Controller;

use FOS\UserBundle\Model\Group;
use App\Repository\ArticlesRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api1", name="api_")
 * 
 */
class APIController extends AbstractController
{
/**
 * @Route("/articles/list", name="liste", methods={"GET"})// Je n'oublie surtout pas la listes des methodes 
 */
    public function liste(ArticlesRepository $articlesRepo)
    {
    
                  return $this-> json($articlesRepo->findAll(), 200, [], [
                        "groups"=> "article:api"],

                    );
    }
}