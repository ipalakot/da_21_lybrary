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
    
        #_1 Recupération des Articles
            # On récupère la liste des articles
                //$articles = $articlesRepo->findAll();
                //  dd($articles);

        #_2 Json_Encode 
            # Afin d'afiner le tableau, je fais une convertion en JSON
            # Je vais utiliser l'encodeur JSON
                /* $jsonArticles = json_encode([
                    'sYMFONY' => 'Tres Bien \\n',
                    'Json' => 'Bien',
                    'RestClient' => 'Assez Bien',
                    'ThunderClient' => 'Moyen',
                ]);
                dd($jsonArticles, $articles); */

        #_3 Json_Encode / LImites
            # Il y a 1 souci avec Json_Encode lorsque je veux passer le tableaux de mes articles
            # Parce que tous en Private
            # JSon s'arrette au niveau de Arttibuts et ne sais pas comment appeler les Assesseurs(Get)
            # si je change le statut en public, Json affiche les données
                /*  $jsonArticles,  = json_encode($articles);
                    dd($jsonArticles, $articles); */

        #_4_Normalisation
            # La Normalization devient 1 Solution
            # Processus de Conversion d'oBjet en Tableau
            # Je fais des tableaux Associatif qui representent Les Objets
            # j'injecte le NormalizerInterface

                /*  $articlesNormalises = $normalizer->normalize($articles);
                    dd(articlesNormalises); 
        
        #_4_Reference Circulaire
            #   Je vais Normalizer que les infos dont j'ai besoin
            #   Tagger les Infos dont j'ai Besoin / Transformer des Objets en tableau Associatifs
            #   @groups me permet de tagger les Infos dont j'ai besoin
            #   Le Normalizer ne va convertir que les groups que j'ai choisi
                /*  $articlNormalise = $normalizer->normalize($articles, null, [
                    'groups'=>'groupe:api'
                ]); */
             /*  dd($articlNormalise); /
            //maintenant je peux 
                /*  $jsonArticles  = json_encode($articlNormalise);
                    dd($jsonArticles, $articles);*/
        
        #_5_ Creer une Reponse HTTP Appropriée pour retourner le Tableau
            # je cree ma respponse
            # je lui passe _$jsonArticles
            # je lui passe _le satut que j'attends
            # je lui passe  _des Content special
               
                /*  $jsonArticles  = json_encode($articlNormalise);
                    $response = new JsonResponse($jsonArticles, 200, [
                    "Content-type"=>"application/jason"            
                    ] );
                    return $response; */
        
        #_6_ La Serialisation va regrouper les étapes ci-dessus en 1 seule
            #   Les Etapes que nous avions suivis consistait:
            #    _Normalization => transformaer 1 Objet en tableau
            #    _ encodage => Transformer du Tableaux en JSon
                
            #-Symfony met a Disposition 1 Nouveau service qui est le SERIALIZER
            #- Le Serializer embarque avec lui le Normalizer et l'encodeur*/

                  return $this->json($articlesRepo->findAll(), 200, [], [
                        "groups"=> "article:api"],
                    );
    }
}