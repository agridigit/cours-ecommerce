<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('en-EN');
        $slugify = new Slugify();

        for ($i=0; $i<100; $i++) {
            $product = new Product();
            $name = $faker->sentence;
            $product->setName($name)
                    ->setPrice(mt_rand(100,700))
                    ->setSlug($slugify->slugify($name));
            $manager->persist($product);
        }
            $manager->flush();


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
