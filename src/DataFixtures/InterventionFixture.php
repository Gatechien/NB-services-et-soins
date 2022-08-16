<?php

namespace App\DataFixtures;
use App\Entity\Intervention;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;


    class InterventionFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $intervention = new Intervention();
            $intervention ->setMoment('Matin');
            $manager->persist($intervention );

            $intervention = new Intervention();
            $intervention ->setMoment('Déjeuner');
            $manager->persist($intervention );

            $intervention = new Intervention();
            $intervention ->setMoment('Après-midi');
            $manager->persist($intervention );

            $intervention = new Intervention();
            $intervention ->setMoment('Diner');
            $manager->persist($intervention );

            $intervention = new Intervention();
            $intervention ->setMoment('Soir');
            $manager->persist($intervention );
  
            $manager->flush();
        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['interventionGroup'];
        }
    }