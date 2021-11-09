<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController extends AbstractController
{
    /**
     * @param Request $request
     * @param $name
     * @return Response
     * @Route ("/hello/{name?Word}", name="hello")
     */
    public function hello($name, Environment $environment): Response
    {
        $html = $environment->render('hello.html.twig', [
            'name' => $name,
            'trainer' => [
               'firstName' => 'Amine',
                'LastName' => 'Bouslama',
                'age' => 44
            ]
        ]);
        return new Response($html);
    }

}