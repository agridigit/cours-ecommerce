<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function index()
    {
        dd("Ca fonctionne");

    }

    public function test(Request $request, $age): Response
    {
        //$request = Request::createFromGlobals();

        //dump($request);

        //$age = $request->attributes->get('age', 0);

        return new Response("Vous avez $age ans");
    }
}