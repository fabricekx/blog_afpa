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
    public function getArticleById(
        EntityManagerInterface $entityManager,
        int $id
    ): Response
    //  pour avoir l'id, on appelle l'entity manager et l'argument
    {
        $article= $entityManager->getRepository(Article::class)->find($id);
//  pour avoir l'article, on utilise la fonction find qui a été prdéfinie par symfony
//  puis on s'en sert pour la vue
        return $this->render('articles/show_article.html.twig', [
            'article' => $article,
        ]);
    }
}
