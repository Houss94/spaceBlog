<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_article")
     */
    public function home(ArticleRepository $art): Response
    {
        $articles=$art->findBy([],['createdAt'=>'DESC']);

        return $this->render('article/index.html.twig',
        compact('articles'));
    }

    /**
     * @Route("/article/{id<[0-9]+>}", name="app_article_show")
     */
    public function show(Article $article): Response
    {

        return $this->render('article/show.html.twig',compact('article'));
    }
}
