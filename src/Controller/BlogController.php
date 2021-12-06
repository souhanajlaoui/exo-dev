<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function show(int $id, PostRepository $postRepository): Response
    {
        $post = $postRepository->find($id);

        return $this->render('blog/show.html.twig', [
            'controller_name' => 'BlogController',
            'post' => $post
        ]);
    }
}
