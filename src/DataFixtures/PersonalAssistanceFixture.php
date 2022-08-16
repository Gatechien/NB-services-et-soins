<?php

namespace App\DataFixtures;
use App\Entity\PersonalAssistance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;


    class PersonalAssistanceFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $personalAssistance = new PersonalAssistance();
            $personalAssistance->setType('Lever');
            $manager->persist($personalAssistance);

            $personalAssistance= new PersonalAssistance();
            $personalAssistance->setType('Toilette');
            $manager->persist($personalAssistance);

            $personalAssistance= new PersonalAssistance();
            $personalAssistance->setType('Douche');
            $manager->persist($personalAssistance);

            $personalAssistance= new PersonalAssistance();
            $personalAssistance->setType('Repas');
            $manager->persist($personalAssistance);

            $personalAssistance= new PersonalAssistance();
            $personalAssistance->setType('Courses');
            $manager->persist($personalAssistance);

            $personalAssistance= new PersonalAssistance();
            $personalAssistance->setType('Entretien du logement');
            $manager->persist($personalAssistance);

            $manager->flush();
        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['personalAssistanceGroup'];
        }
    }