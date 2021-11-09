<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;


class AppFixtures extends Fixture
{
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $faker->addProvider(new \Liior\Faker\Prices($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));


        for ($j=0; $j<8; $j++) {

            $category = new Category();

            $category->setName($faker->department(3, true))
                     ->setSlug(strtolower($this->slugger->slug($category->getName())));
            $manager->persist($category);

            for ($i=0; $i<mt_rand(15,20); $i++) {
                $product = new Product();

                $product->setName($faker->productName)
                    ->setPrice($faker->price(4000,20000))
                    ->setSlug(strtolower($this->slugger->slug($product->getName())))
                    ->setCategory($category)
                    ->setShortDescription($faker->paragraph)
                    ->setPicture($faker->imageUrl(500,500, true));

                $manager->persist($product);
            }


        }
        $manager->flush();




        // $product = new Product();
        // $manager->persist($product);


    }


}
