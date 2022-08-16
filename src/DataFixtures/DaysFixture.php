<?php

namespace App\DataFixtures;
use App\Entity\Days;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;


    class DaysFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $days = new Days();
            $days->setName('Lundi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Mardi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Mercredi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Jeudi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Vendredi');
            $manager->persist($days);

            $manager->flush();
        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['daysGroup'];
        }
    }