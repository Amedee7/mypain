<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // utilisation de Faker
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('user@test.com');
        $user->setPrenom($faker->firstName());
        $user->setNom($faker->lastName());
        $user->setTelephone($faker->phoneNumber());
        $user->setAPropos($faker->test());
        $user->setInstagram('instagram');

        $manager->flush();
    }
}
