<?php

namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="homepage")
     *
     */
    public function homepage(EntityManagerInterface $em)
    {
        $productRepository = $em->getRepository(Product::class);
        $products = $productRepository->findBy([],[],9);

        #dd($product);
        return $this->render('home.html.twig',compact('products'));
        
    }

}