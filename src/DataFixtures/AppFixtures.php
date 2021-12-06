<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            // category
            $category = new Category();
            $category->setName('Category ' . $i);

            // comment
            $comment = new Comment();
            $comment->setPseudo('User ' . $i);
            $comment->setMessage('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.');
            $comment->setDate(new \DateTime());
            $comment->setValidated(true);

            // Post
            $post = new post();
            $post->setTitle('Lorem ipsum dolor sit amet ' . $i);
            $post->setPublicationDate(new \DateTime());
            $post->setResume('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.');
            $post->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur. <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.');
            $post->setVisual('image-fixture.png');

            $post->addCategory($category);
            $post->addComment($comment);

            $manager->persist($post);
        }

        $manager->flush();
    }
}