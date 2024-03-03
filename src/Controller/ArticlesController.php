<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Article;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(EntityManagerInterface $entityManager): Response
    {
$articles= $entityManager->getRepository(Article::class)->findAll();
        // on va récupérer les articles pour les afficher
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/articles/{id}', name: 'app_get_article_by_id')]
    public function getArticleById(): Response
    {
        return $this->render('articles/show_article.html.twig', [
            'controller_name' => 'ArticlesController',
        ]);
    }
}
