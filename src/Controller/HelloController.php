<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = ["Hello", "Hey", "Bye!"];
    #[Route('/{limit<\d+>?3}',name: 'app_index')]
    public function index(int $limit) {
        return new Response(implode(',', array_splice($this->messages,0,$limit)));
    }
    #[Route('/messages/{id<\d+>}',name: 'app_show_one')]
    public function showOne($id) : Response
    {
        return $this->render('hello/show_one.html.twig',
        [
            'message' => $this->messages[$id]
        ]);
    }
}