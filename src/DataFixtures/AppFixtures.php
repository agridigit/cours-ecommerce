<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Cocur\Slugify\Slugify;
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
        $slugify = new Slugify();

        for ($i=0; $i<100; $i++) {
            $product = new Product();
           
            $product->setName($faker->productName)
                    ->setPrice($faker->price(4000,20000))
                    ->setSlug($this->slugger->slug($product->getName()));
            $manager->persist($product);
        }
            $manager->flush();


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
