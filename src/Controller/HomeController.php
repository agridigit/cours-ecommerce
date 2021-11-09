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
        $product = $productRepository->find(3);
        $em->remove($product);
        $em->flush();
        #dd($product);
        return $this->render('home.html.twig');
        
    }

}