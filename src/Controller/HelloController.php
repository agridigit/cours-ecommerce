<?php

namespace App\Controller;


use App\Taxes\Detector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    /**
     * @param Request $request
     * @param $name
     * @return Response
     * @Route ("/hello/{name}", name="hello")
     */
    public function hello($name = "Word"): Response
    {

        return new Response("Hello $name");
    }

}